$(document).ready(function() {
	$("#add").click(function(){
		var action = "add";
		var name = $("#new_member").val();
		var id = $("#project_id").val();
		var dataString = 'action='+ action + '&new_member='+ name + '&project_id=' + id;
		return $.ajax({
			type: "POST",
			url: "addMembers.php",
			data: dataString,
			cache: false,
			success: function(result){
                console.log(result);
            }	
		});
	});

	$(".delete").click(function(){
		var action = "delete";
		var name = $("#member_id").val();
		var id = $("#project_id").val();
		var dataString = 'action='+ action + '&member_id='+ name + '&project_id=' + id;
		return $.ajax({
			type: "POST",
			url: "addMembers.php",
			data: dataString,
			cache: false,
			success: function(result){
                console.log(result);
            }	
		});
	});

});