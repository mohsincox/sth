<?php
	include_once 'koneksi.php';

	$databarang = array();

	$sql = "select * from barang";
	$getbarang = mysqli_query($koneksibloc, $sql);

	while ($rowbarang = mysqli_fetch_array($getbarang)) {
		$databarang[] = $rowbarang;
	}

	echo json_encode($databarang);
?>