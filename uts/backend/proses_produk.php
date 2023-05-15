<?php 
require_once '../database/dbkoneksi.php';
?>

<?php 
   $_nama_produk = $_POST['nama_motor'];
   $_cc = $_POST['cc'];
   $_tipe_motor_id = $_POST['tipe_motor_id'];
   $_harga = $_POST['harga'];
   $_merk_id = $_POST['merk_id'];
   $_jenis_produk = $_POST['stok'];


   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_nama_produk; // ? 2
   $ar_data[]=$_cc;// 3
   $ar_data[]=$_tipe_motor_id;
   $ar_data[]=$_harga;
   $ar_data[]=$_merk_id;
   $ar_data[]=$_jenis_produk; // ? 7

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO motor (nama_motor,cc,tipe_motor_id,
    harga,merk_id,stok) VALUES (?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE motor SET nama_motor=?,cc=?,tipe_motor_id=?,
    harga=?,merk_id=?,stok=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_produk.php');
?>