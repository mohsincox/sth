import 'package:andy_julow/models/color.dart';
import 'package:andy_julow/providers/preference_provider.dart';
import 'package:andy_julow/widgets/home.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (BuildContext context) => PreferenceProvider(),
      child: Consumer<PreferenceProvider>(
        builder: (context, provider, child) {
          return StreamBuilder<Brightness>(
              stream: provider.bloc.brightness,
              builder: (context, snapshot) {
                if (!snapshot.hasData) return Container();
                return StreamBuilder<ColorModel>(
                    stream: provider.bloc.primaryColor,
                    builder: (context, snapshotPrimaryColor) {
                      if (!snapshotPrimaryColor.hasData) return Container();
                      return MaterialApp(
                        title: 'Flutter Demo',
                        theme: ThemeData(
                          primaryColor: snapshotPrimaryColor.data.color,
                          brightness: snapshot.data,
                          visualDensity: VisualDensity.adaptivePlatformDensity,
                        ),
                        home: Home(),
                      );
                    });
              });
        },
      ),
    );
  }
}
