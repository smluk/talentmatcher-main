$(function() {
	$(".talent-btn").click(function() {
		var $value = $(this).is(":checked");
        var $skill_id = $(this).attr("id").replace("btn-","");
        var $bind_id = $('#uid').val();
        var $state = $value==true?"1":"0";
        var $type = "talent";
		// if ($value==''){
		// 	$("#result-tip").html("All books:");
		// }else{
		// 	$("#result-tip").html("Search result for:"+$value);
		// }
		$.ajax({
			type : 'get',
			url : "/setTags",
			data : {"type":$type,"state":$state,"skill_id":$skill_id,"bind_id":$bind_id},
			success : function(data) {
				console.log(data);
			}
		});
	});
    $(".job-btn").click(function() {
		var $value = $(this).is(":checked");
        var $skill_id = $(this).attr("id").replace("btn-","");
        var $bind_id = $('#uid').val();
        var $state = $value==true?"1":"0";
        var $type = "job";
		// if ($value==''){
		// 	$("#result-tip").html("All books:");
		// }else{
		// 	$("#result-tip").html("Search result for:"+$value);
		// }
		$.ajax({
			type : 'get',
			url : "/setTags",
			data : {"type":$type,"state":$state,"skill_id":$skill_id,"bind_id":$bind_id},
			success : function(data) {
				console.log(data);
			}
		});
	});
});