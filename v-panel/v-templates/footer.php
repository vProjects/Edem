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
	  	var positions, curId, dataArray_pos, id, stryear, stpyear, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5; 
	  	var dataArray = [];
	  	$( ".column1, .column2, .column4, .column5" ).sortable({
	  	  start: function(event, ui)
	      {
	      	//counting number of children of each div of each different year before sorting
	      	childrenstr1 = $(".year1 .portlet-content").length;
	      	childrenstr2 = $(".year2 .portlet-content").length;
	      	childrenstr4 = $(".year4 .portlet-content").length;
	      	childrenstr5 = $(".year5 .portlet-content").length;
	      },
	      remove: function(event, ui)
	      {
	      	//getting id of moved item
	      	id = ui.item.children(".portlet-content").children("li").attr("id");
	      },	
	      stop: function(event, ui)
	      {
	      	//counting number of children of each div of each different year after sorting
	      	childrenstp1 = $(".year1 .portlet-content").length;
	      	childrenstp2 = $(".year2 .portlet-content").length;
	      	childrenstp4 = $(".year4 .portlet-content").length;
	      	childrenstp5 = $(".year5 .portlet-content").length;
	      	
	      	//calling the function compare
	      	compare(positions, curId, dataArray_pos, id, dataArray, stryear, stpyear, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5);
	      },
	      connectWith: ".column1, .column2, .column4, .column5",
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
		function disableSorting()
	    {
	    	$( ".column1, .column2, .column4, .column5" ).sortable({ disabled: true });
	    }
    
        //this allows to disable sorting and not allowing sorting of the presently moving item  
    	function cancelSorting()
    	{
    		$( ".column1" ).sortable( "cancel" );
    	}
    	
	    function compare(positions, curId, dataArray_pos, id, dataArray, stryear, stpyear, childrenstr1, childrenstr2, childrenstr4, childrenstr5, childrenstp1, childrenstp2, childrenstp4, childrenstp5,timeVal)
	    {
	    	//sortable method of a column will be disabled if the number of its items is less than 3
	    	if($(".column1").children(".portlet").children(".portlet-content").length < 3)
		    {
		     	cancelSorting();
		    }	
		    if($(".column2").children(".portlet").children(".portlet-content").length < 3)
		    {
		      	cancelSorting();
		    }
		    if($(".column4").children(".portlet").children(".portlet-content").length < 3)
		    {
		      	cancelSorting();
		    }
		    if($(".column5").children(".portlet").children(".portlet-content").length < 3)
		    {
		      	cancelSorting();
		    }
	    	/*if number of items in a div at sorting start is greater than number of items
	    	in the same div at sorting end , that div will be the starting div and vice versa*/
	    	if(childrenstr1 > childrenstp1)
	    	{
	    		stryear = 1;
	    		disableSorting();
	    	}
	    	if(childrenstr2 > childrenstp2)
	    	{
	    		stryear = 2;
	    		disableSorting();
	    	}
	    	if(childrenstr4 > childrenstp4)
	    	{
	    		stryear = 4;
	    		disableSorting();
	    	}
	    	if(childrenstr5 > childrenstp5)
	    	{
	    		stryear = 5;
	    		disableSorting();
	    	}	
	    	if(childrenstr1 < childrenstp1)
	    	{
	    		stpyear = 1;
	    		disableSorting();
	    	}
	    	if(childrenstr2 < childrenstp2)
	    	{
	    		stpyear = 2;
	    		disableSorting();
	    	}
	    	if(childrenstr4 < childrenstp4)
	    	{
	    		stpyear = 4;
	    		disableSorting();
	    	}
	    	if(childrenstr5 < childrenstp5)
	    	{
	    		stpyear = 5;
	    		disableSorting();
	    	}
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
				    	//location.reload();
				    	return false;
				}});
			}
			else
			{
				alert("Please make some valid changes.");
			}
	    }
	    
	    //jquery to send student excel files to function.insert-excel.php
		$("#studfile").click(function(event){
	 
		  //disable the default form submission
		  event.preventDefault();
		 
		  //grab all form data  
		  var formData = new FormData($("form#studinfo")[0]);
		 
		  $.ajax({
		    url: 'v-includes/functions/function.create-student.php',
		    type: 'POST',
		    data: formData,
		    async: false,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function (returndata) {
		      //alert(returndata);
		      console.log(returndata);
		    }
		  });
		 
		  return false;
		});
		
		//jquery to send faculty excel files to function.insert-excel.php
		$("#facfile").click(function(event){
	 
		  //disable the default form submission
		  event.preventDefault();
		 
		  //grab all form data  
		  var formData = new FormData($("form#facinfo")[0]);
		 
		  $.ajax({
		    url: 'v-includes/functions/function.create-faculty.php',
		    type: 'POST',
		    data: formData,
		    async: false,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function (returndata) {
		      //alert(returndata);
		      console.log(returndata);
		    }
		  });
		 
		  return false;
		});
		
		//jquery to send chairperson excel files to function.insert-excel.php
		$("#chrfile").click(function(event){
	 
		  //disable the default form submission
		  event.preventDefault();
		 
		  //grab all form data  
		  var formData = new FormData($("form#chrinfo")[0]);
		 
		  $.ajax({
		    url: 'v-includes/functions/function.create-chairperson.php',
		    type: 'POST',
		    data: formData,
		    async: false,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function (returndata) {
		      //alert(returndata);
		      console.log(returndata);
		    }
		  });
		 
		  return false;
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
