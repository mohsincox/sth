// import 'package:flutter/material.dart';

// class Edit extends StatelessWidget {
//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       appBar: AppBar(
//         title: Text('data'),
//       ),
//     );
//   }
// }

import 'package:flutter/material.dart';

import 'src/blocs/todoBloc.dart';

class Edit extends StatefulWidget {
  final String id, name, description;

  const Edit({Key key, this.id, this.name, this.description}) : super(key: key);
  @override
  _EditState createState() => _EditState();
}

class _EditState extends State<Edit> {
  final _name = new TextEditingController();
  final _description = new TextEditingController();

  void setFormValue() {
    _name.text = widget.name;
    _description.text = widget.description;
  }

  @override
  void initState() {
    setFormValue();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Edit"),
      ),
      body: Container(
        width: MediaQuery.of(context).size.width,
        padding: const EdgeInsets.all(10),
        child: SingleChildScrollView(
          child: Column(
            children: <Widget>[
              TextField(
                controller: _name,
                onChanged: bloc.updateName,
                decoration: InputDecoration(
                  labelText: "Nama Barang",
                ),
              ),
              SizedBox(
                height: 20,
              ),
              TextField(
                controller: _description,
                onChanged: bloc.updateDescription,
                decoration: InputDecoration(
                  labelText: "Quantity Barang",
                ),
              ),
              SizedBox(
                height: 20,
              ),
              SizedBox(
                height: 20,
              ),
              OutlineButton(
                child: Text("Edit"),
                onPressed: () async {
                  bloc.editTest(widget.id);
                  await new Future.delayed(const Duration(milliseconds: 500));
                  bloc.fetchAllTodo();
                  Navigator.of(context).pop();
                },
              )
            ],
          ),
        ),
      ),
    );
  }
}
