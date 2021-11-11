import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'model/cart.dart';

class Checkout extends StatefulWidget {
  const Checkout({Key key}) : super(key: key);

  @override
  _CheckoutState createState() => _CheckoutState();
}

class _CheckoutState extends State<Checkout> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Checkout'),
        ),
        body: Consumer<Cart>(builder: (context, cart, child) {
          return ListView.builder(
            itemCount: cart.basketItem.length,
            itemBuilder: (context, i) {
              return Card(
                child: ListTile(
                  title: Text("${cart.basketItem[i].name}"),
                  trailing: IconButton(
                    icon: Icon(Icons.remove),
                    onPressed: () {
                      cart.remove(cart.basketItem[i]);
                    },
                  ),
                ),
              );
            },
          );
        })

        // return ListView.builder(
        //   itemCount: 33,
        //   itemBuilder: (context, i) {
        //     return Card(
        //       child: ListTile(
        //         title: Text(""),
        //         trailing: IconButton(
        //           icon: Icon(Icons.remove),
        //           onPressed: () {},
        //         ),
        //       ),
        //     );
        //   },
        // );
        );
  }
}
