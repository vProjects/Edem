	</div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    <!--- cdn for calendar view date -->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript">
    $(function() {
      $( "#calender_date" ).datepicker();
      $( "#calender_date" ).datepicker("option", "dateFormat","yy-mm-dd");
     });
     
     $(function() {
      $( "#calender_date2" ).datepicker();
      $( "#calender_date2" ).datepicker("option", "dateFormat","yy-mm-dd");
     });
    </script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!--  Admin Scripts - Include with every page -->
    <script src="js/admin.js"></script>

	<script type = "text/javascript">
  $(function() {
    $( ".column" ).sortable({
      connectWith: ".column",
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
    });
 
    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
 
    $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
  });
  </script>
	
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
    
    <!-- codes country and states -->
    <script type="text/javascript">
		$('#country').change(function(){
			var data = "id="+$(this).val();
			
			//make the ajax request
			 $.ajax({
	            type: "POST",
	            url:"v-includes/ajax/function.getProvince.php",
	            data: data,
	            success:function(result){
	            	$('#province').html(result);
	                return false;
	        }});
		});
		$('#one li a').click(function(){
			var livalue = $('#one li').attr("id");
			$('#exampleInputEmail1').val(livalue);
		});
		$('#two li a').click(function(){
			var livalue = $(this).html();
			$('#exampleInputEmail2').val(livalue);
		});
		$('#three li a').click(function(){
			var livalue = $(this).html();
			$('#exampleInputEmail3').val(livalue);
		});
		$('#four li a').click(function(){
			var livalue = $(this).html();
			$('#exampleInputEmail4').val(livalue);
		});
	</script>
	 
    <!-- js for calender view -->
    <script type="text/javascript" src="components/underscore/underscore-min.js"></script>
	<script src="js/calendar.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
		var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	
</body>

</html>
