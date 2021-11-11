import 'package:flutter/material.dart';

import 'create.dart';
import 'db_helper.dart';
import 'edit.dart';
import 'employee.dart';

class Home extends StatefulWidget {
  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  Future<List<Employee>> employees;

  @override
  void initState() {
    super.initState();
    employees = DBHelper().getEmployees();
  }

  refreshList() {
    setState(() {
      employees = DBHelper().getEmployees();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('ChaTime'),
        actions: <Widget>[
          IconButton(
            icon: Icon(Icons.refresh),
            onPressed: () {
              refreshList();
            },
          )
        ],
      ),
      body: FutureBuilder<List<Employee>>(
        future: employees,
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
                      subtitle: Text(data.id.toString()),
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        FlatButton(
                          onPressed: () {
                            Navigator.of(context).push(
                              MaterialPageRoute(
                                builder: (BuildContext context) =>
                                    Edit(emp: data),
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
                            DBHelper().delete(data.id);
                            refreshList();
                            // confirm(data.id);
                            print(data.id);
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
