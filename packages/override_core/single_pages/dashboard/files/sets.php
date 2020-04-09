<?php defined('C5_EXECUTE') or die("Access Denied.");

$ih = Core::make('helper/concrete/ui'); 
$dh = Core::make('helper/date');

?>
<?php if ($this->controller->getTask() == 'view_detail') { ?>

	<script type="text/javascript">
		deleteFileSet = function() {
			if (confirm('<?php echo t('Are you sure you want to permanently remove this file set?')?>')) { 
				location.href = "<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/files/sets', 'delete', $fs->getFileSetID(), Core::make('helper/validation/token')->generate('delete_file_set'))?>";
			}
		}
	</script>

	<?php
	$fsp = new Permissions($fs);
	if ($fsp->canDeleteFileSet()) { ?>
	<div class="ccm-dashboard-header-buttons">
		<button class="btn btn-danger" onclick="deleteFileSet()"><?php echo t('Delete Set')?></button>
	</div>
	<br><br>
	<?php } ?>
	
	<form method="post" id="file_sets_edit" action="<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/files/sets', 'file_sets_edit')?>">
		<?php echo $validation_token->output('file_sets_edit');?>

		<?php echo $ih->tabs(array(
			array('details', t('Details'), true),
			array('files', t('Files in Set'))
		));?>

		<div id="ccm-tab-content-details" class="ccm-tab-content">
		
			<div class="row">
				<div class="col-nsr-100 padLeftRight15">
			
					<div id="NSR_Form">	
			
						<div class="form-label">
							<label style="min-width:35px">
								<?php echo $form->label('file_set_name', t('Name'))?>
							</label>
							<label style="text-align:center; min-width:20px">:</label>
						</div>
						
						<div class="form-input">  
							<?php echo $form->text('file_set_name',$fs->fsName, array('class' => 'width50 mobile-width'));?>
						</div>

					</div>
			
					<?php if (Config::get('concrete.permissions.model') != 'simple' && $fsp->canEditFileSetPermissions()) { ?>

						<div id="NSR_Form">	
							<div class="checkbox">
								<label><?php echo $form->checkbox('fsOverrideGlobalPermissions', 1, $fs->overrideGlobalPermissions())?> <?php echo t('Enable custom permissions for this file set.')?></label>
							</div>

							<div id="ccm-permission-list-form" <?php echo !$fs->overrideGlobalPermissions() ? 'style="display: none"' : ''?> >
								<?php Loader::element('permission/lists/file_set', array("fs" => $fs)); ?>
							</div>
						</div>
					
					<?php } ?>
				
				</div>
			</div>
			
			<?php echo $form->hidden('fsID',$fs->getFileSetID()); ?>
			
		</div>

		<div class="ccm-tab-content" id="ccm-tab-content-files">
		
			<div class="row">
				<div class="col-md-12">
					<?php
					$fl = new FileList();
					$fl->filterBySet($fs);
					$fl->sortByFileSetDisplayOrder();
					$files = $fl->get();
					if (count($files) > 0) { 
					?>

						<span class="help-block"><?php echo t('Click and drag to reorder the files in this set. New files added to this set will automatically be appended to the end.')?></span>
						<div class="ccm-spacer">&nbsp;</div>

						<table class="ccm-search-results-table">
							<thead>
								<tr>
									<th></th>
									<th><span><?php echo t('Thumbnail')?></span></th>
									<th><a href="javascript:void(0)" class="sort-link" data-sort="type"    ><?php echo t('Type')?></a></th>
									<th><a href="javascript:void(0)" class="sort-link" data-sort="title"   ><?php echo t('Title')?></a></th>
									<th><a href="javascript:void(0)" class="sort-link" data-sort="filename"><?php echo t('File name')?></a></th>
									<th><a href="javascript:void(0)" class="sort-link" data-sort="added"   ><?php echo t('Added')?></a></th>
								</tr>
							</thead>

							<tbody class="ccm-file-set-file-list">

								<?php foreach($files as $f) { ?>
									<tr id="fID_<?php echo $f->getFileID()?>" class="">
										<td><i class="fa fa-arrows-v"></i></td>
										<td class="ccm-file-manager-search-results-thumbnail"><?php echo $f->getListingThumbnailImage()?><input type="hidden" name="fsDisplayOrder[]" value="<?php echo $f->getFileID()?>" /></td>
										<td data-key="type" ><?php echo $f->getGenericTypetext()?>/<?php echo $f->getType()?></td>
										<td data-key="title"><div class="container"><?php echo $f->getTitle()?></div></td>
										<td data-key="filename"><div class="container"><?php echo $f->getFileName()?></div></td>
										<td data-key="added" data-sort="<?php echo $f->getDateAdded()->getTimestamp()?>" ><?php echo $dh->formatDateTime($f->getDateAdded()->getTimestamp())?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } else { ?>
						<div class="alert alert-info"><?php echo t('There are no files in this set.')?></div>
					<?php } ?>
					</div>
		
				</div>
			</div>
			
			<div class="ccm-dashboard-form-actions-wrapper">
				<div class="ccm-dashboard-form-actions">
					<a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/files/sets')?>" class="btn btn-default pull-left"><?php echo t('Cancel')?></a>
					<?php echo Core::make("helper/form")->submit('save', t('Save'), array('class' => 'btn btn-primary pull-right'))?>
				</div>
			</div>
	</form>
	
	<script type="text/javascript">

	$(function() {
        var baseClass="ccm-results-list-active-sort-"; // asc desc

        function ccmFileSetResetSortIcons()
        {
            $(".ccm-search-results-table thead tr th").removeClass(baseClass + 'asc');
            $(".ccm-search-results-table thead tr th").removeClass(baseClass + 'desc');
            $(".ccm-search-results-table thead tr th a").css("color", "#93bfd5");
        }

        function ccmFileSetDoSort()
        {
            var $this = $(this);
            var $parent = $(this).parent();
            var asc = $parent.hasClass( baseClass + 'asc' );
            var key = $this.attr('data-sort');

            ccmFileSetResetSortIcons();
            var sortableList = $('.ccm-file-set-file-list');
            var listItems = $('tr', sortableList);

            if ( asc ) $parent.addClass( baseClass + 'desc' );
            else $parent.addClass( baseClass + 'asc' );

            listItems.sort( function( a, b ) {
                var aTD = $('td[data-key=' + key + ']', $(a) );
                var bTD = $('td[data-key=' + key + ']', $(b) );

                var aVal = typeof( aTD.attr('data-sort') ) == 'undefined' ? aTD.text().toUpperCase() : parseInt(aTD.attr('data-sort'));
                var bVal = typeof( bTD.attr('data-sort') ) == 'undefined' ? bTD.text().toUpperCase() : parseInt(bTD.attr('data-sort'));

                if (asc) {
                    return aVal < bVal ? -1 : 1;
                } else {
                    return bVal < aVal ? -1 : 1;
                }
            });
            sortableList.append(listItems);
        }

        $('.ccm-search-results-table thead th a.sort-link').click(ccmFileSetDoSort);

		$(".ccm-file-set-file-list").sortable({
			cursor: 'move',
            opacity: 0.5,
            axis: 'y',
            helper: function( evt, elem ) {
                var ret = $(elem).clone();
                var i;
                // copy the actual width of the elements

                ret.width( elem.outerWidth() );
                retChilds = $(ret.children());
                elemChilds = $(elem.children());
                
                for ( i = 0; i < elemChilds.length; i++ ) 
                    $(retChilds[i]).width( $(elemChilds[i]).outerWidth() );

                return ret; 
            },
            placeholder: "ccm-file-set-file-placeholder",
            stop: function(e,ui) {
                ccmFileSetResetSortIcons();
            }
		});


	});
	
	</script>
	
	<style type="text/css">
	    .ccm-file-set-file-list:hover {cursor: move}
        .ccm-file-set-file-placeholder { background-color: #ffd !important;  }
        .ccm-file-set-file-placeholder td { background:transparent !important; }
        .ccm-file-set-file-list td.ccm-file-manager-search-results-thumbnail img {max-height: 60px}
	</style>

<?php } else { ?>

<div class="ccm-dashboard-content-full">
    <div data-search-element="wrapper">
        <form role="form" id="ccm-file-set-search" method="get" action="<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/files/sets')?>" class="form-inline ccm-search-fields">

		
		<div class="row">
			<div class="col-nsr-100 padLeftRight15">
		
				<div class="input-group pull-right mobile-width mobile-pull-right">
					<a class="btn btn-success" href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/files/add_set')?>" data-search-toggle="advanced">
						<i class="fa fa-plus-square"></i> &nbsp;
						<?php echo t('Add File Set')?>
					</a>
				</div>
			
				<div class="input-group width40 mobile-width pull-left mobile-pull-left mobile-marginTop10">
					<?php echo $form->search('fsKeywords', \Core::make('helper/text')->entities($_REQUEST['fsKeywords']), array('placeholder' => t('File Set Name')), array('class' => 'width400px'))?>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-block btn-primary widthAuto" tabindex="-1"><?php echo t('Search')?></button>
					</span>
				</div>
				
			</div>
		</div>
			
			
			<!--<div class="form-inline marginBot10">
			  <div class="form-group">
				<label style="min-width:60px"><?php //echo $form->label('fsType', t('Type'))?></label>
				<label style="min-width:20px">:</label>
				<?php
				//$gl = new GroupList();
				//$g1 = $gl->getResults();
				?>
				<div class="input-group">
					<select id="fsType" class="select2" name="fsType" style="width: 209px; float: right">
						<option value="<?php //echo FileSet::TYPE_PUBLIC?>" <?php //if ($fsType != FileSet::TYPE_PRIVATE) { ?> selected <?php //} ?>><?php //echo t('Public Sets')?></option>
						<option value="<?php //echo FileSet::TYPE_PRIVATE?>" <?php //if ($fsType == FileSet::TYPE_PRIVATE) { ?> selected <?php //} ?>><?php //echo t('My Sets')?></option>
					</select>
				</div>
			  </div>
			</div> -->
			
            <!--<div class="ccm-search-fields-submit">
                <button type="submit" class="btn btn-primary pull-left"><?php //echo t('Search')?></button>
            </div>-->

        </form>

    </div>
	
	<hr>
	
	<style type="text/css">
		form#ccm-file-set-search {
			margin-left: 0px !important;
		}
	</style>

	<div class="row">
		<div class="col-nsr-100 padLeftRight15">
		
			<section>
				<?php if (count($fileSets) > 0) { ?>
					

					<?php foreach ($fileSets as $fs) { ?>
					
						<div class="ccm-group nsr_group">
							<a class="ccm-group-inner" href="<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/files/sets/', 'view_detail', $fs->getFileSetID())?>"><i class="fa fa-cubes"></i> <?php echo $fs->getFileSetDisplayName()?></a>
						</div>
					
					<?php }
					
					
				} else { ?>
				
					<p><?php echo t('No file sets found.')?></p>
				
				<?php } ?>


				<?php if ($fsl->requiresPaging()) { ?>
					<?php $fsl->displayPagingV2(); ?>
				<?php } ?>
			</section>

		</div>
	</div>
	
</div>
<?php } ?>	
