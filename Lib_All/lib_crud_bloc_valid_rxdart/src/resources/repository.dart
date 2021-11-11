import 'dart:async';

import 'package:exampletododevindo/src/models/todoModels.dart';
import 'package:exampletododevindo/src/resources/todoApiProvider.dart';

class Repository {
  final todoApiProvider = TodoApiProvider();

  Future<List<Todo>> fetchAllTodo() => todoApiProvider.fetchTodoList();
  Future addSaveTodo(String name, String description) =>
      todoApiProvider.addTodo(name, description);
  Future updateSaveTodo(String ids) => todoApiProvider.updateTodo(ids);

  Future editDataTest(String id, String name, String description) =>
      todoApiProvider.updateDataTest(id, name, description);

  Future dltDataId(id) => todoApiProvider.deleteDataId(id);
}
