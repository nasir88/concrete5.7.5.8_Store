<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<span class="vivid-store-utility-links">

    <?php if ($popUpCart) { ?>
		<a href="javascript:vividStore.displayCart()" class="btn navbar-btn btn-primary cart-link">
    <?php } else { ?>
		<a href="<?=View::url('/cart')?>" class="btn navbar-btn btn-primary cart-link">
    <?php } ?>
			
			<i class="fa fa-shopping-cart"></i> &nbsp;
			
			<?php if($showCartItems){?>
			<span class="items-in-cart"><span class="items-counter"><?=$itemCount?></span> <?=$itemsLabel?></span>
			<?php } ?>
			
			<?php if($showCartTotal){?>
			 : <span class="total-cart-amount"><?=$total?></span>
			<?php } ?>
	
		</a>
    
</span>
<?php if(\Config::get('vividstore.cartOverlay')){?>
<script>
    $('.cart-link').click(function(e){
        e.preventDefault();
        vividStore.displayCart();
    });
</script>
<?php } ?>
