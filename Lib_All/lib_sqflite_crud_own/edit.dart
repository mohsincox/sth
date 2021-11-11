import 'package:flutter/material.dart';
import 'employee.dart';
import 'db_helper.dart';

class Edit extends StatefulWidget {
  final Employee emp;

  Edit({this.emp});

  @override
  _EditState createState() => _EditState();
}

class _EditState extends State<Edit> {
  TextEditingController controllerId;
  TextEditingController controllerName;

  editData() {
    Employee e = Employee(int.parse(controllerId.text), controllerName.text);
    DBHelper().update(e);
  }

  @override
  void initState() {
    controllerId = TextEditingController(text: widget.emp.id.toString());
    controllerName = TextEditingController(text: widget.emp.name);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Edit"),
        backgroundColor: Colors.purple[900],
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Column(
          children: [
            Opacity(
              opacity: 0.0,
              child: TextField(
                enabled: false,
                controller: controllerId,
                decoration: InputDecoration(
                  hintText: "Id",
                  labelText: "Id",
                ),
              ),
            ),
            TextField(
              controller: controllerName,
              decoration: InputDecoration(
                hintText: "Name",
                labelText: "Name",
              ),
            ),
            FlatButton(
              onPressed: () {
                editData();
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
