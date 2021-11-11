// class Info {
//   String title;
//   String description;

//   Info() {
//     title = "Default Title";
//     description = "This is the default description";
//   }
// }

import 'package:flutter/material.dart';

class Info with ChangeNotifier {
  String _title;
  String _description;

  Info() {
    _title = "Default Title";
    _description = "Default Description";
  }

  String get title => _title;
  String get description => _description;

  changeTitle(String value) {
    _title = value;
    notifyListeners();
  }

  changeDescription(String value) {
    _description = value;
    notifyListeners();
  }
}
