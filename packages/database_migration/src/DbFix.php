<?php  namespace Concrete\Package\DatabaseMigration\Src;

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Package\DatabaseMigration\Src\DbInfo;
use Concrete\Package\DatabaseMigration\Src\DbSchemaReader;

class DbFix
{
    private $reader = null;
    private $info = null;

    public function __construct()
    {
        $this->reader = new DbSchemaReader();
        $this->info = new DbInfo();
    }

    public function fix()
    {
        $this->reader->fixDatabaseNames();
    }

    public function getFixScript($lowerToUpper = true)
    {
        $rows = $this->reader->getFixScriptRows(true, $lowerToUpper);
        return implode("\r\n", $rows);
    }

    public function getCorrectTables()
    {
        return $this->reader->getDatabaseTableNames();
    }

    public function getMissingTables()
    {
        return $this->reader->getMissingTables();
    }

    public function isDatabaseLowerCase()
    {
        $ret = intval($this->info->getVariable("lower_case_table_names"));
        return $ret === 1;
    }
}