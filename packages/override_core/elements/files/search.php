<?php
defined('C5_EXECUTE') or die("Access Denied.");
$form = Loader::helper('form');

$searchFields = $controller->getSearchFields();

$flr = new \Concrete\Core\Search\StickyRequest('files');
$req = $flr->getSearchRequest();

?>


<script type="text/template" data-template="search-form">
<form role="form" data-search-form="files" action="<?php echo URL::to('/ccm/system/search/files/submit')?>" class="ccm-search-fields">
	
	<div class="row">
	
		<div class="col-nsr-100 padLeftRight15">
		
			<?php
			$fp = FilePermissions::getGlobal();
			if ($fp->canAddFile()) {
			$imageresize = Config::get('concrete.file_manager.restrict_uploaded_image_sizes');
			if ($imageresize) {
				$datastring = ' data-image-max-width="'. (int)Config::get('concrete.file_manager.restrict_max_width') . '" ';
				$datastring .=' data-image-max-height="'. (int) Config::get('concrete.file_manager.restrict_max_height'). '" ';
				$datastring .= ' data-image-quality="'. (int)Config::get('concrete.file_manager.restrict_resize_quality'). '" ';
			}  ?>
			
				<div class="ccm-file-manager-upload pull-right mobile-width mobile-pull-right" <?php echo $datastring?>>
					<a class="NSRFile btn-success" href="javascript:void">
					  <i class="fa fa-upload"></i> &nbsp;
					  <?php echo t("Upload Files")?>
					  <input type="file" name="files[]" multiple="multiple" />
					</a>
				</div>

			<?php } ?>
		
			<div class="input-group width40 pull-left mobile-width mobile-pull-left mobile-marginTop10">
				<?php echo $form->search('fKeywords', $req['fKeywords'], array('placeholder' => t('Title')), array('class' => 'width400px'))?>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary widthAuto" tabindex="-1"><?php echo t('Search')?></button>
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
				
				    <?php
					$s1 = FileSet::getMySets();
					if (count($s1) > 0) { ?>
						<div id="NSR_Form">
							<div class="form-label">
								<label style="min-width:60px"><?php echo $form->label('fsID', t('File Set'))?></label>
								<label style="min-width:20px">:</label>
							</div>
							<div class="form-input">
								<div class="width300px mobile-width">
								
									<select multiple name="fsID[]" class="select2-select" style="width:100%">
										<optgroup label="<?php echo t('Sets')?>">
										<?php foreach ($s1 as $s) { ?>
											<option value="<?php echo $s->getFileSetID()?>"  <?php if (is_array($req['fsID']) && in_array($s->getFileSetID(), $req['fsID'])) { ?> selected="selected" <?php } ?>><?php echo $s->getFileSetDisplayName()?></option>
										<?php } ?>
										</optgroup>
										<optgroup label="<?php echo t('Other')?>">
											<option value="-1" <?php if (is_array($req['fsID']) && in_array(-1, $req['fsID'])) { ?> selected="selected" <?php } ?>><?php echo t('Files in no sets.')?></option>
										</optgroup>
									</select>
								</div>
							</div>
						</div>
					<?php } ?>
					
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

				<select data-bulk-action="files" disabled class="form-control mobile-width">
					<option value=""><?php echo t('Items Selected')?></option>
					<option value="choose"><?php echo t('Choose')?></option>
					<option value="download"><?php echo t('Download')?></option>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Edit Properties')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/file/bulk/properties')?>" data-bulk-action-dialog-width="630" data-bulk-action-dialog-height="450"><?php echo t('Edit Properties')?></option>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Sets')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/file/bulk/sets')?>" data-bulk-action-dialog-width="500" data-bulk-action-dialog-height="400"><?php echo t('Sets')?></option>
					<option data-bulk-action-type="ajax" data-bulk-action-url="<?php echo URL::to('/ccm/system/file/rescan')?>"><?php echo t('Rescan')?></option>
					<?php /*
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?=t('Duplicate')?>" data-bulk-action-url="<?=REL_DIR_FILES_TOOLS_REQUIRED?>/files/duplicate" data-bulk-action-dialog-width="500" data-bulk-action-dialog-height="400"><?=t('Copy')?></option>
	 */ ?>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Storage Location')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/file/bulk/storage')?>" data-bulk-action-dialog-width="500" data-bulk-action-dialog-height="400"><?php echo t('Storage Location')?></option>
					<option data-bulk-action-type="dialog" data-bulk-action-title="<?php echo t('Delete')?>" data-bulk-action-url="<?php echo URL::to('/ccm/system/dialogs/file/bulk/delete')?>" data-bulk-action-dialog-width="500" data-bulk-action-dialog-height="400"><?php echo t('Delete')?></option>
				</select>

			</div>
		
            <div class="marginBot10 pull-right mobile-width mobile-pull-left">
				<a class="btn bg-navy mobile-width" href="#" data-search-toggle="customize" data-search-column-customize-url="<?php echo URL::to('/ccm/system/dialogs/file/search/customize?myURLTheme='.$_SESSION['myURLTheme'])?>">
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
    <select name="field[]" class="form-control" style="width:100%;" data-search-field="files">
        <option value=""><?php echo t('Choose Field')?></option>
        <?php foreach ($searchFields as $key => $value) { ?>
            <option value="<?php echo $key?>" <% if (typeof(field) != 'undefined' && field.field == '<?php echo $key?>') { %>selected<% } %> data-search-field-url="<?php echo URL::to('/ccm/system/search/files/field', $key)?>"><?php echo $value?></option>
        <?php } ?>
    </select>
    <div class="ccm-search-field-content"><% if (typeof(field) != 'undefined') { %><%=field.html%><% } %></div>
    <a data-search-remove="search-field" class="ccm-search-remove-field" href="#"><i class="fa fa-minus-circle"></i></a>
