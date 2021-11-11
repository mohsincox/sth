import 'package:andy_julow/blocs/product_bloc.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Provider(
      create: (context) => ProductBloc(),
      child: MaterialApp(
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
          visualDensity: VisualDensity.adaptivePlatformDensity,
        ),
        home: MyHomePage(),
      ),
    );
  }
}

class MyHomePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final bloc = Provider.of<ProductBloc>(context);
    return Scaffold(
      appBar: AppBar(
        title: Text("Validation"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Column(
          children: [
            StreamBuilder<String>(
              stream: bloc.productName,
              builder: (context, snapshot) {
                return TextField(
                  decoration: InputDecoration(
                    labelText: "Product Name",
                    errorText: snapshot.error,
                    hintText: "Product n😂😎ame",
                  ),
                  onChanged: bloc.changeProductName,
                );
              },
            ),
            StreamBuilder<double>(
              stream: bloc.productPrice,
              builder: (context, snapshot) {
                return TextField(
                  decoration: InputDecoration(
                    labelText: "Product Price",
                    errorText: snapshot.error,
                    hintText: "Product price",
                  ),
                  onChanged: bloc.changeProductPrice,
                );
              },
            ),
            StreamBuilder<bool>(
                stream: bloc.productValid,
                builder: (context, snapshot) {
                  return FlatButton(
                    onPressed: () {
                      !snapshot.hasData ? null : bloc.submitProduct();
                    },
                    child: Text("Submit"),
                  );
                })
          ],
        ),
      ),
    );
  }
}
