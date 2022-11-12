/*	You can do this */
console.log("%c Developed by DeveloperMen.IR All Right Reserved. ","font-weight: bold; font-size: 14px;color:#000;background-color:#f7b914;padding:5px 8px;border-radius:5px");

// preview image when image upload select

jQuery(function($){

	$("[data-toggle=ImgUp]").change(function () {
		if($(this).data('preview-id')) {
			var _this = this;
			if (_this.files && _this.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("img#" + $(_this).data('preview-id')).attr('src', e.target.result);
				};
				reader.readAsDataURL(_this.files[0]);
			}
		}


	})
	$('[data-toggle=removeImg]').click(function () {

		$("#" + $(this).data('input-id')).val('');
		
		$(this).prev().attr("src",'#');
		$('#' + $(this).data('input-id')+'-def') .attr('value','');
		$(this).next().remove();
	})
});