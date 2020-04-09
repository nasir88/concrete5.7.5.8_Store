<?php
defined('C5_EXECUTE') or die("Access Denied.");
$form = Loader::helper('form');

//Edit By Nasir
use \Application\Controller\Search\Pages as Pages;
$Pages = new Pages();
$searchFields = $Pages->getSearchFields();
//$searchFields = $controller->getSearchFields();

//Edit By Nasir
$u=new User();
if($u->isSuperUser()) {
	if (Config::get('concrete.permissions.model') != 'simple') {
		$searchFields['permissions_inheritance'] = t('Permissions Inheritance');
	}
}

$flr = new \Concrete\Core\Search\StickyRequest('pages');
$req = $flr->getSearchRequest();

?>

<script type="text/template" data-template="search-form">
<form role="form" data-search-form="pages" action="<?php echo URL::to('/ccm/system/search/pages/submit')?>" class="ccm-search-fields">
	
	<div class="row">
		<div class="col-nsr-100 padLeftRight15">
		
			<div class="input-group pull-right mobile-width mobile-pull-right">
				<a class="btn btn-success mobile-width" href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/sitemap/full') ?>">
					<i class="fa fa-plus-square"></i> &nbsp;
					<?php echo t("Add Page") ?>
				</a>
			</div>

			<div class="input-group width40 mobile-width pull-left mobile-pull-left mobile-marginTop10">
				<?php echo $form->search('cvName', $req['cvName'], array('placeholder' => t('Page Name')), array('class' => 'width400px'))?>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-block btn-primary widthAuto" tabindex="-1"><?php echo t('Search')?></button>
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
				<select data-bulk-action="pages" disabled class="form-control mobile-width" data-placeholder="<?php echo t('Items Selected')?>" >
					<option value=""><?php echo t('Items Selected')?></option>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Page Properties')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/page/bulk/properties')?>" data-bulk-action-dialog-width="630" data-bulk-action-dialog-height="450"><?php echo t('Edit Properties')?></option>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Delete')?>" data-bulk-action-url="<?php echo REL_DIR_FILES_TOOLS_REQUIRED?>/pages/delete" data-bulk-action-dialog-width="500" data-bulk-action-dialog-height="400"><?php echo t('Delete')?></option>
				</select>
			</div>
		
            <div class="marginBot10 pull-right mobile-width mobile-pull-left">
				<a class="btn bg-navy mobile-width" href="#" data-search-toggle="customize" data-search-column-customize-url="<?php echo URL::to('/ccm/system/dialogs/page/search/customize?myURLTheme='.$_SESSION['myURLTheme'])?>">
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
	<select name="field[]" class="form-control" data-search-field="pages">
		<option value=""><?php echo t('Choose Field')?></option>
		<?php foreach ($searchFields as $key => $value) { ?>
			<option value="<?php echo $key?>" <% if (typeof(field) != 'undefined' && field.field == '<?php echo $key?>') { %>selected<% } %> data-search-field-url="<?php echo URL::to('/ccm/system/search/pages/field', $key)?>"><?php echo $value?></option>
		<?php } ?>
	</select>
	<div class="ccm-search-field-content"><% if (typeof(field) != 'undefined') { %><%=field.html%><% } %></div>
	<a data-search-remove="search-field" class="ccm-search-remove-field" href="#"><i class="fa fa-minus-circle"></i></a>
</div>
</script>

<script type="text/template" data-template="search-results-table-body">
<% _.each(items, function (page) {%>
<tr data-launch-search-menu="<%=page.cID%>" data-page-id="<%=page.cID%>" data-page-name="<%=page.cvName%>">
	<td><span class="ccm-search-results-checkbox"><input type="checkbox" class="ccm-flat-checkbox" data-search-checkbox="individual" value="<%=page.cID%>" /></span></td>
	<% for (i = 0; i < page.columns.length; i++) {
		var column = page.columns[i];
		if (column.key == 'cvName') { %>
			<td class="ccm-search-results-name"><%=column.value%></td>
		<% } else { %>
			<td><%=column.value%></td>
		<% } %>
	<% } %>
</tr>
<% }); %>
</script>

<?php Loader::element('search/template')?>
	





			
			
			
			
			
			
