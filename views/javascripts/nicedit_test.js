/**
 * 
 */
var niceditor = null;
// JavaScript Document
$(document).ready(function(){ 
	niceditor = bkLib.onDomLoaded(function() {
//		new nicEditor().panelInstance('blogEditor');
//		new nicEditor({fullPanel : true}).panelInstance('blogEditor');
		new nicEditor({iconsPath : '../../views/javascripts/niceditor/nicEditorIcons.gif'}).panelInstance('blogEditor');
//		new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('blogEditor');
//		new nicEditor({maxHeight : 100}).panelInstance('blogEditor');
	});
}); // end $(document).ready

function test_onclick(e){
	var editor = niceditor;
	var a = 3;
}