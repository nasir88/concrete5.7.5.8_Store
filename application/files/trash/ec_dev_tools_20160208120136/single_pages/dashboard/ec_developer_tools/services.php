<?php  defined('C5_EXECUTE') or die('Access denied.'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo  t('Name') ?></th>
        <th><?php echo  t('Class') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($services as $name => $service) {
        ?>
        <tr>
            <td><?php echo  $name ?></td>
            <?php 
            if (substr($service['class'], 0, 9) == '\\Concrete') {
                ?>
                <td>
                    <a href="http://concrete5.org/api/class-<?php echo  str_replace('\\', '.', ltrim($service['class'], '\\')) ?>.html"
                       target="_blank"><?php echo  $service['class'] ?></a>
                </td>
                <?php 
            } else {
                ?>
                <td><?php echo  $service['class'] ?></td>
                <?php 
            }
            ?>
        </tr>
        <?php 
    }
    ?>
    </tbody>
</table>