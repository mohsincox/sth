import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutterbloc/blocbarang/blocbarang.dart';
import 'package:flutterbloc/ui/editbarang.dart';
import 'package:flutterbloc/ui/tambahbarang.dart';

class MyHome extends StatefulWidget {
  @override
  _MyHomeState createState() => _MyHomeState();
}

class _MyHomeState extends State<MyHome> {
  Timer _timer;
  String _selectedItem;

  static const menuItems = <String>[
    "Edit",
    "Hapus",
  ];

  final List<PopupMenuItem<String>> _popupMenuItems = menuItems
      .map((String val) => PopupMenuItem<String>(
            value: val,
            child: Text(val),
          ))
      .toList();

  @override
  void initState() {
    blocBarang.fetchAllBarangM();

    _timer = Timer.periodic(
        Duration(milliseconds: 500), (timer) => blocBarang.fetchAllBarangM());
    super.initState();
  }

  void _hapusBarang(id) {
    blocBarang.hapusDataBarang(id);
  }

  @override
  void dispose() {
    blocBarang.dispose();
    if (_timer.isActive) _timer.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('data'),
        actions: [
          IconButton(
            icon: Icon(Icons.add),
            onPressed: () => Navigator.of(context)
                .push(MaterialPageRoute(builder: (context) => TambaBarang())),
          )
        ],
      ),
      body: Container(
        width: MediaQuery.of(context).size.width,
        child: StreamBuilder(
          stream: blocBarang.semuaDataBarang,
          builder: (context, snapshot) {
            print('object1');
            if (snapshot.hasData) {
              print('object2');
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, i) {
                  return ListTile(
                    trailing: PopupMenuButton(
                      itemBuilder: (context) => _popupMenuItems,
                      onSelected: (String val) {
                        _selectedItem = val;

                        if (_selectedItem == "Edit") {
                          print("Eddd");
                          String id = snapshot.data[i].id.toString();
                          String namaBarang = snapshot.data[i].namaBarang;
                          String qtyBarang = snapshot.data[i].qtyBarang;
                          String hargaBarang = snapshot.data[i].hargaBarang;

                          Navigator.of(context).push(MaterialPageRoute(
                              builder: (context) => EditBarang(
                                    id: id,
                                    namaBarang: namaBarang,
                                    qtyBarang: qtyBarang,
                                    hargaBarang: hargaBarang,
                                  )));
                        } else {
                          String id = snapshot.data[i].id.toString();
                          _hapusBarang(id);
                          print("Hapus");
                        }
                      },
                    ),
                    title: Text(snapshot.data[i].namaBarang),
                    subtitle: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: <Widget>[
                        Text("Qty : ${snapshot.data[i].qtyBarang}"),
                        Text("Harga : ${snapshot.data[i].hargaBarang}"),
                      ],
                    ),
                  );
                },
              );
            }
            return Center(child: CircularProgressIndicator());
          },
        ),
      ),
    );
  }
}
