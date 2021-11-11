import 'package:andy_julow/models/info.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    // return Provider(
    return ChangeNotifierProvider(
      create: (context) => Info(),
      child: MaterialApp(
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
          visualDensity: VisualDensity.adaptivePlatformDensity,
        ),
        home: Page1(),
      ),
    );
  }
}

class Page1 extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Page1'),
      ),
      body: Column(
        children: [
          Flexible(
            child: Top(),
          ),
          Flexible(
            child: Bottom(),
          ),
        ],
      ),
    );
  }
}

class Top extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    var info = Provider.of<Info>(context);
    return Container(
      child: Center(
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: [
            RaisedButton(
              onPressed: () {
                // info.title = "New Title";
                // info.description = "New Description";
                info.changeTitle("New Title");
                info.changeDescription("New Description");
              },
              child: Text("Change Value"),
            ),
            RaisedButton(
              onPressed: () {
                Navigator.of(context).push(
                  MaterialPageRoute(
                    builder: (context) => Page2(),
                  ),
                );
              },
              child: Text("Next Page"),
            ),
          ],
        ),
      ),
    );
  }
}

class Bottom extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    var info = Provider.of<Info>(context);
    return Container(
      child: Center(
        child: RichText(
          text: TextSpan(style: TextStyle(color: Colors.black), children: [
            TextSpan(
                text: info.title,
                style: TextStyle(fontWeight: FontWeight.bold)),
            TextSpan(text: ": "),
            TextSpan(text: info.description),
          ]),
        ),
      ),
    );
  }
}

class Page2 extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    var info = Provider.of<Info>(context);
    return Scaffold(
      appBar: AppBar(
        title: Text("Page2"),
      ),
      body: Container(
        child: Center(
          child: RichText(
            text: TextSpan(style: TextStyle(color: Colors.black), children: [
              TextSpan(
                  text: info.title,
                  style: TextStyle(fontWeight: FontWeight.bold)),
              TextSpan(text: ": "),
              TextSpan(text: info.description),
            ]),
          ),
        ),
      ),
    );
  }
}
