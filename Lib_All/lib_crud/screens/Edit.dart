import 'package:crud_test/env.dart';
import 'package:crud_test/models/project.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class Edit extends StatefulWidget {
  final Project pro;

  Edit({this.pro});

  @override
  _EditState createState() => _EditState();
}

class _EditState extends State<Edit> {
  TextEditingController controllerName;
  TextEditingController controllerDescription;

  Future editData() async {
    return await http.post(
      "${Env.URL_PREFIX}/project/update",
      body: {
        "id": widget.pro.id.toString(),
        "name": controllerName.text,
        "description": controllerDescription.text
      },
    );
  }

  @override
  void initState() {
    controllerName = TextEditingController(text: widget.pro.name);
    controllerDescription = TextEditingController(text: widget.pro.description);
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
            TextField(
              controller: controllerName,
              decoration: InputDecoration(
                hintText: "Name",
                labelText: "Name",
              ),
            ),
            SizedBox(height: 10),
            TextField(
              controller: controllerDescription,
              decoration: InputDecoration(
                hintText: "Description",
                labelText: "Description",
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
