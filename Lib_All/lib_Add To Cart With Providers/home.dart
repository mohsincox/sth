import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'checkout.dart';
import 'model/cart.dart';
import 'model/item.dart';

class Home extends StatefulWidget {
  const Home({Key key}) : super(key: key);

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  List<Item> items = [
    Item(name: "S20 ultra", price: 100),
    Item(name: "p30 pro", price: 200),
  ];
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Home'),
        actions: [
          Row(
            children: [
              IconButton(
                  icon: Icon(Icons.add_shopping_cart),
                  onPressed: () {
                    Navigator.of(context)
                        .push(MaterialPageRoute(builder: (context) {
                      return Checkout();
                    }));
                  }),
              Padding(
                padding: const EdgeInsets.only(right: 10),
                child: Consumer<Cart>(builder: (context, cart, child) {
                  // return Text("${cart.count}");
                  return Text("${cart.totalPrice}");
                }),
              )
            ],
          )
        ],
      ),
      body: ListView.builder(
        itemCount: items.length,
        itemBuilder: (context, i) {
          return Card(child: Consumer<Cart>(
            builder: (context, cart, child) {
              return ListTile(
                title: Text("${items[i].name}"),
                trailing: IconButton(
                    icon: Icon(Icons.add),
                    onPressed: () {
                      cart.add(items[i]);
                    }),
              );
            },
          )
              // ListTile(
              //   title: Text("${items[i].name}"),
              //   trailing: IconButton(
              //     icon: Icon(Icons.add),
              //     onPressed: () {},
              //   ),
              // ),
              );
        },
      ),
    );
  }
}
