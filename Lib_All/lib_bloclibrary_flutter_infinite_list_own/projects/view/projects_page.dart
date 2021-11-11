import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:flutter_todos/projects/bloc/project_bloc.dart';
import 'package:flutter_todos/projects/projects.dart';
import 'package:http/http.dart' as http;

class ProjectsPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Testing")),
      body: BlocProvider(
        create: (_) =>
            ProjectBloc(httpClient: http.Client())..add(ProjectFetched()),
        child: ProjectsList(),
      ),
    );
  }
}
