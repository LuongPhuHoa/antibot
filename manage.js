/*
* @Author: Nokia 1337
* @Date:   2019-09-12 23:18:24
* @Last Modified by:   Nokia 1337
* @Last Modified time: 2019-09-13 18:53:28
*/
function validate(){
	var apikeys = document.getElementById("apikey").value;
	if(apikeys == ''){
		Swal.fire({
		  title: 'Please check again',
		  text: 'You have to fill in apikey',
		  type: 'info',
		});
		return false;
	}
	$.post("/api/auth", {apikey: apikeys}, function(result){
	    var json = JSON.parse(result);
	    if(json['status'] == true){
	    	Swal.fire({
			  title: 'Authorizations Success (Pleas wait)',
			  text: json['respons']['message'],
			  type: 'success',
			});
			setTimeout(function(){ 
				window.location.href="/manage";
			}, 1000);  
	    }else{
	    	Swal.fire({
			  title: 'Authorizations Failed',
			  text: json['respons']['message'],
			  type: 'error',
			});
	    }
	});
}
function deletes(id){
	$.get("/delete/"+id, function(data, status){
		var json = JSON.parse(data);
		if(json['status'] == true){
	    	Swal.fire({
			  title: 'Delete Success',
			  text: json['respons']['message'],
			  type: 'success',
			});
			setTimeout(function(){ 
				window.location.href="/manage";
			}, 1000);  
	    }else{
	    	Swal.fire({
			  title: 'Delete Failed',
			  text: json['respons']['message'],
			  type: 'error',
			});
	    }
	});
}
function loadTable(tableId, fields, data) {
    var rows = '';
    $.each(data, function(index, item) {
      var row = '<tr>';
      $.each(fields, function(index, field) {
        row += '<td>' + item[field + ''] + '</td>';
      });
      rows += row + '<tr>';
    });
    $('#' + tableId + ' tbody').html(rows);
}
function generateLink(){
	var url 		= document.getElementById("url").value;
	var blocked 	= document.getElementById("blocked").value;
	if(url == '' || blocked == '' ){
		Swal.fire({
		  title: 'Please check again',
		  text: 'You have to fill all form.',
		  type: 'info',
		});
		return false;
	}
	$.post("/api/generate", {url: url,blocked: blocked}, function(result){
	    var json = JSON.parse(result);
	    if(json['status'] == true){
	    	Swal.fire({
			  title: 'Generate Success',
			  text: json['respons']['message'],
			  type: 'success',
			});
			setTimeout(function(){ 
				window.location.href="/manage";
			}, 1000);  
	    }else{
	    	Swal.fire({
			  title: 'Generate Failed',
			  text: json['respons']['message'],
			  type: 'error',
			});
	    }
	});
}

function fallbackCopyTextToClipboard(text) {
		var textArea = document.createElement("textarea");
		textArea.value = text;
		document.body.appendChild(textArea);
		textArea.focus();
		textArea.select();

		try {
		var successful = document.execCommand('copy');
		var msg = successful ? 'successful' : 'unsuccessful';
		console.log('Fallback: Copying text command was ' + msg);
		} catch (err) {
		console.error('Fallback: Oops, unable to copy', err);
		}

		document.body.removeChild(textArea);
}
function copyTextToClipboard(text) {
	  if (!navigator.clipboard) {
	    fallbackCopyTextToClipboard(text);
	    return;
	  }
	  navigator.clipboard.writeText(text).then(function() {
	    alert('Async: Copying to clipboard was successful!');
	  }, function(err) {
	    alert('Async: Could not copy text: ', err);
	  });
}

var copyBobBtn 	= document.querySelector('.js-copy-bob-btn'),copyJaneBtn = document.querySelector('.js-copy-jane-btn');

copyBobBtn.addEventListener('click', function(event) {
  copyTextToClipboard( document.getElementById("shortlinkID").value );
});

copyJaneBtn.addEventListener('click', function(event) {
  copyTextToClipboard( document.getElementById("linkID").value );
});