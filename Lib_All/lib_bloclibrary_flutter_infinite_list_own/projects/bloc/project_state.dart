part of 'project_bloc.dart';

abstract class ProjectState extends Equatable {
  const ProjectState();

  @override
  List<Object> get props => [];
}

class ProjectInitial extends ProjectState {}

class ProjectSuccess extends ProjectState {
  final List<Project> projects;

  const ProjectSuccess([this.projects = const []]);

  // @override
  // List<Object> get props => [projects];

}

class ProjectFailure extends ProjectState {}
