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

app.put('/api/courses/:id', (req, res) => {
    const course = courses.find(c => c.id === parseInt(req.params.id));
    if(!course) res.status(404).send('The course with the given ID was not found');

    const schema = {
        name: Joi.string().min(3).required()
    };
    
    const result = Joi.validate(req.body, schema);
    if(result.error) {
        res.status(400).send(result.error.details[0].message);
        return;
    }
    course.name = req.body.name;
    res.send(course);

});

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`));

/**
 *  PUT: http://localhost:3000/api/courses/1
 *      Req:
 *      {
	        "name": "New Course"
        }
        Res:
        {
            "id": 1,
            "name": "New Course"
        }
        
    GET: http://localhost:3000/api/courses
        [
            {
                "id": 1,
                "name": "New Course"
            },
            {
                "id": 2,
                "name": "course2"
            },
            {
                "id": 3,
                "name": "course3"
            }
        ]
 */