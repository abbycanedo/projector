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
                if (name != null) {
	                $('.members_list').append(
	                	'<li class="new">' +
	                		'<button title="Delete User" value="'+ name +'" class="delete">x</button>' +
							'<span>' + $("#new_member option:selected").text() + '</span>' +
							'<input type="hidden" id= #"'+ name +'" name="member_id" value="{{mem.id}}">' +
	                	'</li>'
	                );

	                if ($('#new_member option').length <= 1) {
	                	$("#new_member").append("<option disabled class='empty_options'>No users available</option>");
	                };

	                $('li#empty').remove();

	                $("#new_member option:selected").remove();                	
                };
            }	
		});

		return false;

	});

	$(".delete").click(function(e){
		e.preventDefault();
		var action = "delete";
		var name_id = '#' + $(this).val();
		var name = $(name_id).val();
		var name_text = $(name_id).attr('name')
		var id = $("#project_id").val();
		var dataString = 'action='+ action + '&member_id='+ name + '&project_id=' + id;
		$.ajax({
			type: "POST",
			url: "addMembers.php",
			data: dataString,
			cache: false,
			success: function(result){
                console.log(result);
                if($('.members_list li').length <= 1){
                	 $('.members_list').append("<li id='empty'>No members found.</li>");
                }
                $("li").has(name_id).remove();
				$('#new_member').append("<option>"+name_text+"</option>");
				$(".empty_options").remove(); 
            }
		});
		return false;
	});

});