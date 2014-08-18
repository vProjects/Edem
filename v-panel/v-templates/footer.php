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
