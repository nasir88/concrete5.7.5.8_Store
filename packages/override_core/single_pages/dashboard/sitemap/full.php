<?php
defined('C5_EXECUTE') or die("Access Denied.");
$sh = Loader::helper('concrete/dashboard/sitemap');
?>

<?php if ($sh->canRead()) { ?>

	<div class="ccm-dashboard-content-full">
	<script type="text/javascript">
		$(function() {
			$('div#ccm-full-sitemap-container').concreteSitemap({
				includeSystemPages: $('input[name=includeSystemPages]').is(':checked')
			});

			$('input[name=includeSystemPages]').on('click', function() {
				var $tree = $('div#ccm-full-sitemap-container');
				$tree.dynatree('destroy');
				$tree.concreteSitemap({
					includeSystemPages: $('input[name=includeSystemPages]').is(':checked')
				})
			});
		});
	</script>

	<style type="text/css">
	div#ccm-full-sitemap-container {
		margin-left: 10px;
	}
	</style>
		
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="icon fa fa-info"></i>
		<?php echo t('This is your pages menu. To add/edit a page, click the name page.')?>
	</div>

	<form action="<?php echo URL::to('/'.$_SESSION['myURLTheme'].'/sitemap/search')?>"  class="form-inline ccm-search-fields-none ccm-search-fields">
		
		<div class="row">
			<div class="col-nsr-100 padLeftRight15">
			
				<div class="input-group width40 mobile-width pull-left mobile-pull-left">
					<?php echo $form->search('cvName', array('placeholder' => t('Page Name')), array('class' => 'width400px'))?>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-block btn-primary widthAuto" tabindex="-1"><?php echo t('Search')?></button>
					</span>
				</div>
		
			</div>
		</div>
		
	</form>


	<?php $u = new User();
	if ($u->isSuperUser()) {
		if (Queue::exists('copy_page')) {
		$q = Queue::get('copy_page');
		if ($q->count() > 0) { ?>

			<div class="alert alert-warning">
				<?php echo t('Page copy operations pending.')?>
				<button class="btn btn-xs btn-default pull-right" onclick="ConcreteSitemap.refreshCopyOperations()"><?php echo t('Resume Copy')?></button>
			</div>

		<?php }
	}

	} ?>


		<div id="ccm-full-sitemap-container"></div>

	<?php 
		if ($u->isSuperUser()) {
	?>
		<hr/>
		<section>
	<?php 
		}else{
	?>
		<!--<hr/>-->
		<section style="display:none;">
	<?php 
		}
	?>
			<div class="checkbox">
			<label>
				<input type="checkbox" name="includeSystemPages" checked value="1" />
				<!--<input type="checkbox" name="includeSystemPages" <?php //if ($includeSystemPages) { ?>checked<?php //} ?> value="1" /> -->
				<?php echo t('Include System Pages in Sitemap')?>
			</label>
			</div>
		</section>


	</div>
<?php } else { ?>

	<p><?php echo t("You do not have access to the sitemap.");?></p>

<?php } ?>
