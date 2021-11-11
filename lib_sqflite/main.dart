import 'package:flutter/material.dart';
import 'package:sqflite_test/dbmanager.dart';

void main() => runApp(MyApp());

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  final DbStudentManager dbmanager = DbStudentManager();

  final _nameController = TextEditingController();
  final _courseController = TextEditingController();

  // Student student;
  List<Student> studlist;
  // int updateIndex;

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      home: Scaffold(
        appBar: AppBar(),
        body: Container(
          child: Padding(
            padding: const EdgeInsets.all(8.0),
            child: Column(
              children: [
                TextFormField(
                  decoration: InputDecoration(labelText: 'Enter Name'),
                  controller: _nameController,
                ),
                TextFormField(
                  decoration: InputDecoration(labelText: 'Enter Course'),
                  controller: _courseController,
                ),
                RaisedButton(
                  onPressed: () {
                    _submitStudent(context);
                  },
                  child: Text('Submit'),
                ),
                buildFutureBuilder(),

                /*********/
                // FutureBuilder(
                //   future: dbmanager.getStudentList(),
                //   builder: (context, snapshot) {
                //     if (snapshot.hasData) {
                //       studlist = snapshot.data;
                //       return ListView.builder(
                //         shrinkWrap: true,
                //         itemCount: studlist == null ? 0 : studlist.length,
                //         itemBuilder: (BuildContext context, int index) {
                //           Student st = studlist[index];
                //           return Card(
                //             child: Row(
                //               children: <Widget>[
                //                 Container(
                //                   // width: width * 0.6,
                //                   child: Column(
                //                     crossAxisAlignment:
                //                         CrossAxisAlignment.start,
                //                     children: <Widget>[
                //                       Text(
                //                         'Name: ${st.name}',
                //                         style: TextStyle(fontSize: 15),
                //                       ),
                //                       Text(
                //                         'Course: ${st.course}',
                //                         style: TextStyle(
                //                             fontSize: 15,
                //                             color: Colors.black54),
                //                       ),
                //                     ],
                //                   ),
                //                 ),
                //                 IconButton(
                //                   onPressed: () {
                //                     _nameController.text = st.name;
                //                     _courseController.text = st.course;
                //                     student = st;
                //                     updateIndex = index;
                //                   },
                //                   icon: Icon(
                //                     Icons.edit,
                //                     color: Colors.blueAccent,
                //                   ),
                //                 ),
                //                 IconButton(
                //                   onPressed: () {
                //                     dbmanager.deleteStudent(st.id);
                //                     setState(() {
                //                       studlist.removeAt(index);
                //                     });
                //                   },
                //                   icon: Icon(
                //                     Icons.delete,
                //                     color: Colors.red,
                //                   ),
                //                 )
                //               ],
                //             ),
                //           );
                //         },
                //       );
                //     }
                //     return new CircularProgressIndicator();
                //   },
                // ),
              ],
            ),
          ),
        ),
      ),
    );
  }

  FutureBuilder<List<Student>> buildFutureBuilder() {
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
              return Container(
                child: Center(
                  child: Text(
                    'Name: ${studlist[index].name}, Course: ${studlist[index].course}',
                  ),
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
      buildFutureBuilder();
    });
  }
}
