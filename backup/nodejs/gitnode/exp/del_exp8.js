const Joi = require('joi');
var express = require('express');
var app = express();

app.use(express.json());

const courses = [
    { id: 1, name: 'course1' },
    { id: 2, name: 'course2' },
    { id: 3, name: 'course3' }
];
 
app.get('/', (req, res) => {
  res.send('Hello World'); //Hello World
});

app.get('/api/courses', (req, res) => {
    res.send(courses); 
});

app.delete('/api/courses/:id', (req, res) => {
    const course = courses.find(c => c.id === parseInt(req.params.id));
    if(!course) return res.status(404).send('The course with the given ID was not found');

    const index = courses.indexOf(course);
    courses.splice(index, 1);

    res.send(course);
});

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`));