import 'package:exampletododevindo/create.dart';
import 'package:exampletododevindo/src/blocs/todoBloc.dart';
import 'package:exampletododevindo/src/models/todoModels.dart';
import 'package:flutter/material.dart';

import 'edit.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(primarySwatch: Colors.orange),
      home: MyHomePage(title: 'Chatime'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  @override
  void initState() {
    bloc.fetchAllTodo();
    super.initState();
  }

  void _delete(id) {
    bloc.deleteData(id);
  }

  @override
  void dispose() {
    bloc.dispose();
    super.dispose();
  }

  // up(id) {
  //   bloc.update(id);
  // }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: StreamBuilder(
        stream: bloc.allTodo,
        builder: (context, AsyncSnapshot<List<Todo>> snapshot) {
          if (snapshot.hasData) {
            return buildList(snapshot);
          } else if (snapshot.hasError) {
            return Text(snapshot.error.toString());
          }
          return Center(child: CircularProgressIndicator());
        },
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          Navigator.push(
              context, MaterialPageRoute(builder: (context) => Create()));
        },
        child: Icon(Icons.add),
      ),
    );
  }

  Widget buildList(AsyncSnapshot<List<Todo>> snapshot) {
    return ListView.builder(
      itemCount: snapshot.data.length,
      itemBuilder: (BuildContext context, int index) {
        print(snapshot.data.length);
        // print(snapshot.data.map((message) => message.description));
        return Column(
          children: [
            Text(snapshot.data[index].name),
            Text(snapshot.data[index].description),
            Text(snapshot.data[index].id.toString()),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                FlatButton(
                  onPressed: () {
                    Navigator.of(context).push(
                      MaterialPageRoute(
                        builder: (BuildContext context) => Edit(
                          id: snapshot.data[index].id.toString(),
                          name: snapshot.data[index].name,
                          description: snapshot.data[index].description,
                        ),
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
                  onPressed: () async {
                    String id = snapshot.data[index].id.toString();
                    _delete(id);
                    await new Future.delayed(const Duration(milliseconds: 500));
                    bloc.fetchAllTodo();
                    print("Deleted");
                  },
                  child: Text("Delete"),
                  color: Colors.red,
                ),
                FlatButton(
                  color: Colors.blue,
                  onPressed: () async {
                    // up(snapshot.data[index].id.toString());
                    bloc.getId(snapshot.data[index].id.toString());
                    bloc.updateTodo();
                    await new Future.delayed(const Duration(milliseconds: 500));
                    bloc.fetchAllTodo();
                    print("updated");
                  },
                  child: Text(
                    'Update',
                    // style: TextStyle(color: Colors.red),
                  ),
                ),
              ],
            ),
          ],
        );
      },
    );
  }
}
