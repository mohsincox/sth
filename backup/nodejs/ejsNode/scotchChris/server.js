// server.js
// load the things we need
var express = require('express');
var app = express();
var mysql = require('mysql');


// set the view engine to ejs
app.set('view engine', 'ejs');

// use res.render to load up an ejs view file

// index page 
app.get('/', function(req, res) {
	var obj = {};
	var con = mysql.createConnection({
  		host: "localhost",
  		user: "root",
  		password: "m",
  		database: "nodejs"
	});
    var drinks = [
        { name: 'Bloody Mary', drunkness: 3 },
        { name: 'Martini', drunkness: 5 },
        { name: 'Scotch', drunkness: 10 }
    ];
    var tagline = "Any code of your own that you haven't looked at for six or more months might as well have been written by someone else.";

    con.connect(function(err) {
		if (err) throw err;
		con.query("SELECT * FROM customers", function (err, result, fields) {
			if (err) throw err;
			var customers = result;
	        
	        res.render('pages/index', {
	        	drinks: drinks,
	        	tagline: tagline,
	        	customers: customers
	    	});

		});
	});

});
// app.get('/', function(req, res) {
//     res.render('pages/index');
// });


// about page 
app.get('/about', function(req, res) {
    res.render('pages/about');
});

app.listen(8080);
console.log('8080 is the magic port');