import 'dart:convert';

import 'package:crud_test/env.dart';
import 'package:crud_test/models/project.dart';
import 'package:crud_test/screens/Edit.dart';
import 'package:crud_test/screens/create.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class Home extends StatefulWidget {
  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  Future<List<Project>> projects;

  @override
  void initState() {
    super.initState();
    projects = getProjectList();
  }

  Future<List<Project>> getProjectList() async {
    final response = await http.get("${Env.URL_PREFIX}/project");

    final items = json.decode(response.body).cast<Map<String, dynamic>>();
    List<Project> projects = items.map<Project>((json) {
      return Project.fromJson(json);
    }).toList();

    return projects;
  }

  void refreshProjectList() {
    setState(() {
      projects = getProjectList();
    });
  }

  Future deleteData(id) async {
    print(id);
    return await http.post(
      "${Env.URL_PREFIX}/project/delete",
      body: {"id": id.toString()},
    );
  }

  void confirm(id) {
    AlertDialog alertDialog = new AlertDialog(
      content: new Text("Are You sure want to delete"),
      actions: <Widget>[
        new RaisedButton(
          child: new Text(
            "OK DELETE!",
            style: new TextStyle(color: Colors.black),
          ),
          color: Colors.red,
          onPressed: () {
            deleteData(id);
            Navigator.of(context).push(new MaterialPageRoute(
              builder: (BuildContext context) => new Home(),
            ));
          },
        ),
        new RaisedButton(
          child: new Text("CANCEL", style: new TextStyle(color: Colors.black)),
          color: Colors.green,
          onPressed: () => Navigator.pop(context),
        ),
      ],
    );

    showDialog(context: context, child: alertDialog);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("ChaTime List"),
        actions: <Widget>[
          IconButton(
            icon: Icon(Icons.refresh),
            onPressed: () {
              refreshProjectList();
            },
          )
        ],
        backgroundColor: Colors.purple[900],
      ),
      body: FutureBuilder<List<Project>>(
        future: projects,
        builder: (BuildContext context, AsyncSnapshot snapshot) {
          if (!snapshot.hasData)
            return Center(
              child: CircularProgressIndicator(),
            );

          return ListView.builder(
            itemCount: snapshot.data.length,
            itemBuilder: (BuildContext context, int index) {
              var data = snapshot.data[index];
              return Card(
                child: Column(
                  children: [
                    ListTile(
                      leading: Icon(Icons.free_breakfast),
                      trailing: Icon(Icons.view_list),
                      title: Text(
                        data.name,
                        style: TextStyle(fontSize: 20),
                      ),
                      subtitle: Text(data.description),
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        FlatButton(
                          onPressed: () {
                            Navigator.of(context).push(
                              MaterialPageRoute(
                                builder: (BuildContext context) =>
                                    Edit(pro: data),
                              ),
                            );
                          },
                          child: Text(
                            "Edit",
                            style: TextStyle(color: Colors.white),
                          ),
                          color: Colors.green,
                        ),
                        FlatButton(
                          onPressed: () {
                            // deleteData(data.id);
                            confirm(data.id);
                          },
                          child: Text(
                            "Delete",
                            style: TextStyle(color: Colors.white),
                          ),
                          color: Colors.red,
                        ),
                      ],
                    ),
                  ],
                ),
              );
            },
          );
        },
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          Navigator.push(
            context,
            MaterialPageRoute(
              builder: (BuildContext context) => Create(),
            ),
          );
        },
        child: Icon(Icons.add),
      ),
    );
  }
}
