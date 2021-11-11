import 'package:exampletododevindo/src/models/todoModels.dart';
import 'package:exampletododevindo/src/resources/repository.dart';
import 'package:rxdart/rxdart.dart';

class TodoBloc {
  final _repository = Repository();
  final _todoFetcher = PublishSubject<List<Todo>>();
  final _name = BehaviorSubject<String>();
  final _description = BehaviorSubject<String>();
  final _id = BehaviorSubject<String>();

  Observable<List<Todo>> get allTodo => _todoFetcher.stream;
  Function(String) get updateName => _name.sink.add;
  Function(String) get updateDescription => _description.sink.add;
  Function(String) get getId => _id.sink.add;

  fetchAllTodo() async {
    List<Todo> todo = await _repository.fetchAllTodo();
    _todoFetcher.sink.add(todo);
  }

  addSaveTodo() {
    _repository.addSaveTodo(_name.value, _description.value);
  }

  updateTodo() {
    print(_id.value);
    _repository.updateSaveTodo(_id.value);
  }

  // update(id) {
  //   _repository.updateSaveTodo(id);
  // }

  editTest(String id) {
    print(_name.value);
    print(_description.value);

    _repository.editDataTest(id, _name.value, _description.value);
  }

  deleteData(id) {
    _repository.dltDataId(id);
  }

  dispose() {
    _name.close();
    _description.close();
    _id.close();
    _todoFetcher.close();
  }
}

final bloc = TodoBloc();
