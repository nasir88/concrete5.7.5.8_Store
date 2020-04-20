<?php  defined('C5_EXECUTE') or die('Access Denied.'); ?>

	<script>

			function deleteList(id){
				$(".list-panel[data-list='"+id+"']").remove();
			}
			
			$(function(){
				
				//Declare
				var optionsContainer = $('#list-container');
				var optionsTemplate = _.template($('#list-template').html());

				//Add
				$('#btn-add-list-panel').click(function(){
				
					var temp = $(".list-panel").length;
					temp = (temp);
					optionsContainer.append(optionsTemplate({
						iID: '0',
						cName: '',
						iSort: temp
					}));

					indexOptionGroups();
				});

				//Load
				<?php 
					$db = Database::get();
					$r = $db->Execute("SELECT * FROM nsr_landingpages");

					foreach ($r as $k=>$nsr_landingpages) {
				?>
					optionsContainer.append(optionsTemplate({
						iID: '<?php  echo $nsr_landingpages['iPK_LandingPages'];?>',
						cName: '<?php  echo $nsr_landingpages['cName']; ?>',
						iSort: '<?php  echo $nsr_landingpages['iSort']; ?>'
					}));
				<?php 
					}
				?>
				
				//Sortable
				$("#list-container").sortable({
					handle: ".panel-heading",
					update: function(){
						indexOptionGroups();
					}
				});
				
				//Init Index
				function indexOptionGroups(){
					$('#list-container .list-panel').each(function(i) {
						$(this).find('.list-panel-sort').val(i); // hidden Input
						$(this).attr("data-list",i);
					});
				};
				
				//Save
				$('a[data-action=actionInsert]').on('click', function() {
			
					//
				
					jQuery.ajax({
						url : $(this).attr('href'),
						dataType: 'json',
						type: 'post',
						data: $('#form').serialize(), 
						success: function(response) {
							if (response.redirect.length) {
								window.location.replace(response.redirect);
							} else if (response.status) {
								//alert(response.message);
								
								ConcreteAlert.notify({
									title: 'Success',
									message: '' + response.message + ''
								});
								
							} else {
								alert(response.message + " : " + response.errors);
							}
						}
					});
					return false;
				});
				
				

			});

	</script>
	
	<!-- THE TEMPLATE WE'LL USE FOR EACH OPTION GROUP -->
	<script type="text/template" id="list-template">
		<div class="panel panel-default list-panel clearfix" data-list="<%=iSort%>">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-1 label-shell">
						<label for="cName<%=iSort%>" class="text-right" style="padding-top: 8px;"><i class="fa fa-arrows drag-handle pull-left" style="padding-top: 3px;"></i> <span class="hidden-xs"><?php  echo t('Name')?> : </span></label>
					</div>
					<div class="col-xs-9">
						<input type="text" class="form-control" name="cName[]" value="<%=cName%>">
					</div>
					
					<div class="col-xs-2 text-right">
						 <a href="javascript:deleteList(<%=iSort%>)" class="btn btn-delete-item btn-danger"><i data-toggle="tooltip" data-placement="top" title="<?php  echo t('Delete the Landing Page')?>" class="fa fa-trash"></i></a>
					</div>
				</div>
				
				<input type="hidden" name="iID[]" value="<%=iID%>">
				<input type="hidden" name="iSort[]" value="<%=iSort%>" class="list-panel-sort">
			</div>
		</div><!-- .list-panel -->
	</script>
	
	<div class="btn btn-success pull-right" id="btn-add-list-panel"><i class="fa fa-plus-square"></i> &nbsp; <?php  echo t('Add Landing Pages')?></div>

	<br><br>
	
	<form id="form">
		<div id="list-container"></div>
	</form>
	
    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
			<a class="pull-right btn btn-primary"  href="<?php echo $view->action('actionInsert')?>" data-action="actionInsert"><i class="fa fa-save"></i> &nbsp; <?=t('Save')?></a>
        </div>
    </div>
