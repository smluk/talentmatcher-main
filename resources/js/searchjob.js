var $keyword = '';
var $category = '';
var $location = '';
var $nowcheck = '';
$(function() {
	 
	(function ($) {
		$.getUrlParam = function (name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if (r != null) return unescape(r[2]); return null;
		}
	})(jQuery);
	$keyword = $.getUrlParam('keyword');
	$.ajax({
		type : 'get',
		url : "/search",
		data : {"type":'job',"keyword":$keyword,'category':$category,"location":$location,"skill_id":$nowcheck},
		success : function(data) {
			$("#restitle").html(data.split("card2").length-1+" Results:")
			$("#insert").html(data);
		}
	});
	$("#keyword").keyup(function() {
		$keyword = $(this).val();
		$.ajax({
			type : 'get',
			url : "/search",
			data : {"type":'job',"keyword":$keyword,'category':$category,"location":$location,"skill_id":$nowcheck},
			success : function(data) {
				$("#restitle").html(data.split("card2").length-1+" Results:")
				$("#insert").html(data);
			}
		});
	});
	$("#category").keyup(function() {
		$category = $(this).val();
		$.ajax({
			type : 'get',
			url : "/search",
			data : {"type":'job',"keyword":$keyword,'category':$category,"location":$location,"skill_id":$nowcheck},
			success : function(data) {
				$("#restitle").html(data.split("card2").length-1+" Results:")
				$("#insert").html(data);
			}
		});
	});
	$("#location").keyup(function() {
		$location = $(this).val();
		$.ajax({
			type : 'get',
			url : "/search",
			data : {"type":'job',"keyword":$keyword,'category':$category,"location":$location,"skill_id":$nowcheck},
			success : function(data) {
				$("#restitle").html(data.split("card2").length-1+" Results:")
				$("#insert").html(data);
			}
		});
	});
	$(".skill").click(function() {
		$nowcheck = $(this).attr('id').replace("vbtn-radio","");
		if($nowcheck=='0'){
			$nowcheck='';
		}
		$.ajax({
			type : 'get',
			url : "/search",
			data : {"type":'job',"keyword":$keyword,'category':$category,"location":$location,"skill_id":$nowcheck},
			success : function(data) {
				$("#restitle").html(data.split("card2").length-1+" Results:")
				$("#insert").html(data);
			}
		});
	});
});