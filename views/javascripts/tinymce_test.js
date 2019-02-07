/**
 * 
 */
var tinymce_editor = null;
// JavaScript Document
$(document).ready(function(){ 
	  tinymce_editor = tinymce.init({
		    selector: '#blogEditor',
		    theme: 'modern',
		    inline: false,
			plugins: [
			  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
			  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
			  'save table contextmenu directionality emoticons template paste textcolor'
			],
			content_css: '../../views/javascripts /tinymce/skins/lightgray/content.min.css',
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		  });
}); // end $(document).ready

function test_onclick(e){
	var editor = tinymce_editor;
	var raw = tinyMCE.activeEditor.getContent({format : 'text'});
	var content = tinyMCE.activeEditor.getContent({format : 'html'});
	tinyMCE.activeEditor.setContent("test, of a <br/> hello");
	var a = 3;
}