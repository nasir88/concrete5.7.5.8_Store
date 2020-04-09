<?php 
defined('C5_EXECUTE') or die('Access denied.');
/** @var array $entities */
?>
<div class="entities">
    <?php 
    if (empty($entities)) {
        echo t('No entities were found.');
    }
    foreach ($entities as $class => $entity) {
        ?>
        <div class="panel panel-<?php echo  !$entity['valid'] ? 'danger' : 'default' ?>">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo  t('Entity %s', h($class)) ?>
                </h3>
            </div>
            <div id="ENT=<?php echo  h($class) ?>">
                <?php 
                if ($entity['valid']) {
                    /** @var Doctrine\ORM\Mapping\ClassMetadata $metadata */
                    $metadata = $entity['metadata'];
                    ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="2"><?php echo  t('General Info') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td nowrap width="1px"><?php echo  t('Table Name') ?></td>
                            <td><?php echo  h($metadata->getTableName()) ?></td>
                        </tr>
                        <tr>
                            <td nowrap width="1px"><?php echo  t('Identifier Field') ?></td>
                            <td>
                                <?php 
                                foreach ($metadata->identifier as $field) {
                                    ?>
                                    <a href="#ENT=<?php echo  h($class) ?>&amp;FLD=<?php echo  h($field) ?>">
                                        <?php echo  h($field) ?>
                                    </a>
                                    <?php 
                                }
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="5"><?php echo  t('Fields') ?></th>
                        </tr>
                        <tr>
                            <th><?php echo  t('Field Name') ?></th>
                            <th><?php echo  t('Column Name') ?></th>
                            <th><?php echo  t('Type') ?></th>
                            <th><?php echo  t('Unique') ?></th>
                            <th><?php echo  t('Nullable') ?></th>
                            <th><?php echo  t('Fixed') ?></th>
                            <th><?php echo  t('Unsigned') ?></th>
                            <th><?php echo  t('Default') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($metadata->fieldMappings as $field) {
                            ?>
                            <tr id="ENT=<?php echo  h($class) ?>&amp;FLD=<?php echo  h($field['fieldName']) ?>">
                                <td><?php echo  h($field['fieldName']) ?></td>
                                <td><?php echo  h($field['columnName']) ?></td>
                                <td><?php echo  h($field['type'] . ($field['length'] !== null ? '(' . $field['length'] .
                                            ($field['precision'] !== null ? ',' . $field['precision'] : '') . ')' : '')) ?></td>
                                <td><i class="fa fa-<?php echo  $field['unique'] ? 'check' : 'times' ?>"></i></td>
                                <td><i class="fa fa-<?php echo  $field['nullable'] ? 'check' : 'times' ?>"></i></td>
                                <td><i class="fa fa-<?php echo  isset($field['options']['fixed']) && $field['options']['fixed'] ? 'check' : 'times' ?>"></i></td>
                                <td><i class="fa fa-<?php echo  isset($field['options']['unsigned']) && $field['options']['unsigned'] ? 'check' : 'times' ?>"></i></td>
                                <td>
                                    <?php 
                                    if (isset($field['options']['default'])) {
                                        if ($field['options']['default'] === null) {
                                            echo '<em>NULL</em>';
                                        } else if ($field['options']['default'] === false) {
                                            echo '<em>FALSE</em>';
                                        } else if ($field['options']['default'] === true) {
                                            echo '<em>TRUE</em>';
                                        } else {
                                            echo h($field['options']['default']);
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php 
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php 
                    if (!empty($metadata->associationMappings)) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="6"><?php echo  t('Association Mappings') ?></th>
                            </tr>
                            <tr>
                                <th><?php echo  t('Field Name') ?></th>
                                <th><?php echo  t('Target Entity') ?></th>
                                <th><?php echo  t('Mapped By') ?></th>
                                <th><?php echo  t('Type') ?></th>
                                <th><?php echo  t('Cascade') ?></th>
                                <th><?php echo  t('Fetch') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($metadata->associationMappings as $mapping) {
                                ?>
                                <tr id="ENT=<?php echo  h($class) ?>&amp;FLD=<?php echo  h($mapping['fieldName']) ?>">
                                    <td><?php echo  h($mapping['fieldName']) ?></td>
                                    <td>
                                        <a href="#ENT=<?php echo  h($mapping['targetEntity']) ?>">
                                            <?php echo  h($mapping['targetEntity']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#ENT=<?php echo  h($mapping['targetEntity']) ?>&amp;FLD=<?php echo  h($mapping['mappedBy']) ?>">
                                            <?php echo  h($mapping['mappedBy']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php 
                                        switch ($mapping['type']) {
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::ONE_TO_ONE:
                                                echo t('One to One');
                                                break;
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::ONE_TO_MANY:
                                                echo t('One to Many');
                                                break;
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::MANY_TO_ONE:
                                                echo t('Many to One');
                                                break;
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::MANY_TO_MANY:
                                                echo t('Many to Many');
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo  h(implode(', ', $mapping['cascade'])) ?></td>
                                    <td>
                                        <?php 
                                        switch ($mapping['fetch']) {
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::FETCH_EAGER:
                                                echo t('Eager');
                                                break;
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::FETCH_EXTRA_LAZY:
                                                echo t('Extra Lazy');
                                                break;
                                            case \Doctrine\ORM\Mapping\ClassMetadataInfo::FETCH_LAZY:
                                                echo t('Lazy');
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php 
                    }

                    if (!empty($metadata->table['indexes'])) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2"><?php echo  t('Indexes') ?></th>
                            </tr>
                            <tr>
                                <th><?php echo  t('Index Name') ?></th>
                                <th><?php echo  t('Columns') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($metadata->table['indexes'] as $name => $opts) {
                                ?>
                                <tr>
                                    <td><?php echo  h($name) ?></td>
                                    <td>
                                        <?php 
                                        foreach ($opts['columns'] as $column) {
                                            ?>
                                            <a href="#TBL=<?php echo  h($class) ?>&amp;COL=<?php echo  h($column) ?>">
                                                <?php echo  h($column) ?>
                                            </a>
                                            <?php 
                                            if (!end($opts['columns'])) {
                                                echo ', ';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php 
                    }
                } else {
                    ?>
                    <div class="panel-body">
                        <?php echo  h($entity['reason']) ?>
                    </div>
                    <?php 
                }
                ?>
            </div>
        </div>
        <?php 
    }
    ?>
</div>
