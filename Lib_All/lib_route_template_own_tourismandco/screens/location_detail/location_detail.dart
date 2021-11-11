import 'package:flutter/material.dart';
import '../../models/location.dart';
import 'image_banner.dart';
import 'text_section.dart';

class LocationDetail extends StatelessWidget {
  final int _locationID;

  LocationDetail(this._locationID);
  @override
  Widget build(BuildContext context) {
    // final locations = Location.fetchAll();
    // final location = locations.first;
    final location = Location.fetchByID(_locationID);
    return Scaffold(
      appBar: AppBar(
        title: Text(location.name),
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            ImageBanner(location.imagePath),
          ]..addAll(
              location.facts.map((e) => TextSection(e.title, e.text)).toList()),
        ),
      ),
    );
  }
}
