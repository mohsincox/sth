<!doctype html>
<html>
<head>
<title>Send local storage value to server using AJAX</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<!-- <link href="css/custom.css" rel="stylesheet" /> -->
<style type="text/css">
</style>
</head>
<body>
<div class="wrapper">
  <header>
    <div class="container">
    <h1 class="col-lg-9">Send local storage value to server using AJAX</h1>
    
    </div>
  </header>
  <div class="container">
    <h5>Author: Julian Hansen, September 2016</h5>
    <p>Enter a username and click <b>Set LS</b> to write to LocalStorage.<br/> 
       Click <b>Send to Server</b> to send the value to the server.<br/>
       Click <b>Clear</b> to Clear Local Storage value</p>
<div class="row">
      <div class="col-sm-4">
        <div class="row">
          <label class="col-sm-3" for="username">Username</label>
          <div class="col-sm-9">
            <input class="form-control text-right" type="text" id="username" /> 
          </div>
          <br/><br/>
          <div class="col-sm-12 text-right">
            <button class="btn btn-default" id="setLS">Set LS</button> &nbsp;
            <button class="btn btn-primary" id="sendLS">Send To Server</button> &nbsp; 
            <button class="btn btn-danger" id="clearLS">Clear LS</button>
          </div>
        </div>
      </div>
    </div>
<!-- INCLUDE "t1603.php:PHP" -->
</div>
</div>
<footer>
  <div class="container">
    Copyright Julian Hansen &copy; 2016
  </div>
</footer>
 
<script src="http://code.jquery.com/jquery.js"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(function() {
  $('#setLS').click(function(e) {
    e.preventDefault();
    var username = $('#username').val();
    window.localStorage.setItem("PortalLoginApp.userName", username);
  });
  $('#clearLS').click(function(e) {
    e.preventDefault();
    localStorage.clear(); 
    $('#username').val('');
  });
  $('#sendLS').click(function(e) {
    e.preventDefault();
    var userName = window.localStorage.getItem("PortalLoginApp.userName");
    $.ajax({
           url: 't1603.php',
           data: {userName: userName},
           type: 'POST' 
    }).done(function(resp) {
          alert(resp);
    });
   });
});
</script>
</body>
</html>
 
