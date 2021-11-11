part of 'project_bloc.dart';

enum ProjectStatus { initial, success, failure }

class ProjectState extends Equatable {
  const ProjectState({
    this.status = ProjectStatus.initial,
    this.projects = const <Project>[],
  });

  final ProjectStatus status;
  final List<Project> projects;

  ProjectState copyWith({
    ProjectStatus status,
    List<Project> projects,
  }) {
    return ProjectState(
      status: status ?? this.status,
      projects: projects ?? this.projects,
    );
  }

  @override
  List<Object> get props => [status, projects];
}
