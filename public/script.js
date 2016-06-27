$(document).ready(function(e) {
	$("#add").click(function(e){
		e.preventDefault();
		var action = "add";
		var name = $("#new_member").val();
		var id = $("#project_id").val();
		var dataString = 'action='+ action + '&new_member='+ name + '&project_id=' + id;

		$.ajax({
			type: "POST",
			url: "addMembers.php",
			data: dataString,
			cache: false,
			success: function(result){
                console.log(result);
            	alert($('ul#someList li:first').attr('id'));
                $('.members_list').append(
                	'<li>' +
 						'<button title="Delete User" class="delete">x</button>' +
						'<span>' + $("#new_member option:selected").text() + '</span>' +
						'<input type="hidden" id="member_id" name="member_id" value="{{mem.id}}">' +	
                	'</li>'
                );
                $("#new_member option:selected").remove();
            }	
		});
	});

	$(".delete").click(function(e){
		e.preventDefault();
		var action = "delete";
		var name = $("#member_id").val();
		var id = $("#project_id").val();
		var dataString = 'action='+ action + '&member_id='+ name + '&project_id=' + id;
		$.ajax({
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