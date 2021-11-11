// To parse this JSON data, do
//
//     final todo = todoFromJson(jsonString);

import 'dart:convert';

List<Todo> todoFromJson(String str) {
  final jsonData = json.decode(str);
  return new List<Todo>.from(jsonData.map((x) => Todo.fromJson(x)));
}

String todoToJson(List<Todo> data) {
  final dyn = new List<dynamic>.from(data.map((x) => x.toJson()));
  return json.encode(dyn);
}

class Todo {
  int id;
  String name;
  String description;

  Todo({
    this.id,
    this.name,
    this.description,
  });

  factory Todo.fromJson(Map<String, dynamic> json) => new Todo(
        id: json["id"],
        name: json["name"],
        description: json["description"],
      );

  Map<String, dynamic> toJson() => {
        "id": id,
        "name": name,
        "description": description,
      };
}
