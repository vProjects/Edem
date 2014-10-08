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
  	var id, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5; 
  	$( ".column" ).sortable({
      start: function(event, ui)
      {
      	childrenstr1 = $(".year1 .portlet-content").length;
      	childrenstr2 = $(".year2 .portlet-content").length;
      	childrenstr4 = $(".year4 .portlet-content").length;
      	childrenstr5 = $(".year5 .portlet-content").length;
      	//alert(childrenstr1);
      	//alert(childrenstr2);
      	//alert(childrenstr4);
      	//alert(childrenstr5);
      },	
      stop: function(event, ui)
      {
      	childrenstp1 = $(".year1 .portlet-content").length;
      	childrenstp2 = $(".year2 .portlet-content").length;
      	childrenstp4 = $(".year4 .portlet-content").length;
      	childrenstp5 = $(".year5 .portlet-content").length;
      	//alert(childrenstp1);
      	//alert(childrenstp2);
      	//alert(childrenstp4);
      	//alert(childrenstp5);
      	compare(id, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5);
      },
      remove: function(event, ui)
      {
      	id = ui.item.children(".portlet-content").children("li").attr("id");
      	//alert(id);
      	div = ui.placeholder.html();
      	//alert(div);
      },
      connectWith: ".column",
      handle: ".portlet-content",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
    });
 
    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
       
 
    $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
   });
    
    function compare(id, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5)
    {
    	var year;
    	if(childrenstr1 != childrenstp1)
    	{
    		//alert("changed");
    		//alert(id);
    		//alert("year1");
    		year = 1;
    	}
    	if(childrenstr2 != childrenstp2)
    	{
    		//alert("changed");
    		//alert(id);
    		//alert("year2");
    		year = 2;
    	}
    	if(childrenstr4 != childrenstp4)
    	{
    		//alert("changed");
    		//alert(id);
    		//alert("year4");
    		year = 4;
    	}
    	if(childrenstr5 != childrenstp5)
    	{
    		//alert("changed");
    		//alert(id);
    		//alert("year5");
    		year = 5;
    	}	
    }
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
