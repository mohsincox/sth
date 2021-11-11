const Joi = require('joi');
var express = require('express');
var app = express();
var session = require('express-session');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var flash = require('connect-flash');
var urlencodedParser = bodyParser.urlencoded({ extended: false });

var con = mysql.createConnection({
	host     : 'localhost',
	user     : 'root',
	password : 'm',
	database : 'nodelogin'
});

app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));

app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());

app.set('view engine', 'ejs');

app.use(flash());

app.use(express.static(__dirname + '/public'));

app.get('/login', function (req, res) {
    res.render('pages/login', {
        message: req.flash('info')
    });
});
 
app.get('/', function (req, res) {
    if (req.session.loggedin) {
        //res.send('Welcome back, ' + req.session.username + '!' + '<a href='+'/logout'+'>Logout</a>');
        var authUsername = req.session.username
        res.render('pages/dashboard', {
            authUsername: authUsername
        });
	} else {
        res.redirect('/login');
	}
	res.end();
});

app.post('/auth', function(req, res) {
	var username = req.body.username;
	var password = req.body.password;
	if (username && password) {
		con.query('SELECT * FROM accounts WHERE username = ? AND password = ?', [username, password], function(err, results, fields) {
			if (err) throw err;
			console.log(results.length);
			if (results.length > 0) {
				req.session.loggedin = true;
				req.session.username = username;
				res.redirect('/');
			} else {
                req.flash('info', 'Incorrect Username and/or Password!');
                res.redirect('/login');
			}			
		});
	} else {
        const { error } = validateCourse(req.body);
        if( error ) {
            req.flash('info', error.details[0].message);
            return res.redirect('/login');
        }
        req.flash('info', 'Password is empty (blank)');
        res.redirect('/login');
	}
});

app.get('/logout',function(req, res){
	req.session.destroy(function(err){
		if (err) throw err;
		res.redirect('/login');
	});
});

function validateCourse(user) {
    const schema = {
        username: Joi.string().min(3).required(),
        password: Joi.string().allow('').optional()
    };
    return Joi.validate(user, schema);
}

app.get('/dashboard2', function (req, res) {
    res.render('dashboard2');
});


app.get('/customer', function(req, res) {
	var customers = {};
	
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodelogin"
    });
    con.connect(function(err) {
		if (err) throw err;
		con.query("SELECT * FROM customers", function (err, result, fields) {
			if (err) throw err;
			customers = result;
	        res.render('pages/customer/index', {
	        	customers: customers
	    	});
		});
	});
});
app.get('/customer/create', function(req, res) {
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
        database: "nodelogin"
    });
    
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
        var sql = "INSERT INTO customers (name, address) VALUES ('"+ name +"', '"+ address +"')";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record inserted");
            res.redirect('/customer');
        });
    });    
});

app.get('/customer/edit/:id', function(req, res) {
    console.log(req.params.id);
    var id = req.params.id;
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "m",
        database: "nodelogin"
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



 
app.listen(3030)
console.log('Listen port: 3030')