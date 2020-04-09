<?php 
defined('C5_EXECUTE') or die("Access Denied.");       

//Process Edit
$action = $view->action('edit_sitelogo', '1');
$button = t('Update');

?>

<script language="javascript" type="text/javascript">
$(function () {

    $("#inputFile4040").change(function () {
		var id = $(this).attr('id');
		var imagePreview = 'imagePreview4040';
		var messageValid = 'messageValid4040';
        readURL(this,id,40,40,imagePreview,messageValid);
    });
	
	$("#inputFile22040").change(function () {
		var id = $(this).attr('id');
		var imagePreview = 'imagePreview22040';
		var messageValid = 'messageValid22040';
        readURL(this,id,220,40,imagePreview,messageValid);
    });
	
	function readURL(input,id,width,height,imagePreview,messageValid) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

				reader.onload = function (e) {
				
					var image = new Image();
					image.src = e.target.result;
					image.onload = function () {
					
						var validText = ' ' + width + 'x' + height + ' ';
					
						if (this.height <= height && this.width <= width) {
						//if (height === this.height && width === this.width) {
							$('#' + messageValid).hide();
							$('#' + imagePreview).attr('src', e.target.result);
							$('#' + imagePreview).show();
						}else{
							$('#' + imagePreview).hide();
							$('#' + id).val(''); 
							$('#' + messageValid).text('* <?php echo t('Your image should be') ?>' +  validText + '<?php echo t('pixels.') ?>');
							$('#' + messageValid).show();
						}
						
					}
				
				}

            reader.readAsDataURL(input.files[0]);
			
        }
    }
	
});
</script>

<form method="post" enctype="multipart/form-data" class="ccm-dashboard-content-form" action="<?php echo $action?>">

	<fieldset>
	
		<div id="NSR_Form">
			<div class="form-label">
				<label style="min-width:105px"><?php echo t('Small Site Logo')?></label>
				<label style="text-align:center; min-width:20px">:</label>
			</div>
			
			<div class="form-input">
				<div class="width100px mobile-width">
				
					<div class="NSR_fileUpload btn btn-default">
						<span><?php echo t('Choose Image')?></span>
						<input name="imageFile4040" type="file" id="inputFile4040" class="upload"/>
					</div>
			
					<div class="LogoSite">
						<img id="imagePreview4040" src="<?php echo $SiteLogoImageMini ?>" alt="My Logo"/>
						<div id="messageValid4040"></div>
					</div>
					
				</div>
			</div>
			
		</div>
		
		<div id="NSR_Form">
			<div class="form-label">
				<label style="min-width:105px;"><?php echo t('Site Logo')?></label>
				<label style="text-align:center; min-width:20px">:</label>
			</div>
			
			<div class="form-input">
				<div class="width100px mobile-width">
				
					<div class="NSR_fileUpload btn btn-default">
						<span><?php echo t('Choose Image')?></span>
						<input name="imageFile22040" type="file" id="inputFile22040" class="upload"/>
					</div>
					
					<div class="LogoSite">
						<img id="imagePreview22040" src="<?php echo $SiteLogoImage ?>" alt="My Logo"/>
						<div id="messageValid22040"></div>
					</div>
					
				</div>
			</div>
			
		</div>
		
		<!--
		<div class="row">
			<label for="SITE" 
				class="launch-tooltip control-label" 
				data-placement="right" 
				title="<?php //echo t('By default, site name is displayed in the browser title bar. It is also the default name for your project on concrete5.org')?>">
				<?php //echo t('Site Name')?>
			</label>

			<?php //echo $form->text('SITE', $site, array('class' => 'span4'))?>
		</div>
		-->
		
	</fieldset>
	
	<div class="ccm-dashboard-form-actions-wrapper">
		<div class="ccm-dashboard-form-actions">
			<button class="pull-right btn btn-primary" type="submit" ><?php echo $button?></button>
		</div>
	</div>
	
</form>
