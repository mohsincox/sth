import 'package:flutter/material.dart';
import '../../models/location.dart';
import 'image_banner.dart';

class LocationDetail extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final locations = Location.fetchAll();

    return Scaffold(
      appBar: AppBar(
        title: Text("Joining Table"),
      ),
      body: ListView.builder(
        itemCount: locations.length,
        itemBuilder: (context, index) {
          final item = locations[index];
          List<Widget> getList() {
            List<Widget> childs = [];
            for (var fact in item.facts) {
              childs.add(Column(
                children: [
                  Text("Fact Name: ${fact.title}"),
                  SizedBox(height: 5),
                  Text("Fact Text: ${fact.text}"),
                  SizedBox(height: 10),
                ],
              ));
            }
            return childs;
          }

          return Column(
            children: [
              Text("Location Name: ${item.name}"),
              // ImageBanner(item.imagePath),
              SizedBox(height: 10),
              Column(
                children: getList(),
              ),
              SizedBox(height: 20),
            ],
          );
        },
      ),
    );
  }
}
