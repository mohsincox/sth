import 'package:flutter/material.dart';
import 'package:flutter_todos/projects/projects.dart';
import 'package:flutter_bloc/flutter_bloc.dart';

class ProjectsList extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return BlocBuilder<ProjectBloc, ProjectState>(
      builder: (context, state) {
        switch (state.status) {
          case ProjectStatus.failure:
            return const Center(child: Text('failed to fetch projects'));
          case ProjectStatus.success:
            if (state.projects.isEmpty) {
              return const Center(child: Text('no projects'));
            }
            return ListView.builder(
              itemBuilder: (BuildContext context, int index) {
                return index >= state.projects.length
                    ? Text('No data')
                    : Text(state.projects[index].name);
              },
              itemCount: state.projects.length,
            );
          default:
            return const Center(child: CircularProgressIndicator());
        }
      },
    );
  }
}
