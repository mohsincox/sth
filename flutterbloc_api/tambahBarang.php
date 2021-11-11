<?php
	include_once 'koneksi.php';

	$nama_barang = $_POST["nama_barang"];
	$qty_barang = $_POST["qty_barang"];
	$harga_barang = $_POST["harga_barang"];

	$sql = "insert into barang (nama_barang, qty_barang, harga_barang) values('".$nama_barang."', '".$qty_barang."', '".$harga_barang."')";

	mysqli_query($koneksibloc, $sql);
?>