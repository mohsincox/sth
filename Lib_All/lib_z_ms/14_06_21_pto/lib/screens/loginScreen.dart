import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

import '../env.dart';
import '../main.dart';

class LoginScreen extends StatefulWidget {
  final String data;

  LoginScreen({
    Key key,
    @required this.data,
  }) : super(key: key);

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  bool _isLoading = false;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: _isLoading
            ? Center(child: CircularProgressIndicator())
            : ListView(
                children: <Widget>[
                  headerSection(),
                  textSection(),
                  buttonSection(),
                ],
              ),
      ),
    );
  }

  signIn(String pass) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    // Map data = {'email': email, 'password': pass};

    Map<String, String> headers = {
      'Content-type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    };

    final data = jsonEncode(
        {"email": widget.data, "password": pass, "remember_me": true});
    var jsonResponse = null;

    var response = await http.post(Uri.parse("${Env.URL_PREFIX}/auth/login"),
        body: data, headers: headers);

    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      print('Response status: ${response.statusCode}');
      // print('Response body: ${response.body}');
      if (jsonResponse != null) {
        setState(() {
          _isLoading = false;
        });
        sharedPreferences.setString(
            "access_token", jsonResponse['access_token']);
        Navigator.of(context).pushAndRemoveUntil(
            MaterialPageRoute(builder: (BuildContext context) => MainPage()),
            (Route<dynamic> route) => false);
      }
    } else {
      setState(() {
        _isLoading = false;
      });
      print(response.body);
      var jsonErrorResponse = json.decode(response.body);
      final snackBar = SnackBar(
          content: Text(jsonErrorResponse['message'] ?? 'Error occurred'));
      ScaffoldMessenger.of(context).showSnackBar(snackBar);
    }
  }

  Container buttonSection() {
    return Container(
      width: MediaQuery.of(context).size.width,
      height: 40.0,
      padding: EdgeInsets.symmetric(horizontal: 15.0),
      margin: EdgeInsets.only(top: 15.0),
      child: RaisedButton(
        onPressed: passwordController.text == ""
            ? null
            : () {
                setState(() {
                  _isLoading = true;
                });
                signIn(passwordController.text);
              },
        elevation: 0.0,
        color: Colors.purple,
        child: Text("Sign In", style: TextStyle(color: Colors.white70)),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(5.0)),
      ),
    );
  }

  final TextEditingController passwordController = new TextEditingController();

  Container textSection() {
    return Container(
      padding: EdgeInsets.symmetric(horizontal: 15.0, vertical: 20.0),
      child: Column(
        children: <Widget>[
          Text('OTP has been sent to: ${widget.data} ' ?? 'error'),
          SizedBox(height: 30.0),
          TextFormField(
            controller: passwordController,
            obscureText: true,
            decoration: InputDecoration(
              icon: Icon(Icons.lock),
              hintText: "Enter OTP",
            ),
          ),
        ],
      ),
    );
  }

  Container headerSection() {
    return Container(
      margin: EdgeInsets.only(top: 50.0),
      padding: EdgeInsets.symmetric(horizontal: 20.0, vertical: 30.0),
      child: Image(image: AssetImage('assets/images/Motor-Sheba-Logo.png')),
    );
  }
}
