// To parse this JSON data, do
//
//     final item = itemFromJson(jsonString);

import 'dart:convert';

Item itemFromJson(String str) => Item.fromJson(json.decode(str));

String itemToJson(Item data) => json.encode(data.toJson());

class Item {
  Item({
    this.id,
    this.name,
    this.price,
  });

  int id;
  String name;
  double price;

  factory Item.fromJson(Map<String, dynamic> json) => Item(
        id: json["id"],
        name: json["name"],
        price: json["price"].toDouble(),
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "name": name,
        "price": price,
      };
}

// class Item {
//   final int id;
//   String name;
//   int price;
//   Item({this.id, this.name, this.price});

//   factory Item.fromJson(Map<String, dynamic> json) {
//     return Item(
//       id: json['id'],
//       name: json['name'],
//       price: json['price'],
//     );
//   }

//   Map<String, dynamic> toJson() => {
//         'name': name,
//         'price': price,
//       };
// }
