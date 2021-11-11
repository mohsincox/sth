var express = require('express');
var app = express();
 
app.get('/', (req, res) => {
  res.send('Hello World'); //Hello World
});

app.get('/api/courses', (req, res) => {
    res.send([1, 2, 3]); //[1,2,3]
});

app.get('/api/posts/:year/:month', (req, res) => {
    //res.send(req.params.year); //2019
    //res.send(req.params); //{"year":"2019","month":"2"}
    res.send(req.query); //http://localhost:3000/api/posts/2019/2?k=val //{"k":"val"}
})

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`));
/*
    in CMD Windows
    set PORT=5000
    nodemon server.js

    in Terminal Linux, Mac
    export PORT=5000
    nodemon server.js
*/