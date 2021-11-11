import 'package:exampletododevindo/src/blocs/todoBloc.dart';
import 'package:flutter/material.dart';

class Create extends StatefulWidget {
  @override
  _CreateState createState() => _CreateState();
}

class _CreateState extends State<Create> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Add Todo'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.end,
          children: [
            TextField(
              onChanged: bloc.updateName,
              decoration: InputDecoration(hintText: 'Name'),
            ),
            TextField(
              onChanged: bloc.updateDescription,
              decoration: InputDecoration(hintText: 'Description'),
            ),
            RaisedButton(
              onPressed: () async {
                bloc.addSaveTodo();
                await new Future.delayed(const Duration(milliseconds: 500));
                bloc.fetchAllTodo();
                Navigator.of(context).pop();
              },
              child: Text('Save'),
            )
          ],
        ),
      ),
    );
  }
}
