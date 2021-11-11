import 'dart:async';

import 'package:exampletododevindo/src/models/todoModels.dart';
import 'package:flutter/foundation.dart';
import 'package:http/http.dart' show Client;

class TodoApiProvider {
  Client client = Client();
  final _url = 'http://192.168.100.75/laravel55/public/api/project';
  Future<List<Todo>> fetchTodoList() async {
    print('Data List');
    final response = await client.get(_url);
    if (response.statusCode == 200) {
      // print(response.body.length);
      return compute(todoFromJson, response.body);

      // return ItemModel.fromJson(json.decode(response.body));
    } else {
      throw Exception('Failed to Load');
    }
  }

  Future addTodo(name, description) async {
    final response = await client.post(
        "http://192.168.100.75/laravel55/public/api/project",
        body: {'name': name, 'description': description});
    if (response.statusCode == 200) {
      return response;
    } else {
      throw Exception('Failed to add data');
    }
  }

  Future updateTodo(ids) async {
    // print('$_url$ids/update');
    final response = await client.post(
        "http://192.168.100.75/laravel55/public/api/project/update",
        body: {'id': ids, 'name': 'mmmZZddd', 'description': 'nn'});
    if (response.statusCode == 200) {
      print('Updated');
      return response;
    } else {
      throw Exception('Failed to update data');
    }
  }

  Future updateDataTest(String id, String name, String description) async {
    var response = await client.post(
        "http://192.168.100.75/laravel55/public/api/project/update",
        body: {
          "id": id,
          "name": name,
          "description": description,
        });

    if (response.statusCode == 200) {
      print("Data Updated");
    }
  }

  Future deleteDataId(String id) async {
    var response = await client.post(
        "http://192.168.100.75/laravel55/public/api/project/delete",
        body: {
          "id": id,
        });

    if (response.statusCode == 200) {
      print("Data deleted!");
    }
  }
}
