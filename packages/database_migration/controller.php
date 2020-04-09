<?php  namespace Concrete\Package\DatabaseMigration;

defined('C5_EXECUTE') or die("Access Denied.");

use Package;
use SinglePage;

class Controller extends Package
{
    protected $pkgHandle = 'database_migration';
    protected $appVersionRequired = '5.7.4.0';
    protected $pkgVersion = '0.9.2';

    public function getPackageName()
    {
        return t('Database Migration');
    }

    public function getPackageDescription()
    {
        return t('Migrate your database from lowercase to case sensitive tables or vice versa');
    }

    public function install()
    {
        $pkg = parent::install();
        SinglePage::add('/dashboard/system/backup/database_migration', $pkg);
    }

    public function uninstall()
    {
        parent::uninstall();
    }

    public function getDatabaseMigrationTables()
    {
        return array(
            'CollectionSearchIndexAttributes',
            'FileSearchIndexAttributes',
            'OauthUserMap',
            'SystemDatabaseMigrations',
            'UserSearchIndexAttributes',
        );
    }
}