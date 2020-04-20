<?php defined('C5_EXECUTE') or die("Access Denied.");

$form = Loader::helper('form');

//Edit By Nasir
use \Application\Controller\Search\Users as Users;
$Users = new Users();
$searchFields = $Users->getSearchFields();
//$searchFields = $controller->getSearchFields();

//Edit By Nasir
$u=new User();
if($u->isSuperUser()) {
	if (Config::get('concrete.permissions.model') == 'advanced') {
		$searchFields['group_set'] = t('Group Set');
	}
}

$ek = PermissionKey::getByHandle('edit_user_properties');
$ik = PermissionKey::getByHandle('activate_user');
$dk = PermissionKey::getByHandle('delete_user');

$flr = new \Concrete\Core\Search\StickyRequest('users');
$searchRequest = $flr->getSearchRequest();

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;
$URLTheme = new URLTheme();
$myURLTheme = $URLTheme->myURLTheme();

?>

<script type="text/template" data-template="search-form">
<form role="form" data-search-form="users" action="<?php echo URL::to('/ccm/system/search/users/submit')?>" class="ccm-search-fields">

	<div class="row">
		<div class="col-nsr-100 padLeftRight15">
		
			<div class="input-group pull-right mobile-width mobile-pull-right">
				<a class="btn btn-success mobile-width" href="<?php echo View::url('/'.$myURLTheme.'/users/add') ?>">
					<i class="fa fa-plus-square"></i> &nbsp;
					<?php echo t("Add User") ?>
				</a>
			</div>

			<div class="input-group width40 mobile-width pull-left mobile-pull-left mobile-marginTop10">
				<?php echo $form->search('keywords', $searchRequest['keywords'], array('placeholder' => t('Username or Email')))?>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-block btn-primary widthAuto" tabindex="-1"><i class="fa fa-search"></i> &nbsp; <?php echo t('Search')?></button>
				</span>
			</div>
		
		</div>
	</div>
	
	<div class="box box-info collapsed-box marginTop10 borderLeft1 borderRight1 borderBottom1">
		<div class="box-header with-border">
		  <label><?php echo t('Advanced Search')?> :</label>
		  <div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
		  </div>
		</div><!-- /.box-header -->
		<div class="box-body">
	
			<div class="row">
				<div class="col-md-12">
					<div class="marginBot10">
						<a class="btn btn-success" href="#" data-search-toggle="advanced">
							<i class="fa fa-plus-square"></i> &nbsp;
							<?php echo t('Add Field Search')?>
						</a>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="marginBot10">
						<div class="ccm-search-fields-advanced"></div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
				
					<div id="NSR_Form">
						<div class="form-label">
							<label style="min-width:60px"><?php echo $form->label('gID', t('In Group'))?></label>
							<label style="min-width:20px">:</label>
						</div>
						<div class="form-input">
							<div class="width300px mobile-width">
								<?php
								$gl = new GroupList();
								$g1 = $gl->getResults();
								?>
								<select multiple name="gID[]" class="select2-select" style="width:100%">
									<?php foreach ($g1 as $g) {
										$gp = new Permissions($g);
										if ($gp->canSearchUsersInGroup($g)) {
											?>
										<option value="<?php echo $g->getGroupID()?>"  <?php if (is_array($searchRequest['gID']) && in_array($g->getGroupID(), $searchRequest['gID'])) { ?> selected="selected" <?php } ?>><?php echo $g->getGroupDisplayName()?></option>
									<?php
										}
									} ?>
								</select>
							</div>
						</div>
					</div>
					
					<div id="NSR_Form">
						<div class="form-label">
							<label style="min-width:60px"><?php echo t('Per Page')?></label>
							<label style="min-width:20px">:</label>
						</div>
						<div class="form-input">
							<div class="width100px mobile-width">
								<select id="numResults" name="numResults" class="form-control" style="width:100%">
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
									<option value="250">250</option>
									<option value="500">500</option>
									<option value="1000">1000</option>
								</select>
							</div>
						</div>
					</div>
				
					<div class="marginBot10 pull-right mobile-pull-left">
						<button type="submit" class="btn btn-primary"><?php echo t('Search')?></button>
					</div>
						
				</div>
			</div>

		</div><!-- /.box-body -->
	</div><!-- /.box -->	
	
	<hr>
	
	<div class="row">
		<div class="col-nsr-100 padLeftRight15">
			<div class="marginBot10 pull-left width200px mobile-width">
				<select data-bulk-action="users" disabled class="form-control mobile-width">
					<option value=""><?php echo t('Items Selected')?></option>
					<?php if ($ek->validate()) { ?>
						<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Edit Properties')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/user/bulk/properties')?>" data-bulk-action-dialog-width="630" data-bulk-action-dialog-height="450"><?php echo t('Edit Properties')?></option>
					<?php } ?>
					<?php /*
					<?php if ($ik->validate()) { ?>
						<option value="activate"><?=t('Activate')?></option>
						<option value="deactivate"><?=t('Deactivate')?></option>
					<?php } ?>
					<option value="group_add"><?=t('Add to Group')?></option>
					<option value="group_remove"><?=t('Remove from Group')?></option>
					<?php if ($dk->validate()) { ?>
					<option value="delete"><?=t('Delete')?></option>
					<?php } ?>
		 */ ?>
					<?php if ($mode == 'choose_multiple') { ?>
						<option value="choose"><?php echo t('Choose')?></option>
					<?php } ?>
				</select>
			</div>
		
            <div class="marginBot10 pull-right mobile-width mobile-pull-left">
				<a class="btn bg-navy mobile-width" href="#" data-search-toggle="customize" data-search-column-customize-url="<?php echo URL::to('/ccm/system/dialogs/user/search/customize?myURLTheme='.$myURLTheme)?>">
					<i class="fa fa-cog"></i> &nbsp;
					<?php echo t('Customize Results')?>
				</a>
			</div>
		</div>
	</div>
	
</form>
</script>

<script type="text/template" data-template="search-field-row">
<div class="ccm-search-fields-row">
	<select name="field[]" class="form-control" data-search-field="users">
		<option value=""><?php echo t('Choose Field')?></option>
		<?php foreach ($searchFields as $key => $value) { ?>
			<option value="<?php echo $key?>" <% if (typeof(field) != 'undefined' && field.field == '<?php echo $key?>') { %>selected<% } %> data-search-field-url="<?php echo URL::to('/ccm/system/search/users/field', $key)?>"><?php echo $value?></option>
		<?php } ?>
	</select>

	<div class="ccm-search-field-content"><% if (typeof(field) != 'undefined') { %><%=field.html%><% } %></div>
	<a data-search-remove="search-field" class="ccm-search-remove-field" href="#"><i class="fa fa-minus-circle"></i></a>
</div>
</script>

<script type="text/template" data-template="search-results-table-body">
<% _.each(items, function (user) {%>
<tr>
	<td><span class="ccm-search-results-checkbox"><input type="checkbox" class="ccm-flat-checkbox" data-user-id="<%-user.uID%>" data-user-name="<%-user.uName%>" data-user-email="<%-user.uEmail%>" data-search-checkbox="individual" value="<%-user.uID%>" /></span></td>
	<% for (i = 0; i < user.columns.length; i++) {
		var column = user.columns[i];
		%>
		<td><%= column.value %></td>
	<% } %>
</tr>
<% }); %>
</script>



		<?php Loader::element('search/template')?>


