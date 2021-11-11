import 'package:andy_julow/data/jsonplaceholder_provider.dart';
import 'package:andy_julow/models/contact.dart';

class Repository {
  final JsonPlaceHolderProvider jsonProvider = JsonPlaceHolderProvider();

  Future<List<Contact>> fetchContacts() async =>
      await jsonProvider.fetchContacts();
}
