import 'package:equatable/equatable.dart';
import 'package:flutter/cupertino.dart';

class Project extends Equatable {
  // const Project({@required this.id, @required this.name, @})

  final int id;
  final String name;
  final String description;

  const Project({
    @required this.id,
    @required this.name,
    @required this.description,
  });

  List<Object> get props => [id, name, description];
}
