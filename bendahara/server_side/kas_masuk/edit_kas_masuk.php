<?php 
require_once '../../koneksi/conn.php';
$id = $conn->real_escape_string($_POST['id']);
$nama = $conn->real_escape_string($_POST['nama']);
$jumlah = $conn->real_escape_string($_POST['jumlah']);

$data = array();
$data['error_string'] = array();
$data['inputerror'] = array();
$data['status'] = TRUE;

if($nama == ''){
	$data['inputerror'][] = 'nama';
	$data['error_string'][] = 'Nama wajib di isi';
	$data['status'] = FALSE;
}

if($jumlah == ''){
	$data['inputerror'][] = 'jumlah';
	$data['error_string'][] = 'Jumlah wajib diisi';
	$data['status'] = FALSE;
}

if($data['status'] === FALSE){
	echo json_encode($data);
	exit();
}

$sql=$conn->query("UPDATE kas_masuk SET nama='$nama', jumlah='$jumlah' WHERE id='$id' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>