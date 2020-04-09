<?php 
defined('C5_EXECUTE') or die('Access denied.');

/**
 * @var \Package[] $installed
 * @var \Package[] $pending
 * @var \Concrete\Core\Page\View\PageView $this
 */
?>

<h3>Installed Packages</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo  t('Package') ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php 
    /** @var PermissionKey $permission */
    foreach ($installed as $package) {
        ?>
        <tr>
            <td><?php echo  t('%s (v%s)', $package->pkgName, $package->pkgVersion) ?></td>
            <td nowrap style="width: 1px">
                <a href="<?php echo  $this->action('entities', $package->getPackageHandle()) ?>"><?php echo  t('View Entities') ?></a>
                <a href="<?php echo  $this->action('reinstall', $package->getPackageHandle()) ?>"><?php echo  t('Reinstall') ?></a>
            </td>
        </tr>
        <?php 
    }
    ?>
    </tbody>
</table>

<h3>Pending Packages</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo  t('Package') ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php 
    /** @var PermissionKey $permission */
    foreach ($pending as $package) {
        ?>
        <tr>
            <td><?php echo  h($package->getPackageName()) ?></td>
            <td nowrap style="width: 1px">
                <a href="<?php echo  $this->action('entities', $package->getPackageHandle()) ?>"><?php echo  t('View Entities') ?></a>
            </td>
        </tr>
        <?php 
    }
    ?>
    </tbody>
</table>