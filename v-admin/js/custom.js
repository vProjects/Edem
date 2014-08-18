// JavaScript Document
$(document).ready(function(e) {
    //for getting province list
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
	
	//getting session list from institute 
	$(document).on('change', '#group_inst', function() { 
		var inst = $(this).val();
		if(inst != -1)
		{
			sendingData = 'inst_id='+inst+'&refData=facultyListFromInstitute';
			$.ajax({
				type: "POST",
				url:"v-includes/library/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#group_fac').html(result);
					return false;
			}});
		}
	});
	
	//getting session list from institute 
	$(document).on('change', '#group_inst', function() { 
		var inst = $(this).val();
		if(inst != -1)
		{
			sendingData = 'institute='+inst+'&refData=studentList';
			$.ajax({
				type: "POST",
				url:"v-includes/library/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#grp_student').html(result);
					return false;
			}});
		}
	});
	
	//getting student list from institute and session
	$(document).on('change', '#group_session', function() { 
		var session = $(this).val();
		var inst = $('#group_inst').val();
		if(session != -1 && inst != -1)
		{
			sendingData = 'session='+session+'&institute='+inst+'&refData=studentList';
			$.ajax({
				type: "POST",
				url:"v-includes/library/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#grp_student').html(result);
					return false;
			}});
		}
	});
	
	//geting selected student list
	$(document).on('click', '#stu_select', function () { 
		//getting selected student value in array
		var selectedStuIDs = $('#grp_student option:selected').map(function(){
		  return $(this).val();
		}).get();
		
		//getting already selected student value in array
		var setStuIDs = $('#selected_student option').map(function(){
		  return $(this).val();
		}).get();
		
		sendingData = 'selectedStuId='+selectedStuIDs+'&setStuId='+setStuIDs+'&refData=insertStudentList';
		
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				$('#selected_student').append(result);
				return false;
		}});
	});
	
	//removing selected student id from selected section
	$(document).on('click', '#stu_deselect', function () { 
		//getting selected value already selected student list in array
		var removeStuIDs = $('#selected_student option:selected').map(function(){
		  return $(this).val();
		}).get();
		
		//getting already selected student value in array
		var setStuIDs = $('#selected_student option').map(function(){
		  return $(this).val();
		}).get();
		
		sendingData = 'removeStuId='+removeStuIDs+'&setStuId='+setStuIDs+'&refData=removeStudentList';
		
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				$('#selected_student').html(result);
				return false;
		}});
	});
	
	//getting different value list from institute
	$(document).on('change', '#event_inst', function() { 
		var inst = $(this).val();
		if(inst != -1)
		{
			sendingData = 'institute='+inst+'&refData=chairpersonListFromInst';
			$.ajax({
				type: "POST",
				url:"v-includes/library/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#event_chair').html(result);
					
					//getting values of faculty
					sendingData2 = 'institute='+inst+'&refData=facultyListFromInst';
					$.ajax({
						type: "POST",
						url:"v-includes/library/class.fetchData.php",
						data: sendingData2,
						beforeSend:function(){
							// this is where we append a loading image
							$('').html('');
						  },
						success:function(result2){
							//console.log(result);
							$('#event_fac').html(result2);
							
							//getting values of room number
							sendingData3 = 'institute='+inst+'&refData=roomListFromInst';
							$.ajax({
								type: "POST",
								url:"v-includes/library/class.fetchData.php",
								data: sendingData3,
								beforeSend:function(){
									// this is where we append a loading image
									$('').html('');
								  },
								success:function(result3){
									//console.log(result);
									$('#event_room').html(result3);
									
									//getting values of groups
									sendingData4 = 'institute='+inst+'&refData=groupListFromInst';
									$.ajax({
										type: "POST",
										url:"v-includes/library/class.fetchData.php",
										data: sendingData4,
										beforeSend:function(){
											// this is where we append a loading image
											$('').html('');
										  },
										success:function(result4){
											//console.log(result);
											$('#event_grp').html(result4);
											return false;
									}});
									
									return false;
							}});
							
							return false;
					}});
					
					return false;
			}});
		}
	});
	
	//geting selected group list
	$(document).on('click', '#grp_select', function () { 
		//getting selected student value in array
		var selectedGroupIDs = $('#event_grp option:selected').map(function(){
		  return $(this).val();
		}).get();
		
		//getting already selected student value in array
		var setGroupIDs = $('#selected_grp option').map(function(){
		  return $(this).val();
		}).get();
		
		sendingData = 'selectedGroupId='+selectedGroupIDs+'&setGroupId='+setGroupIDs+'&refData=insertGroupList';
		
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				$('#selected_grp').append(result);
				return false;
		}});
	});
	
	//removing selected group id from selected section
	$(document).on('click', '#grp_deselect', function () { 
		//getting selected value already selected student list in array
		var removeGroupIDs = $('#selected_grp option:selected').map(function(){
		  return $(this).val();
		}).get();
		
		//getting already selected student value in array
		var setGroupIDs = $('#selected_grp option').map(function(){
		  return $(this).val();
		}).get();
		
		sendingData = 'removeGroupId='+removeGroupIDs+'&setGroupId='+setGroupIDs+'&refData=removeGroupList';
		
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				$('#selected_grp').html(result);
				return false;
		}});
	});
	
	//getting faculty list from selection of institute
	$(document).on('click', '#course_inst', function () { 
		//getting institute value
		var inst = $(this).val();
		if(inst != -1)
		{
			sendingData = 'inst_id='+inst+'&refData=facListFromInst';
			$.ajax({
				type: "POST",
				url:"v-includes/library/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#course_adv').html(result);
					return false;
			}});
		}
	});
	
	//getting course list from selection of institute
	$(document).on('click', '#course_inst', function () { 
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
					$('').html('');
				  },
				success:function(result){
					//console.log(result);
					$('#curri_course').html(result);
					return false;
			}});
		}
	});
	
	
	
});