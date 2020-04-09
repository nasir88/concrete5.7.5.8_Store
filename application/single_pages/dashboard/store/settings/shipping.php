<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$addViews = array('add','add_method','edit');
$editViews = array('edit');

use \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;

if(in_array($controller->getTask(),$addViews)){
/// Add Shipping Method View    
?>
    
    
<form action="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping','add_method')?>" method="post">

    <div class="row">
        <div class="col-xs-12 col-md-12">
        <?php //echo var_dump($smt); ?>
            <legend><?php echo $smt->getShippingMethodTypeName(); ?></legend>
            <?php echo $form->hidden('shippingMethodTypeID',$smt->getShippingMethodTypeID()); ?>
            <?php if(is_object($sm)){ ?>
            <?php echo $form->hidden('shippingMethodID',$sm->getShippingMethodID()); ?>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <?php echo $form->label('methodName',t("Method Name")); ?>
                        <?php echo $form->text('methodName',is_object($sm)?$sm->getName():''); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->label('methodEnabled',t("Enabled")); ?>
                        <?php echo $form->select('methodEnabled',array(true=>"Enabled",false=>"Disabled"),is_object($sm)?$sm->isEnabled():''); ?>
                    </div>
                </div>                
            </div>    
            <hr>
            <?php $smt->renderDashboardForm($sm); ?>    
        </div>
    </div>

    <hr>
    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
			<a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/store/settings/shipping')?>" class="btn btn-default mobile-width"><?php echo t("Cancel")?></a>
            <button class="pull-right btn btn-primary mobile-width mobile-marginTop10" type="submit" ><?=t('%s Shipping Method',$task)?></button>
        </div>
    </div>
    
</form>
     
<?php } else { ?>
<div class="ccm-dashboard-header-buttons marginBot20">

	<a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/store/settings')?>" class="btn bg-navy mobile-width"><i class="fa fa-gear"></i> &nbsp; <?php echo t("General Settings")?></a>
       
    <?php 
    if(count($methodTypes) > 0){?>
    <div class="btn-group mobile-width">
	
     <a href="" class="btn bg-olive dropdown-toggle mobile-width mobile-marginTop10" data-toggle="dropdown"><?=t('Add Method')?> &nbsp; <span class="caret"></span></a>
        <ul class="dropdown-menu mobile-width" role="menu">
            <?php foreach($methodTypes as $smt){?>
                <?php if(!$smt->isHiddenFromAddMenu()){?>
                    <li><a href="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping/add',$smt->getShippingMethodTypeID())?>"><?=$smt->getShippingMethodTypeName()?></a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    <!--<a href="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping/clerk')?>" class="btn btn-info"><i class="fa fa-gift"></i> <?=t("Shipping Clerk")?></a>-->
</div>

<div class="dashboard-shipping-methods">
	
	<?php if(count($methodTypes) > 0){?>
		<?php foreach($methodTypes as $methodType){?>
			<div class="box-body table-responsive no-padding">
			<table class="table table-striped">
				<thead>
					<th><?=$methodType->getShippingMethodTypeName().t(" Methods")?></th>
					<th class="text-right"><?=t("Actions")?></th>
				</thead>
				<tbody>
					<?php foreach(StoreShippingMethod::getAvailableMethods($methodType->getShippingMethodTypeID()) as $method){ ?>
					
					<tr>
						<td><?=$method->getName()?></td>
						<td class="text-right">
							<a href="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping/edit', $method->getShippingMethodID())?>" class="btn btn-default"><?=t("Edit")?></a>
							<a href="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping/toggle_status', $method->getShippingMethodID())?>" class="btn btn-default">
								<?php if($method->isEnabled()){?>
									<?=t("Disable")?>
								<?php } else { ?>
									<?=t("Enable")?>
								<?php } ?>
							</a>
							<?php if (!$method->getShippingMethodTypeMethod()->disableEnabled()) { ?>
								<a href="<?=URL::to('/'.$_SESSION['myURLTheme'].'/store/settings/shipping/delete', $method->getShippingMethodID())?>" class="btn btn-danger"><?=t("Delete")?></a>
							<?php 
							}
							?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
			<hr>
		<?php } ?>
	<?php } ?>
	
</div>

<?php } ?>