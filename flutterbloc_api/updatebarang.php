<?php
	include_once 'koneksi.php';

	$id_barang = $_POST["id_barang"];
	$nama_barang = $_POST["nama_barang"];
	$qty_barang = $_POST["qty_barang"];
	$harga_barang = $_POST["harga_barang"];

	$sql = "update barang set nama_barang = '".$nama_barang."', qty_barang = '".$qty_barang."', harga_barang = '".$harga_barang."' where id_barang = '".$id_barang."'";

	mysqli_query($koneksibloc, $sql);

	// var_dump($_POST);
?>