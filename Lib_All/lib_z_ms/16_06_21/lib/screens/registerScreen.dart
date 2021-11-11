import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'loginScreen.dart';
import '../env.dart';

class RegisterScreen extends StatefulWidget {
  @override
  _RegisterScreenState createState() => _RegisterScreenState();
}

class _RegisterScreenState extends State<RegisterScreen> {
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
                  SizedBox(height: 30),
                  textSection(),
                  buttonSection(),
                ],
              ),
      ),
    );
  }

  signUp(String email) async {
    Map<String, String> headers = {
      'Content-type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    };

    final data = jsonEncode({"email": email});
    var jsonResponse = null;

    var response = await http.post(Uri.parse("${Env.URL_PREFIX}/auth/signup"),
        body: data, headers: headers);

    if (response.statusCode == 201) {
      jsonResponse = json.decode(response.body);
      var decodeData = json.decode(data);
      // print(ddd['email']);
      // print('Response status: ${response.statusCode}');
      if (jsonResponse != null) {
        setState(() {
          _isLoading = false;
        });

        Navigator.of(context).pushAndRemoveUntil(
            MaterialPageRoute(
                builder: (BuildContext context) =>
                    LoginScreen(data: decodeData['email'])),
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
        onPressed: emailController.text == ""
            ? null
            : () {
                setState(() {
                  _isLoading = true;
                });
                signUp(emailController.text);
              },
        elevation: 0.0,
        color: Colors.purple,
        child: Text("Get OTP", style: TextStyle(color: Colors.white70)),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(5.0)),
      ),
    );
  }

  final TextEditingController emailController = new TextEditingController();
  final TextEditingController passwordController = new TextEditingController();

  Container textSection() {
    return Container(
      padding: EdgeInsets.symmetric(horizontal: 15.0, vertical: 20.0),
      child: Column(
        children: <Widget>[
          TextFormField(
            controller: emailController,
            decoration: InputDecoration(
              prefixIcon:
                  Padding(padding: EdgeInsets.all(15), child: Text('+88')),
              icon: Icon(Icons.send_to_mobile),
              hintText: "Enter Mobile Number",
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
