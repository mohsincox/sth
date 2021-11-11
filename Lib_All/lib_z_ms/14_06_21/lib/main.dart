import 'package:flutter/material.dart';
import 'models/user.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import 'screens/cartScreen.dart';
import 'screens/checkoutScreen.dart';
import 'models/cart.dart';
import 'env.dart';
import 'screens/loginScreen.dart';

import 'package:http/http.dart' as http;
import 'dart:convert';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (context) {
        return Cart();
      },
      child: MaterialApp(
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        home: MainPage(),
      ),
    );
  }
}

class MainPage extends StatefulWidget {
  @override
  _MainPageState createState() => _MainPageState();
}

class _MainPageState extends State<MainPage> {
  SharedPreferences sharedPreferences;

  @override
  void initState() {
    super.initState();
    checkLoginStatus();
  }

  checkLoginStatus() async {
    sharedPreferences = await SharedPreferences.getInstance();
    if (sharedPreferences.getString("access_token") == null) {
      Navigator.of(context).pushAndRemoveUntil(
          MaterialPageRoute(builder: (BuildContext context) => LoginScreen()),
          (Route<dynamic> route) => false);
    }
  }

  @override
  Widget build(BuildContext context) {
    Future<User> downloadData() async {
      sharedPreferences = await SharedPreferences.getInstance();
      sharedPreferences.getString("access_token");

      String bbbb = "Bearer ${(sharedPreferences.getString("access_token"))}";

      print(bbbb);

      Map<String, String> headers = {'Authorization': bbbb};

      var response = await http.get(Uri.parse('${Env.URL_PREFIX}/auth/user'),
          headers: headers
          // headers: {"Authorization": bbbb}
          );
      // return Future.value(response.body);

      final jsonResponse = json.decode(response.body);
      return new User.fromJson(jsonResponse);
    }

    return Scaffold(
      appBar: AppBar(
        title: Text("Demo"),
        actions: <Widget>[
          TextButton(
            onPressed: () {
              sharedPreferences.clear();
              // sharedPreferences.commit();
              Navigator.of(context).pushAndRemoveUntil(
                  MaterialPageRoute(
                      builder: (BuildContext context) => LoginScreen()),
                  (Route<dynamic> route) => false);
            },
            child: Text("Log Out", style: TextStyle(color: Colors.white)),
          ),
        ],
      ),
      body: FutureBuilder<User>(
        future: downloadData(),
        builder: (BuildContext context, AsyncSnapshot<User> snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return Center(child: Text('Please wait its loading...'));
          } else {
            if (snapshot.hasError)
              return Center(child: Text('Error: ${snapshot.error}'));
            else
              return Column(
                children: [
                  Center(
                    child: new Text('Email: ${snapshot.data.email}'),
                  ),
                ],
              );
          }
        },
      ),
      drawer: Drawer(
        child: new ListView(
          children: <Widget>[
            new UserAccountsDrawerHeader(
              accountName: new Text('Test'),
              accountEmail: new Text('test@gmail.com'),
            ),
            // new Divider(),
            TextButton(
                onPressed: () {
                  Navigator.of(context)
                      .push(MaterialPageRoute(builder: (context) {
                    return CartScreen();
                  }));
                },
                child: Text('Cart')),
            new Divider(),
            TextButton(
                onPressed: () {
                  Navigator.of(context)
                      .push(MaterialPageRoute(builder: (context) {
                    return CheckoutScreen();
                  }));
                },
                child: Text('Checkout')),
            new Divider(),
          ],
        ),
      ),
    );
  }
}
