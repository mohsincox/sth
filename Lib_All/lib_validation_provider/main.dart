import 'package:andy_julow/validation/signup_validation.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (context) => SignupValidation(),
      child: MaterialApp(
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
          visualDensity: VisualDensity.adaptivePlatformDensity,
        ),
        home: Signup(),
      ),
    );
  }
}

class Signup extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final validationService = Provider.of<SignupValidation>(context);
    return Scaffold(
      appBar: AppBar(
        title: Text('Provider Validation'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(8.0),
        child: ListView(
          children: [
            TextField(
              decoration: InputDecoration(
                labelText: "First Name",
                errorText: validationService.firstName.error,
              ),
              onChanged: (String value) {
                validationService.changeFirstName(value);
              },
            ),
            TextField(
              decoration: InputDecoration(
                labelText: "Last Name",
                errorText: validationService.lastName.error,
              ),
              onChanged: (String value) {
                validationService.changeLastName(value);
              },
            ),
            TextField(
              decoration: InputDecoration(
                  labelText: "DOB",
                  errorText: validationService.dob.error,
                  hintText: "yyyy-mm-dd"),
              onChanged: (String value) {
                validationService.changeDOB(value);
              },
            ),
            RaisedButton(
              onPressed: () {
                !validationService.isValid
                    ? null
                    : validationService.submitData();
              },
              child: Text("Submit"),
            )
          ],
        ),
      ),
    );
  }
}
