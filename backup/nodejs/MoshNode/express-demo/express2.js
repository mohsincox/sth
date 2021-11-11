var express = require('express');
var app = express();

const courses = [
    { id: 1, name: 'course1' },
    { id: 2, name: 'course2' },
    { id: 3, name: 'course3' }
]
 
app.get('/', (req, res) => {
  res.send('Hello World'); //Hello World
});

app.get('/api/courses', (req, res) => {
    res.send(courses); 
});

app.get('/api/courses/:id', (req, res) => {
    const course = courses.find(c => c.id === parseInt(req.params.id));
    if(!course) return res.status(404).send('The course with the given ID was not found')
    res.send(course);
});

app.get('/api/posts/:year/:month', (req, res) => {
    //res.send(req.params.year); //2019
    //res.send(req.params); //{"year":"2019","month":"2"}
    res.send(req.query); //http://localhost:3000/api/posts/2019/2?k=val //{"k":"val"}
})

const port = process.env.PORT || 3000
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`))