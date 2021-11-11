var express = require('express');
var app = express();

app.use(express.json());

const courses = [
    { id: 1, name: 'course1' },
    { id: 2, name: 'course2' },
    { id: 3, name: 'course3' }
];

app.post('/api/courses', (req, res) => {
    const course = {
        id: courses.length + 1,
        name: req.body.name
    };
    courses.push(course);
    res.send(course);
});

const port = process.env.PORT || 3000
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`))

/* Postman
    http://localhost:3000/api/courses
    method: POST
    Request Body:
    {
	    "name": "New Course"
    }
    Response Body:
    {
        "id": 4,
        "name": "New Course"
    } 
*/