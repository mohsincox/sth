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



app.post('/api/courses', (req, res) => {
    // const schema = {
    //     name: Joi.string().min(3).required()
    // };
    
    // const result = Joi.validate(req.body, schema);
    // //console.log(result);

    // if(result.error) {
    //     res.status(400).send(result.error.details[0].message);
    //     return;
    // }

    //obj destructuring syntex: { error }
    const { error } = validateCourse(req.body); //equivalent to result.error
    
    if( error ) {
        res.status(400).send(error.details[0].message);
        return;
    }
    
    const course = {
        id: courses.length + 1,
        name: req.body.name
    };
    courses.push(course);
    res.send(course);
});

app.put('/api/courses/:id', (req, res) => {
    const course = courses.find(c => c.id === parseInt(req.params.id));
    if(!course) res.status(404).send('The course with the given ID was not found');

    //const result = validateCourse(req.body); //no need
    
    //obj destructuring process modern js { error }
    const { error } = validateCourse(req.body); //equivalent to result.error
    
    if( error ) {
        res.status(400).send(error.details[0].message);
        return;
    }
    course.name = req.body.name;
    res.send(course);

});

function validateCourse(course) {
    const schema = {
        name: Joi.string().min(3).required()
    };
    return Joi.validate(course, schema);
}

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`));