import 'package:andy_julow/blocs/contact_bloc.dart';
import 'package:flutter/material.dart';

class ContactsProvider extends InheritedWidget {
  final ContactsBloc bloc;

  ContactsProvider({Key key, Widget child})
      : bloc = ContactsBloc(),
        super(key: key, child: child);

  bool updateShouldNotify(_) => true;

  static ContactsBloc of(BuildContext context) {
    return context.dependOnInheritedWidgetOfExactType<ContactsProvider>().bloc;
  }
}

// return context.dependOnInheritedWidgetOfExactType<MyInheritedWidget>().data;
// T dependOnInheritedWidgetOfExactType<T extends InheritedWidget>({ Object aspect });
// dependOnInheritedWidgetOfExactType<MyInheritedWidget>();
