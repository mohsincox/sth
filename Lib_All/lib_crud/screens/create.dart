import 'package:crud_test/env.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class Create extends StatefulWidget {
  @override
  _CreateState createState() => _CreateState();
}

class _CreateState extends State<Create> {
  TextEditingController controllerName = TextEditingController();
  TextEditingController controllerDescription = TextEditingController();

  void addData() {
    var url = "${Env.URL_PREFIX}/project";

    http.post(url, body: {
      "name": controllerName.text,
      "description": controllerDescription.text
    });
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
