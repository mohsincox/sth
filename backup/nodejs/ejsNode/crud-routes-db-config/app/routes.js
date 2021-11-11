module.exports = function(app, mysql, bodyParser, urlencodedParser) {
    
    app.get('/', function(req, res) {
        var customers = {};
    
        var dbconfig = require('../db_config');
        var con = mysql.createConnection(dbconfig.connection);
    
        con.connect(function(err) {
            if (err) throw err;
            con.query("SELECT * FROM customers", function (err, result, fields) {
                if (err) throw err;
                customers = result;
                res.render('pages/index', {
                    customers: customers,
                    message: req.flash('info')
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
        // var con = mysql.createConnection({
        //     host: "localhost",
        //     user: "root",
        //     password: "m",
        //     database: "nodejs"
        // });
        var dbconfig = require('../db_config');
        var con = mysql.createConnection(dbconfig.connection);
        
        con.connect(function(err) {
            if (err) throw err;
            console.log("Connected!");
            var sql = "INSERT INTO customers (name, address) VALUES ('"+ name +"', '"+ address +"')";
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("1 record inserted");
                req.flash('info', 'Created Successfully!')
                res.redirect('/');
            });
        });    
    });

    app.get('/edit/:id', function(req, res) {
        console.log(req.params.id);
        var id = req.params.id;
        var dbconfig = require('../db_config');
        var con = mysql.createConnection(dbconfig.connection);
        
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

        var dbconfig = require('../db_config');
        var con = mysql.createConnection(dbconfig.connection);
        
        con.connect(function(err) {
            if (err) throw err;
            console.log("Connected!");
            var sql = "UPDATE customers SET name = '" + name + "', address = '" + address + "' WHERE id = '" + id + "' ";
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("1 record updated");
                req.flash('info', 'Updated Successfully!')
                res.redirect('/');
            });
        });    
    });

    app.get('/delete/:id', function(req, res) {
        var id = req.params.id;
        
        var dbconfig = require('../db_config');
        var con = mysql.createConnection(dbconfig.connection);
        
        var sql = "DELETE FROM `customers` WHERE id = '" + id + "' ";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record deleted");
            req.flash('info', 'Deleted Successfully!')
            res.redirect('/');
        });
    });
}