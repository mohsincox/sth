// server.js
// load the things we need
var express = require('express');
var app = express();
var mysql = require('mysql');

var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended: false });

// set the view engine to ejs
app.set('view engine', 'ejs');

app.get('/', function(req, res) {
	var customers = {};
	
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodejs"
    });
    con.connect(function(err) {
		if (err) throw err;
		con.query("SELECT * FROM customers", function (err, result, fields) {
			if (err) throw err;
			customers = result;
	        res.render('pages/index', {
	        	customers: customers
	    	});
		});
	});
});
app.get('/create', function(req, res) {
    res.render('pages/create');
});

app.post('/create', urlencodedParser, function(req, res) {
    var name = req.body.name;
    var address = req.body.address;
    console.log('Name: ' + name);
    console.log('Email: ' + address);
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodejs"
    });
    //res.render('pages/about');
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        var sql = "INSERT INTO customers (name, address) VALUES ('"+ name +"', '"+ address +"')";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record inserted");
            res.redirect('/');
        });
    });    
});

app.get('/edit/:id', function(req, res) {
    console.log(req.params.id);
    var id = req.params.id;
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodejs"
    });
    var sql = "SELECT * FROM `customers` WHERE id = '" + id + "' ";
    con.query(sql, function (err, result) {
        if (err) throw err;
        res.render('pages/edit', {
            customer: result[0]
        });
    });
});

app.post('/edit', urlencodedParser, function(req, res) {
    var id = req.body.id;
    var name = req.body.name;
    var address = req.body.address;
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodejs"
    });
    //res.render('pages/about');
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        var sql = "UPDATE customers SET name = '" + name + "', address = '" + address + "' WHERE id = '" + id + "' ";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record updated");
            res.redirect('/');
        });
    });    
});

app.get('/delete/:id', function(req, res) {
    var id = req.params.id;
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodejs"
    });
    var sql = "DELETE FROM `customers` WHERE id = '" + id + "' ";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("1 record deleted");
        res.redirect('/');
    });
});

// about page 
app.get('/about', function(req, res) {
    res.render('pages/about');
});

app.listen(8080);
console.log('8080 is the magic port');