import 'package:andy_julow/validation/validation_item.dart';
import 'package:flutter/cupertino.dart';

class SignupValidation with ChangeNotifier {
  ValidationItem _firstName = ValidationItem(null, null);
  ValidationItem _lastName = ValidationItem(null, null);
  ValidationItem _dob = ValidationItem(null, null);

  // Getters
  ValidationItem get firstName => _firstName;
  ValidationItem get lastName => _lastName;
  ValidationItem get dob => _dob;
  bool get isValid {
    if (_firstName.value != null &&
        _lastName.value != null &&
        dob.value != null) {
      return true;
    } else {
      return false;
    }
  }

  // Setters
  void changeFirstName(String value) {
    if (value.length >= 3) {
      _firstName = ValidationItem(value, null);
    } else {
      _firstName = ValidationItem(null, "Must be at least 3 characters");
    }
    notifyListeners();
  }

  void changeLastName(String value) {
    if (value.length >= 2) {
      _lastName = ValidationItem(value, null);
    } else {
      _lastName = ValidationItem(null, "Must be at least 2 characters");
    }
    notifyListeners();
  }

  void changeDOB(String value) {
    try {
      DateTime.parse(value);
      _dob = ValidationItem(value, null);
    } catch (error) {
      _dob = ValidationItem(null, "Invalid Format");
    }
    notifyListeners();
  }

  void submitData() {
    print(
      "First Name: ${firstName.value}, Last Name: ${lastName.value}, DOB: ${DateTime.parse(dob.value)}",
    );
  }
}
