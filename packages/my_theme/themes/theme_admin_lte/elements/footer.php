<?php      
defined('C5_EXECUTE') or die(_("Access Denied."));
$u=new User();
 ?>

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <!-- Anything you want -->
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php echo Config::get('concrete.site'); ?> . <?php echo date("Y"); ?></strong>
      </footer>
	  
		<!-- Display myURLTheme For JS -->
		<input type="hidden" name="myURLTheme" id="myURLTheme" value="<?php echo $_SESSION['myURLTheme']; ?>">

    </div><!-- ./wrapper -->

	</div>
	
	<?php 
		Loader::element('footer_required');
	?>

    <!-- Page script -->
    <script>
      $(function () {
	  
		//Resize Windows
		//$('#browserInfo').text('Browser (Width : ' + $(window).width() + ' , Height :' + $(window).height() + ' )');

		//$(window).resize(function () {
			//$('#browserInfo').text('Browser (Width : ' + $(window).width() + ' , Height :' + $(window).height() + ' )');
		//});
		
		//Disable Key Enter
		$('html').bind('keypress', function(e)
		{
		   if(e.keyCode == 13)
		   {
			  return false;
		   }
		});
			
        //Initialize Select2 Elements
        $(".select2").select2();
		
      });
    </script>
		
	</div>
	
  </body>
</html>
