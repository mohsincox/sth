import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:http/http.dart' as http;

import 'checkoutScreen.dart';
import '../env.dart';
import '../models/cart.dart';
import '../models/item.dart';

class CartScreen extends StatefulWidget {
  const CartScreen({Key key}) : super(key: key);

  @override
  _CartScreenState createState() => _CartScreenState();
}

class _CartScreenState extends State<CartScreen> {
  // List<Item> items = [
  //   Item(name: "S20 ultra", price: 100),
  //   Item(name: "p30 pro", price: 200),
  // ];

  Future<List<Item>> items;

  @override
  void initState() {
    super.initState();
    items = getItemList();
  }

  Future<List<Item>> getItemList() async {
    final response = await http.get(Uri.parse("${Env.URL_PREFIX}/auth/item"));
    print(response.body);

    final items2 = json.decode(response.body).cast<Map<String, dynamic>>();
    List<Item> items = items2.map<Item>((json) {
      return Item.fromJson(json);
    }).toList();

    return items;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Add to Cart'),
        actions: [
          Row(
            children: [
              IconButton(
                  icon: Icon(Icons.add_shopping_cart),
                  onPressed: () {
                    Navigator.of(context)
                        .push(MaterialPageRoute(builder: (context) {
                      return CheckoutScreen();
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
      body: FutureBuilder<List<Item>>(
        future: items,
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
                child: Consumer<Cart>(
                  builder: (context, cart, child) {
                    return ListTile(
                      title: Text("${data.name}"),
                      trailing: Container(
                        width: 150,
                        child: Row(
                          children: [
                            Image.network("${data.image}"),
                            Text("${data.price}"),
                            IconButton(
                                icon: Icon(Icons.add),
                                onPressed: () {
                                  cart.add(data);
                                }),
                          ],
                        ),
                      ),
                    );
                  },
                ),
              );
            },
          );
        },
      ),
    );
  }
}
