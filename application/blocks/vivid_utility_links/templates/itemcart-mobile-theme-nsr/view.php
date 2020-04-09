<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<span class="vivid-store-utility-links">

	<a href="javascript:vividStore.displayCart()" class="navbar-toggle btn navbar-btn btn-primary cart-link">
		<i class="fa fa-shopping-cart"></i> &nbsp;
		<span class="badge bg-red items-counter"><?=$itemCount?></span>
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
