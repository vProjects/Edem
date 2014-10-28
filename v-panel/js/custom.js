$(function() {
	  	//publicly defining variables
	  	var positions, curId, dataArray_pos, id, stryear, stpyear, childrenstr, childrenstp; 
	  	var dataArray = [];
	  	var columnId = columnIdjs;
	  	var columnIdArray = columnIdArrayjs;
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
	      .addClass( "ui-widget-header ui-corner-all" );
	      
	    $( ".portlet-toggle" ).click(function() {
		    var icon = $( this );
		    icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		    icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
		});
	    
	    $("#buttonSubmit").click(function(){
	    	jsonInsertion(dataArray, curriculumChangeArrayJs);
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
	    
	    function jsonInsertion(dataArray, curriculumChangeArrayJs)
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
				   data: "data="+finalString+"&curriculumChangeData="+curriculumChangeArrayJs,
				   success: function(e){
				    	console.log(e);
				    	//alert(finalString);
				    	//location.reload();
				    	return false;
				}});
			}
			else
			{
				alert("Please make some valid changes.");
			}
	    }
