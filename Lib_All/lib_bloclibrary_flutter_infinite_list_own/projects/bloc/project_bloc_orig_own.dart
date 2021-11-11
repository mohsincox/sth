import 'dart:async';
import 'dart:convert';

import 'package:bloc/bloc.dart';
import 'package:equatable/equatable.dart';
// import 'package:flutter_todos/projects/models/models.dart';
import 'package:flutter_todos/projects/projects.dart';
import 'package:http/http.dart' as http;
import 'package:meta/meta.dart';
import 'package:rxdart/rxdart.dart';

part 'project_event.dart';
part 'project_state.dart';

class ProjectBloc extends Bloc<ProjectEvent, ProjectState> {
  // ProjectBloc() : super(ProjectInitial());
  ProjectBloc({@required this.httpClient}) : super(const ProjectState());

  final http.Client httpClient;

  @override
  Stream<Transition<ProjectEvent, ProjectState>> transformEvents(
    Stream<ProjectEvent> events,
    TransitionFunction<ProjectEvent, ProjectState> transitionFn,
  ) {
    return super.transformEvents(
      events.debounceTime(const Duration(milliseconds: 500)),
      transitionFn,
    );
  }

  @override
  Stream<ProjectState> mapEventToState(
    ProjectEvent event,
  ) async* {
    if (event is ProjectFetched) {
      yield await _mapProjectFetchedToState(state);
    }
  }

  Future<ProjectState> _mapProjectFetchedToState(ProjectState state) async {
    try {
      if (state.status == ProjectStatus.initial) {
        final projects = await _fetchProjects();
        return state.copyWith(
          status: ProjectStatus.success,
          projects: projects,
        );
      }
      final projects = await _fetchProjects(state.projects.length);
      return state.copyWith(
        status: ProjectStatus.success,
        projects: List.of(state.projects)..addAll(projects),
      );
    } on Exception {
      return state.copyWith(status: ProjectStatus.failure);
    }
  }

  Future<List<Project>> _fetchProjects([int startIndex = 0]) async {
    final response = await httpClient.get(
      // 'https://jsonplaceholder.typicode.com/posts?_start=5&_limit=10',
      'http://192.168.100.75/laravel55/public/api/project',
    );
    if (response.statusCode == 200) {
      final body = json.decode(response.body) as List;
      return body.map((dynamic json) {
        return Project(
          id: json['id'] as int,
          // name: json['title'] as String,
          // description: json['body'] as String,
          name: json['name'] as String,
          description: json['description'] as String,
        );
      }).toList();
    }
    throw Exception('error fetching projects');
  }
}
