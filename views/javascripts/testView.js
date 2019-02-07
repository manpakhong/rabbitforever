// JavaScript Document
$(document).ready(function(){ 
	//alert('helo');
	var editor = CKEDITOR.replace("editor1");
	$("#test").click(function(){
		
	  var html=editor.getSnapshot();
	  var dom=document.createElement("DIV");
		dom.innerHTML=html;
		var plain_text=(dom.textContent || dom.innerText);

		alert(editor.getData());
		alert(html);
		editor.setData('Change content');
	});
	$("#test2").click(function(){

	  var html=CKEDITOR.instances.editor1.getSnapshot();
	  var dom=document.createElement("DIV");
		dom.innerHTML=html;
		var plain_text=(dom.textContent || dom.innerText);
		alert(plain_text);
		alert(html);
	});	

	$("#submit").click(function(){
		$.ajax({
			type: 'POST',
			// make sure you respect the same origin policy with this url:
			// http://en.wikipedia.org/wiki/Same_origin_policy
			url: '../..//commanders/TestCommander.php',
			data: { 
				'command': 'select', 
				'data': 'data',
				'objectName': 'testDto'
			},
			success: submitResult
		});	
	});	

	

}); // end $(document).ready

function submitResult(data, status){
	alert("Data: " + data + "\nStatus: " + status); 
}

function createTextSnippet() {
    //example as before, replace YOUR_TEXTAREA_ID
    var html=CKEDITOR.instances.editor1.getSnapshot();
    var dom=document.createElement("DIV");
    dom.innerHTML=html;
    var plain_text=(dom.textContent || dom.innerText);

    //create and set a 128 char snippet to the hidden form field
    var snippet=plain_text.substr(0,127);
    document.getElementById("hidden_snippet").value=snippet;

    //return true, ok to submit the form
    return true;
}