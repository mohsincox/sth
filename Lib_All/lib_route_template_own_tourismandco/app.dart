import 'package:flutter/material.dart';
import 'screens/location_detail/location_detail.dart';
import 'screens/locations/locations.dart';
import 'style.dart';

const LocationsRoute = '/';
const LocationDetailRoute = '/location_detail';

class App extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      onGenerateRoute: _routes(),
      // home: Locations(),
      theme: ThemeData(
        appBarTheme: AppBarTheme(
          textTheme: TextTheme(
            headline6: AppBarTextStyle,
          ),
        ),
        textTheme: TextTheme(
          headline6: Headline6TextStyle,
          bodyText2: BodyText2TextStyle,
        ),
      ),
    );
  }

  RouteFactory _routes() {
    return (settings) {
      final Map<String, dynamic> arguments = settings.arguments;
      Widget screen;
      switch (settings.name) {
        case LocationsRoute:
          screen = Locations();
          break;
        case LocationDetailRoute:
          screen = LocationDetail(arguments['id']);
          break;
        default:
          return null;
      }
      return MaterialPageRoute(builder: (BuildContext context) => screen);
    };
  }
}
