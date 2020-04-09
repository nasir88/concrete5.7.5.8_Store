<?php  namespace Concrete\Package\DatabaseMigration\Src;

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Attribute\Type as AttributeType;
use BlockType;
use BlockTypeList;
use Concrete\Package\DatabaseMigration\Src\DbSchemaParser;
use Environment;
use Loader;
use Package;
use Database;

class DbSchemaReader
{
    private $parser = null;

    public function __construct()
    {
        $this->parser = new DbSchemaParser();
    }

    public function fixDatabaseNames()
    {
        $db = Database::connection();
        $queries = $this->getFixScriptRows();
        foreach ($queries as $query) {
            $db->executeQuery($query);
        }
    }

    public function getFixScriptRows($appendCorrect = false, $lowerToUpper = true)
    {
        $db = Database::connection();
        $names = $this->getDatabaseTableNames();
        asort($names);
        $currentTables = $db->getCol("SHOW TABLES");
        $rows = array();
        foreach ($names as $tbl) {
            $migrateTbl = $lowerToUpper ? strtolower($tbl) : $tbl;
            $tbl = !$lowerToUpper ? strtolower($tbl) : $tbl;
            if ($appendCorrect || ($key = array_search($migrateTbl, $currentTables)) !== false) {
                $tmpName = $migrateTbl . "_tmp";
                array_push($rows, "RENAME TABLE " . $migrateTbl . " TO " . $tmpName . ";");
                if ($appendCorrect || ($key2 = array_search($tbl, $currentTables)) !== false) {
                    array_push($rows, "DROP TABLE IF EXISTS " . $tbl . ";");
                    unset($currentTables[$key2]);
                }
                array_push($rows, "RENAME TABLE " . $tmpName . " TO " . $tbl . ";");
                unset($currentTables[$key]);
            }
        }
        return $rows;
    }

    public function getMissingTables()
    {
        $names = $this->getDatabaseTableNames();
        asort($names);
        $db = Database::connection();
        $currentTables = $db->getCol("SHOW TABLES");
        foreach ($names as $tbl) {
            $migrateTbl = strtolower($tbl);
            if (($key = array_search($migrateTbl, $currentTables)) !== false) {
                unset($currentTables[$key]);
            }
            if (($key = array_search($tbl, $currentTables)) !== false) {
                unset($currentTables[$key]);
            }
        }
        return $currentTables;
    }

    public function getDatabaseTableNames()
    {
        if (sizeof($this->parser->getTableNames()) > 0) {
            return $this->parser->getTableNames();
        }
        $this->parseCoreSchema();
        $this->parseCoreSpecialSchema();
        $this->parseBlockSchemas();
        $this->parseAttributeTypeSchemas();
        $this->parsePackageSchemas();
        return $this->parser->getTableNames();
    }

    private function parseCoreSpecialSchema()
    {
        return $this->parseSchema(DIR_BASE_CORE . "/authentication/concrete", FILENAME_PACKAGE_DB);
    }

    private function parseCoreSchema()
    {
        return $this->parseSchema(DIR_BASE_CORE . "/config", FILENAME_PACKAGE_DB);
    }

    private function parseBlockSchemas()
    {
        $db = \Database::get();
        $env = Environment::get();
        $blocks = BlockTypeList::getInstalledList();
        $internalBlocks = $db->fetchAll('SELECT *, bt.btID from BlockTypes bt LEFT JOIN BlockTypeSetBlockTypes btsbt ON btsbt.btID = bt.btID WHERE btIsInternal = ? ORDER BY btDisplayOrder', array('1'));
        foreach ($internalBlocks as $internalBlock) {
            $blocks[] = BlockType::getByHandle($internalBlock['btHandle']);
        }
        foreach ($blocks as $b) {
            $btHandle = $b->getBlockTypeHandle();
            $dir = dirname($env->getPath(DIRNAME_BLOCKS . '/' . $btHandle . '/' . FILENAME_CONTROLLER));
            if ($b->getPackageID() > 0) {
                $pkgHandle = $b->getPackageHandle();
                $dir = dirname($env->getPath(DIRNAME_BLOCKS . '/' . $btHandle . '/' . FILENAME_CONTROLLER, $pkgHandle));
            }
            if (file_exists($dir . '/' . FILENAME_BLOCK_DB)) {
                $this->parseSchema($dir, FILENAME_BLOCK_DB);
            }
        }
        return true;
    }

    private function parseAttributeTypeSchemas()
    {
        $ats = AttributeType::getList();
        foreach ($ats as $at) {
            if ($file = $at->getAttributeTypeFilePath(FILENAME_ATTRIBUTE_DB)) {
                $this->parseSchema($file);
            }
        }
        return true;
    }

    private function parsePackageSchemas()
    {
        $packages = Package::getInstalledList();
        foreach ($packages as $pkg) {
            $pkg = Package::getByHandle($pkg->getPackageHandle());
            if (is_object($pkg)) {
                $dir = DIR_PACKAGES . '/' . $pkg->getPackageHandle() . '/';
                if (file_exists($dir . '/' . FILENAME_PACKAGE_DB)) {
                    $this->parseSchema($dir, FILENAME_BLOCK_DB);
                }
                if (method_exists($pkg, 'getDatabaseMigrationTables')) {
                    $arr = $pkg->getDatabaseMigrationTables();
                    if (is_array($arr)) {
                        asort($arr);
                        foreach ($arr as $tbl) {
                            $this->parser->addTableName($tbl);
                        }
                    }
                }
            }
        }
        return true;
    }

    private function parseSchema($dirOrPath, $dbFile = null)
    {
        $xmlFile = $dirOrPath;
        if ($dbFile !== null) {
            $xmlFile .= "/" . $dbFile;
        }
        $this->parser->parseSchema($xmlFile);
    }
}