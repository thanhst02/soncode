$('#addimage').click(function() {
	myscript.appendImage();
	if($('#upload-image .col-md-4').length > 4){
		$('#removeimage').show();
	}
});
$('#removeimage').click(function() {
	myscript.removeImage();
	if($('#upload-image .col-md-4').length <= 4){
		$('#removeimage').hide();
	}
});
$(function(){
	if($('#upload-image .col-md-4').length <= 4){
		$('#removeimage').hide();
	}
});
var myscript = {
	appendImage:function(){
		var imageLoadfile = $('#upload-image .col-md-3').html();
		var index = $('#upload-image .col-md-3').length + 1;
		$('#upload-image').append('<div class = "col-md-3 image-item image-'+ index +'">' + imageLoadfile + '</div>');
	},
	removeImage:function(){
		var index = $('#upload-image .col-md-4').length;
		$('#upload-image .image-'+ index).remove();
	}
};



