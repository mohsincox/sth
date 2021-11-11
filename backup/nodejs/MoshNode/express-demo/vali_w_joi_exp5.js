const Joi = require('joi');
var express = require('express');
var app = express();

app.use(express.json());

const courses = [
    { id: 1, name: 'course1' },
    { id: 2, name: 'course2' },
    { id: 3, name: 'course3' }
];

app.post('/api/courses', (req, res) => {
    const schema = {
        name: Joi.string().min(3).required()
    };
    
    const result = Joi.validate(req.body, schema);
    //console.log(result);

    if(result.error) {
        res.status(400).send(result.error.details[0].message);
        return;
    }
    const course = {
        id: courses.length + 1,
        name: req.body.name
    };
    courses.push(course);
    res.send(course);
});

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Lisrrtening on port ${port}...`));

/**
 *  {
	    "name": "w"
    }
 */