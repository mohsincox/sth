<?php
	include_once 'koneksi.php';

	$idbarang = $_POST["idbarang"];

	$sql = "delete from barang where id_barang = '".$idbarang."'";

	mysqli_query($koneksibloc, $sql);
?>