</div>
</script>

<script type="text/template" data-template="search-results-table-body">
<% _.each(items, function (file) {%>
<tr data-launch-search-menu="<%=file.fID%>" data-file-manager-file="<%=file.fID%>">
    <td><span class="ccm-search-results-checkbox"><input type="checkbox" data-search-checkbox="individual" value="<%=file.fID%>" /></span></td>
    <!--
	<td class="ccm-file-manager-search-results-star <% if (file.isStarred) { %>ccm-file-manager-search-results-star-active<% } %>"><a href="#" data-search-toggle="star" data-search-toggle-url="<?php echo URL::to('/ccm/system/file/star')?>" data-search-toggle-file-id="<%=file.fID%>"><i class="fa fa-star"></i></a></td>
    -->
	<td class="ccm-file-manager-search-results-thumbnail"><%=file.resultsThumbnailImg%></td>
    <% for (i = 0; i < file.columns.length; i++) {
        var column = file.columns[i]; %>
        <td><%-column.value%></td>
    <% } %>
</tr>
<% }); %>
</script>

<div data-search-element="wrapper"></div>

<div data-search-element="results">
    <div class="table-responsive">
        <table class="ccm-search-results-table">
        <thead>
        </thead>
        <tbody>
        </tbody>
        </table>
    </div>
    <div class="ccm-search-results-pagination"></div>
</div>

<script type="text/template" data-template="search-results-pagination">
<%=paginationTemplate%>
</script>

<script type="text/template" data-template="search-results-table-head">
<tr>
    <th style="width: 5%;"><span class="ccm-search-results-checkbox"><input type="checkbox" data-search-checkbox="select-all" /></span></th>
    <!--<th class="ccm-file-manager-search-results-star"><span><i class="fa fa-star"></i></span></th>-->
    <th style="width: 10%;"><span><?php echo t('Thumbnail')?></th>
    <%
    for (i = 0; i < columns.length; i++) {
        var column = columns[i];
        if (column.isColumnSortable) { %>
            <th class="<%=column.className%>"><a href="<%=column.sortURL%>"><%-column.title%></a></th>
        <% } else { %>
            <th><span><%-column.title%></span></th>
        <% } %>
    <% } %>
</tr>
</script>
