<?php  defined('C5_EXECUTE') or die('Access denied.'); ?>

<h3><?php echo  t('Application Namespaces') ?></h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo  t('Namespace') ?></th>
        <th><?php echo  t('Directory') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($applicationPrefixes as $prefix => $directory) {
        ?>
        <tr>
            <td><?php echo  $prefix ?></td>
            <td><?php echo  $directory ?></td>
        </tr>
    <?php 
    }
    ?>
    </tbody>
</table>
<hr/>
<h3><?php echo  t('Package Namespaces') ?></h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo  t('Namespace') ?></th>
        <th><?php echo  t('Directory') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($packagePrefixes as $prefix => $directory) {
        ?>
        <tr>
            <td><?php echo  $prefix ?></td>
            <td><?php echo  $directory ?></td>
        </tr>
    <?php 
    }
    ?>
    </tbody>
</table>