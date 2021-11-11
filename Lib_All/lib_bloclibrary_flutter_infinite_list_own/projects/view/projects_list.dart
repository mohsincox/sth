import 'package:flutter/material.dart';
import 'package:flutter_todos/projects/projects.dart';
import 'package:flutter_bloc/flutter_bloc.dart';

class ProjectsList extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return BlocBuilder<ProjectBloc, ProjectState>(
      builder: (context, state) {
        List<Project> projects = const [];
        if (state is ProjectSuccess) {
          projects = state.projects;
        }
        return ListView.builder(
          itemCount: projects.length,
          itemBuilder: (BuildContext context, int index) {
            return Dismissible(
              key: Key(projects[index].name),
              // child: Text(projects[index].name),
              child: ListTile(
                leading: Text('${projects[index].id}',
                    style: Theme.of(context).textTheme.caption),
                title: Text(projects[index].name ?? 'default'),
                isThreeLine: true,
                subtitle: Text(projects[index].description),
                dense: true,
              ),
            );
          },
        );

        // return ListView.builder(
        //   itemBuilder: (BuildContext context, int index) {
        //     return index >= projects.length
        //         ? Text('No data')
        //         : Text(projects[index].name);
        //   },
        //   itemCount: projects.length,
        // );
      },
    );
  }
}
