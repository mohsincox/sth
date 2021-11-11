import 'package:flutter/material.dart';
import 'package:sqflite_basic/database_helper.dart';

void main() => runApp(MyApp());

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  final DbStudentManager dbmanager = DbStudentManager();

  final _nameController = TextEditingController();
  final _courseController = TextEditingController();

  final _formKey = GlobalKey<FormState>();

  Student student;
  List<Student> studlist;
  int updateIndex;

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      home: Scaffold(
        appBar: AppBar(),
        body: SingleChildScrollView(
          child: Container(
            child: Form(
              key: _formKey,
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  children: [
                    TextFormField(
                      decoration: InputDecoration(labelText: 'Enter Name'),
                      controller: _nameController,
                      validator: (value) {
                        if (value.isEmpty) {
                          return 'Please enter Name';
                        }
                        return null;
                      },
                    ),
                    TextFormField(
                      decoration: InputDecoration(labelText: 'Enter Course'),
                      controller: _courseController,
                      validator: (val) =>
                          val.isNotEmpty ? null : 'Course Should Not Be empty',
                    ),
                    RaisedButton(
                      onPressed: () {
                        if (_formKey.currentState.validate()) {
                          _submitStudent(context);
                        }
                      },
                      child: Text('Submit'),
                    ),
                    _buildFutureBuilder(),
                  ],
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }

  FutureBuilder<List<Student>> _buildFutureBuilder() {
    return FutureBuilder(
      future: dbmanager.getStudentList(),
      builder: (BuildContext context, AsyncSnapshot snapshot) {
        if (snapshot.hasData) {
          studlist = snapshot.data;
          return ListView.builder(
            shrinkWrap: true,
            padding: const EdgeInsets.all(8),
            itemCount: studlist.length,
            itemBuilder: (BuildContext context, int index) {
              return Card(
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Column(
                      children: [
                        Text(
                          'Name: ${studlist[index].name}',
                        ),
                        Text(
                          'Course: ${studlist[index].course}',
                        ),
                      ],
                    ),
                    IconButton(
                      icon: Icon(
                        Icons.edit,
                        color: Colors.green,
                      ),
                      onPressed: () {
                        _nameController.text = studlist[index].name;
                        _courseController.text = studlist[index].course;
                        updateIndex = index;
                        student = studlist[index];
                      },
                    ),
                    IconButton(
                      icon: Icon(
                        Icons.delete,
                        color: Colors.red,
                      ),
                      onPressed: () {
                        dbmanager.deleteStudent(studlist[index].id);
                        setState(() {
                          studlist.elementAt(index);
                        });
                      },
                    ),
                  ],
                ),
              );
            },
          );
        } else {
          return Center(
            child: CircularProgressIndicator(),
          );
        }
      },
    );
  }

  void _submitStudent(BuildContext context) {
    if (student == null) {
      Student st = Student(
        name: _nameController.text,
        course: _courseController.text,
      );
      dbmanager.insertStudent(st).then(
            (value) => {
              print(value),
              _nameController.clear(),
              _courseController.clear(),
            },
          );
      setState(() {
        _buildFutureBuilder();
      });
    } else {
      student.name = _nameController.text;
      student.course = _courseController.text;

      // dbmanager.updateStudent(student).then(
      //       (id) => {
      //         setState(() {
      //           studlist[updateIndex].name = _nameController.text;
      //           studlist[updateIndex].course = _courseController.text;
      //         }),
      //         _nameController.clear(),
      //         _courseController.clear(),
      //         student = null
      //       },
      //     );

      dbmanager.updateStudent(student).then((id) => {
            studlist[updateIndex].name = _nameController.text,
            studlist[updateIndex].course = _courseController.text,
          });
      _nameController.clear();
      _courseController.clear();
      student = null;
      setState(() {
        _buildFutureBuilder();
      });
    }
  }
}
