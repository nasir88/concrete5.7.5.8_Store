<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));
$addViews = array('add','edit');
$listViews = array('view','success','removed','updated');

if (in_array($controller->getTask(), $listViews)) {
    ?>
    
    <div class="ccm-dashboard-header-buttons">
        <a href="<?php echo URL::to('/dashboard/store/settings/shipping/clerk/add')?>" class="btn btn-primary"> <?php echo t("Add Box")?></a>
        <a href="<?php echo URL::to('/dashboard/store/settings/shipping/')?>" class="btn btn-default"><i class="fa fa-gift"></i> <?php echo t("Shipping Settings")?></a>
        <a href="<?php  echo View::url('/dashboard/store/settings')?>" class="btn btn-default"><i class="fa fa-gear"></i> <?php  echo t("General Settings")?></a>
    </div>
    
    <div class="alert alert-info">
        <?php echo t("The Shipping Clerk allows you to define boxes that you will use in your shipping process. Shipping Method Types that use calculated shipping (e.g. USPS add-on) use this to estimate postage. <strong>NOTE: If you're going to use Shipping Clerk, all shippable items must fit in at least one box</strong>.")?>
    </div>
    
    <?php  if (count($packages)>0) {
    ?>
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th><?php echo t("Package Name")?></th>
                    <th><?php echo t("Outer Dimensions")?></th>
                    <th><?php echo t("Inner Dimensions")?></th>
                    <th><?php echo t("Empty Weight")?></th>
                    <th><?php echo t("Max Weight")?></th>
                    <th><?php echo t("Actions")?></th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($packages as $package) {
    ?>
                    <tr>
                        <td><?php echo $package->getReference()?></td>
                        <td>
                            <?php echo $calculator->convertFromMM($package->getOuterWidth())?> x
                            <?php echo $calculator->convertFromMM($package->getOuterLength())?> x
                            <?php echo $calculator->convertFromMM($package->getOuterDepth())?><?php echo $sizeUnit?>
                        </td>
                        <td>
                            <?php echo $calculator->convertFromMM($package->getInnerWidth())?> x
                            <?php echo $calculator->convertFromMM($package->getInnerLength())?> x
                            <?php echo $calculator->convertFromMM($package->getInnerDepth())?><?php echo $sizeUnit?>
                        </td>
                        <td><?php echo $calculator->convertFromGrams($package->getEmptyWeight())?><?php echo $weightUnit?></td>
                        <td><?php echo $calculator->convertFromGrams($package->getMaxWeight())?><?php echo $weightUnit?></td>
                        <td>
                            <a href="<?php echo URL::to('dashboard/store/settings/shipping/clerk/edit/', $package->getID())?>" class="btn btn-default"><?php echo t("Edit")?></a>
                            <a href="<?php echo URL::to('dashboard/store/settings/shipping/clerk/delete/', $package->getID())?>" class="btn btn-danger"><?php echo t("Delete")?></a>
                        </td>
                    </tr>
                <?php  
}
    ?>
            </tbody>
        </table>
    <?php  
}
    ?>
    
<?php  
} elseif (in_array($controller->getTask(), $addViews)) {
    ?>
    <form class="form form-vertical" action="<?php echo URL::to('/dashboard/store/settings/shipping/clerk/save')?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <?php echo $form->label('reference', t("Package/Box Name"))?>
                    <?php echo $form->text('reference', $reference)?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('outerLength', t("Outer Length of Box (longest side)"))?>
                    <div class="input-group">
                        <?php echo $form->text('outerLength', $outerLength)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                <?php echo $form->label('outerWidth', t("Outer Width of Box"))?>
                    <div class="input-group">
                        <?php echo $form->text('outerWidth', $outerWidth)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('outerDepth', t("Outer Depth of Box"))?>
                    <div class="input-group">
                        <?php echo $form->text('outerDepth', $outerDepth)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('innerLength', t("Inner Length of Box (longest side)"))?>
                    <div class="input-group">
                        <?php echo $form->text('innerLength', $innerLength)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('innerWidth', t("Inner Width of Box"))?>
                    <div class="input-group">
                        <?php echo $form->text('innerWidth', $innerWidth)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('innerDepth', t("Inner Depth of Box"))?>
                    <div class="input-group">
                        <?php echo $form->text('innerDepth', $innerDepth)?>
                        <span class="input-group-addon"><?php echo $sizeUnit?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('emptyWeight', t("Empty Box Weight"))?>
                    <div class="input-group">
                        <?php echo $form->text('emptyWeight', $emptyWeight)?>
                        <span class="input-group-addon"><?php echo $weightUnit?></span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php echo $form->label('maxWeight', t("Max Weight"))?>
                    <div class="input-group">
                        <?php echo $form->text('maxWeight', $maxWeight)?>
                        <span class="input-group-addon"><?php echo $weightUnit?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ccm-dashboard-form-actions-wrapper">
            <div class="ccm-dashboard-form-actions">
                <button class="pull-right btn btn-success" type="submit" ><?php echo t('%s Box', $task)?></button>
            </div>
        </div>
        
    </form>
<?php  
} ?>
