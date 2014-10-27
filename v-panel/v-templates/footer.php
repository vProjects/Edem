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
	  	//publicly defining variables
	  	var positions, curId, dataArray_pos, id, stryear, stpyear, childrenstr, childrenstp; 
	  	var dataArray = [];
	  	var columnId = '<?php echo($columnId);?>';
	  	var columnIdArray = '<?php echo json_encode($columnIdArray);?>';
	  	var columnIdArray = $.parseJSON(columnIdArray);
	  	var childrenstr = [];
	  	var childrenstp = [];
	  	$( columnId ).sortable({
	  	  start: function(event, ui)
	      {
	      	//counting number of children of each div of each different year before sorting
	      	$.each(columnIdArray, function( index, value ){
	      		childrenstr[value] = $(".year"+value+" .portlet-content").length;
	      	});
	      },
	      remove: function(event, ui)
	      {
	      	//getting id of moved item
	      	id = ui.item.children(".portlet-content").children("li").attr("id");
	      },	
	      stop: function(event, ui)
	      {
	      	//counting number of children of each div of each different year after sorting
	      	$.each(columnIdArray, function( index, value ){
	      		childrenstp[value] = $(".year"+value+" .portlet-content").length;
	      	});
	      	//calling the function compare
	      	compare(columnIdArray, columnId, positions, curId, dataArray_pos, id, dataArray, stryear, stpyear, childrenstr, childrenstp);
	      },
	      connectWith: columnId,
	      handle: ".portlet-content",
	      cancel: ".portlet-toggle",
	      placeholder: "portlet-placeholder ui-corner-all placeholder-bgcolor",
	      forcePlaceholderSize: true
	    });
	 	
	  	$( ".portlet" )
	      .addClass( "ui-widget-content ui-corner-all" )
	      .find( ".portlet-header" )
	      .addClass( "ui-widget-header ui-corner-all" )
	      
	    $( ".portlet-toggle" ).click(function() {
		    var icon = $( this );
		    icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		    icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
		});
	    
	    $("#buttonSubmit").click(function(){
	    	jsonInsertion(dataArray);
	    });
	   });
	   
		//this allows to disable sorting after allowing sorting of the presently moving item	  
		function disableSorting(columnId)
	    {
	    	$( columnId ).sortable({ disabled: true });
	    	return;
	    }
    
        //this allows to disable sorting and not allowing sorting of the presently moving item  
    	function cancelSorting(columnNo)
    	{
    		$( columnNo ).sortable( "cancel" );
    	}
    	
	    function compare(columnIdArray, columnId, positions, curId, dataArray_pos, id, dataArray, stryear, stpyear, childrenstr, childrenstp, timeVal)
	    {
	    	//sortable method of a column will be disabled if the number of its items is less than 3
	    	$.each(columnIdArray, function( index, value ){
	      		if($(".column"+value).children(".portlet").children(".portlet-content").length < 3)
			    {
			     	cancelSorting(".column"+value);
			     	return;
			    }	
	      	});
	    	/*if number of items in a div at sorting start is greater than number of items
	    	in the same div at sorting end , that div will be the starting div and vice versa*/
	    	$.each(columnIdArray, function(index,value){
	    		if(childrenstr[value] > childrenstp[value])
		    	{
		    		stryear = value;
		    		disableSorting(columnId);
		    	}
		    	if(childrenstr[value] < childrenstp[value])
		    	{
		    		stpyear = value;
		    		disableSorting(columnId);
		    	}
		    });
	    	if( typeof stryear != "undefined" && typeof stpyear != "undefined" )
	    	{
	    		dataArray_pos = stryear+'_'+stpyear;
		    	dataArray.push({
		    		positions : dataArray_pos,
		    		curId : id 
		    	});
	    	}
		}
	    
	    function jsonInsertion(dataArray)
	    {
	    	if(dataArray != "")
	    	{
		    	var jsonString ="";
		    	var studentid = "<?php echo $_SESSION['user_id'];?>";
		    	for(var i = 0, l = dataArray.length; i < l; i++) {
				  jsonString = jsonString+' "'+dataArray[i].positions+'":"'+dataArray[i].curId+'",';
				 }
				jsonString = jsonString.replace(/,\s*$/, "");
				var finalString = '{ '+jsonString+' }';
				$.ajax({
				   type: "POST",
				   url: "v-includes/functions/function.student-update-curriculum.php",
				   datatype: "json",
				   data: "data="+finalString,
				   success: function(e){
				    	console.log(e);
				    	alert(finalString);
				    	//location.reload();
				    	return false;
				}});
			}
			else
			{
				alert("Please make some valid changes.");
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