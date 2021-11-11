// server.js
// load the things we need
const Joi = require('joi');
var express = require('express');
var app = express();
var mysql = require('mysql');

var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended: false });


var session      = require('express-session'),
  cookieParser   = require('cookie-parser'),
  flash          = require('connect-flash');

// set sessions and cookie parser
app.use(cookieParser());
app.use(session({
  secret: "my-super-secret", 
  cookie: { maxAge: 60000 },
  resave: false,    // forces the session to be saved back to the store
  saveUninitialized: false  // dont save unmodified
}));
app.use(flash());

// set the view engine to ejs
app.set('view engine', 'ejs');

require('./app/routes.js')(app, mysql, bodyParser, urlencodedParser, Joi);

// about page 
app.get('/about', function(req, res) {
    res.render('pages/about');
});

app.listen(8080);
console.log('Listen Port: 8080');