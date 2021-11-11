class Contact {
  final int id;
  final String name;
  final String username;
  final String email;
  final Company company;

  Contact({this.id, this.name, this.username, this.email, this.company});

  Contact.formJson(Map<String, dynamic> parsedJson)
      : id = parsedJson['id'],
        name = parsedJson['name'],
        username = parsedJson['username'],
        email = parsedJson['email'],
        company = Company.fromJson(parsedJson['company']);
}

class Company {
  final String name;

  Company({this.name});

  Company.fromJson(Map<dynamic, dynamic> parsedJson)
      : name = parsedJson['name'];
}
