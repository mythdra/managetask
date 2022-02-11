function back() {
	history.back();
  	return false;
}




document.addEventListener("DOMContentLoaded", function(event) {
	$("#hide").hide();
	

	$(".resetpass").each(function () { 
		$(this).on("submit", function (e) {
			var name = ($(this).find($('input[type=hidden]'))).val();
			var result = confirm("Bạn có chắc cài lại mật khẩu cho tài khoản "+name+" không?");
			if(result == true){
				var $form = $(this);
				var $inputs = $form.find("input, select, button, textarea");
				var serializedData = $form.serialize();
				$inputs.prop("disabled", true);
				request = $.ajax({
					url: "?controller=account&action=resetpass",
					type: "post",
					data: serializedData
				});
				request.done(function (response, textStatus, jqXHR){
					console.log("Hooray, it worked!");
				});
				return true;
			} else{
				e.preventDefault();
			}
			$inputs.prop("disabled", false);
			return false;
		})
	});
	
	$(".removeacc").each(function () { 
		$(this).on("submit", function (e) {
			var name = ($(this).find($('input[type=hidden]'))).val();
			var result = confirm("Bạn có chắc xóa tài khoản "+name+" không?");
			if(result == true){
				var $form = $(this);
				var $inputs = $form.find("input, select, button, textarea");
				var serializedData = $form.serialize();
				$inputs.prop("disabled", true);
				request = $.ajax({
					url: "?controller=account&action=removeaccount",
					type: "post",
					data: serializedData
				});
				request.done(function (response, textStatus, jqXHR){
					console.log("Hooray, it worked!");
				});
				return true;
			} else{
				e.preventDefault();
			}
			$inputs.prop("disabled", false);
			return false;
		})
	});
});

