<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php'); 

$this->inc('elements/menu.php'); 

$_1Content = new Area('1');
$_1ContentBlocks = $_1Content->getTotalBlocksInArea($c);
$_1ContentDisplay = $_1ContentBlocks > 0 || $c->isEditMode();
?>
	
<?php if ($_1ContentDisplay) { ?>

	<div class="row">
		<div class="col-lg-12">
			<?php $_1Content->display($c); ?>
		</div>
	</div>
	
<?php } ?>


	<div class="row">
		<div class="col-lg-12">
		
			<ul>
			<?php 
				$db = Database::get();
				$r = $db->Execute("SELECT * FROM VividStoreProducts");

				foreach ($r as $k=>$store_product) {
			?>
			<li>
				<?php  echo $store_product['pName']; ?>
			</li>
			<?php 
				}
			?>
			</ul>
		
		
		</div>
	</div>




<?php  $this->inc('elements/footer.php'); ?>
