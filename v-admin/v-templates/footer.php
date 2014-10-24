	</div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    <!--- cdn for calendar view date -->
	//<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript">
    // $(function() {
      // $( "#calender_date" ).datepicker();
      // $( "#calender_date" ).datepicker("option", "dateFormat","yy-mm-dd");
     // });
//      
     // $(function() {
      // $( "#calender_date2" ).datepicker();
      // $( "#calender_date2" ).datepicker("option", "dateFormat","yy-mm-dd");
     // });
    </script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!--  Admin Scripts - Include with every page -->
    <script src="js/admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
    
   	<script type = "text/javascript">
   	
   		//jquery to send chairperson excel files to function.create-chairperson.php
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
		
		
		//getting course list from selection of institute
		$(document).on('click', '#course_inst_excel', function () { 
			//getting institute value
			var inst = $(this).val();
			if(inst != -1)
			{
				sendingData = 'inst_id='+inst+'&refData=courseListFromInst';
				$.ajax({
					type: "POST",
					url:"v-includes/library/class.fetchData.php",
					data: sendingData,
					beforeSend:function(){
						// this is where we append a loading image
					  },
					success:function(result){
						//console.log(result);
						$('#curri_course_excel').html(result);
						return false;
				}});
			}
		});
		
		//jquery to send faculty excel files to function.create-faculty.php
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
	</script>

</body>

</html>
