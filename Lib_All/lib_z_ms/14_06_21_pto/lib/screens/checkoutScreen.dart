import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/cart.dart';

class CheckoutScreen extends StatefulWidget {
  const CheckoutScreen({Key key}) : super(key: key);

  @override
  _CheckoutScreenState createState() => _CheckoutScreenState();
}

class _CheckoutScreenState extends State<CheckoutScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Checkout'),
      ),
      body: Column(
        children: [
          Expanded(
            child: Consumer<Cart>(builder: (context, cart, child) {
              return ListView.builder(
                itemCount: cart.basketItem.length,
                itemBuilder: (context, i) {
                  return Card(
                    child: ListTile(
                      title: Text("${cart.basketItem[i].name}"),
                      trailing: Container(
                        width: 100,
                        child: Row(
                          children: [
                            Text("${cart.basketItem[i].price}"),
                            IconButton(
                              icon: Icon(Icons.remove),
                              onPressed: () {
                                cart.remove(cart.basketItem[i]);
                              },
                            ),
                          ],
                        ),
                      ),
                    ),
                  );
                },
              );
            }),
          ),
          Expanded(
            child: Consumer<Cart>(
              builder: (context, cart, child) {
                return Text("Total Price ${cart.totalPrice}");
              },
            ),
          ),
        ],
      ),
    );
  }
}
