import 'package:bloc/bloc.dart';

/// {@template counter_observer}
/// [BlocObserver] for the counter application which
/// observes all [Cubit] state changes.
/// {@endtemplate}
class CounterObserver extends BlocObserver {
  @override
  void onChange(Cubit cubit, Change change) {
    print('hamba: ${cubit.runtimeType} $change');
    super.onChange(cubit, change);
  }
}
