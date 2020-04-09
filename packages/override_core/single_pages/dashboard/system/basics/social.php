<?php 
defined('C5_EXECUTE') or die("Access Denied.");

?>

<?php if ($controller->getTask() == 'add'
    || $controller->getTask() == 'add_link'
    || $controller->getTask() == 'edit'
    || $controller->getTask() == 'edit_link'
    || $controller->getTask() == 'delete_link') {

    $url = '';
    $ssHandle = '';
    $action = $view->action('add_link');
    $token = 'add_link';
    $buttonText = t('Add');
    if (is_object($link)) {
        $url = $link->getURL();
        $ssHandle = $link->getServiceHandle();
        $action = $view->action('edit_link', $link->getID());
        $token = 'edit_link';
        $buttonText = t('Save');
    }
    ?>

    <?php if (is_object($link)) { ?>
        <div class="ccm-dashboard-header-buttons">
            <button data-dialog="delete-link" class="btn btn-danger"><?php echo t("Delete Link")?></button>
        </div>

    <div style="display: none">
        <div id="ccm-dialog-delete-social-link" class="ccm-ui">
            <form method="post" class="form-stacked" action="<?php echo $view->action('delete_link')?>">
                <?php echo Loader::helper("validation/token")->output('delete_link')?>
                <input type="hidden" name="slID" value="<?php echo $link->getID()?>" />
                <p><?php echo t('Are you sure? This action cannot be undone.')?></p>
            </form>
            <div class="dialog-buttons">
                <button class="btn btn-default pull-left" onclick="jQuery.fn.dialog.closeTop()"><?php echo t('Cancel')?></button>
                <button class="btn btn-danger pull-right" onclick="$('#ccm-dialog-delete-social-link form').submit()"><?php echo t('Delete Link')?></button>
            </div>
        </div>
    </div>

    <?php } ?>

    <script type="text/javascript">
        $(function() {
            $('button[data-dialog=delete-link]').on('click', function() {
                jQuery.fn.dialog.open({
                    element: '#ccm-dialog-delete-social-link',
                    modal: true,
                    width: 320,
                    title: '<?php echo t("Delete Social Link")?>',
                    height: 'auto'
                });
            });
        });
    </script>

    <form method="post" action="<?php echo $action?>">
        <?php echo $this->controller->token->output($token)?>
		
		<div id="NSR_Form">	
		
			<div class="form-label">
				<label style="min-width:73px">
					<?php echo $form->label('ssHandle', t('Service'))?>
				</label>
				<label style="text-align:center; min-width:20px">:</label>
			</div>
			
			<div class="form-input">  
				<?php echo $form->select('ssHandle', $services, $ssHandle, array('class' => 'width40 mobile-width'))?>
			</div>

		</div>
		
		<div id="NSR_Form">	
		
			<div class="form-label">
				<label style="min-width:73px">
					<?php echo $form->label('url', t('URL'))?>
				</label>
				<label style="text-align:center; min-width:20px">:</label>
			</div>
			
			<div class="form-input">  
                <?php echo $form->text('url', $url, array('class' => 'width40 mobile-width'))?>
			</div>

		</div>

        <div class="ccm-dashboard-form-actions-wrapper">
            <div class="ccm-dashboard-form-actions">
                <a href="<?php echo URL::to('/'.$_SESSION['myURLTheme'].'/system/social')?>" class="btn btn-default pull-left"><?php echo t("Cancel")?></a>
                <button class="pull-right btn btn-primary" type="submit" ><?php echo $buttonText?></button>
            </div>
        </div>

    </form>
<?php } else { ?>


    <div class="ccm-dashboard-header-buttons" style="margin-bottom: 10px;">
        <a class="btn btn-success mobile-width" href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/system/social', 'add')?>">
			<i class="fa fa-plus-square"></i> &nbsp;
			<?php echo t("Add Link")?>
		</a>
    </div>


    <?php if (count($links) > 0) { ?>
        <div class="col-md-8">
        <table class="table table-striped">
        <?php foreach($links as $link) {
            $service = $link->getServiceObject(); ?>
        <tr>
            <td style="width: 48px"><?php echo $service->getServiceIconHTML()?></td>
            <td><a href="<?php echo $view->action('edit', $link->getID())?>"><?php echo $service->getDisplayName() ?></a></td>
            <td><?php echo h($link->getURL()) ?></td>
        </tr>
        <?php } ?>
        </table>
        </div>

    <?php } else { ?>
		<br>
        <p><?php echo t("You have not added any social links.")?></p>
    <?php } ?>


<?php } ?>