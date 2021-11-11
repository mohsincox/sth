import 'package:flutter/material.dart';

import 'db_helper.dart';
import 'employee.dart';

class Create extends StatefulWidget {
  @override
  _CreateState createState() => _CreateState();
}

class _CreateState extends State<Create> {
  TextEditingController controllerName = TextEditingController();

  void addData() {
    Employee e = Employee(null, controllerName.text);
    DBHelper().save(e);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("ChaTime Create"),
        backgroundColor: Colors.purple[900],
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Column(
          children: [
            TextField(
              controller: controllerName,
              decoration: InputDecoration(
                hintText: "Name",
                labelText: "Name",
              ),
            ),
            FlatButton(
              onPressed: () {
                addData();
                Navigator.pop(context);
              },
              child: Text('Submit', style: TextStyle(color: Colors.white)),
              color: Colors.green,
            ),
          ],
        ),
      ),
    );
  }
}
