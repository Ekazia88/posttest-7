<?php
session_start();
if($_SESSION['level']==""){
  echo "<script>alert('Login Dulu.');
  document.location.href ='./../../index.php?pesan=gagal';</script>";
}
require '../../koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM anime WHERE id_anime = $id");
$ani =[];

while($row = mysqli_fetch_assoc($result)){
  $ani[] = $row;
}

$ani = $ani[0];
if(isset($_POST['ubah'])){

  $eid = $_POST['id'];
  $nama = $_POST['nama'];
  $tanggal = $_POST['tanggal_rilis'];
  $studio = $_POST['studio'];
  $gambar = $_FILES['img']['name'];
  if($gambar != "") {
    $ekstensi_diperbolehkan = array("jpg","jpeg","png","gif","webp"); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['img']['tmp_name'];
    $angka_acak     = rand(1,999);
    $name_new_img = $angka_acak.'-'.$gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../img/'.$name_new_img);     
                   $query  = "UPDATE anime SET nama_anime = '$nama', tanggal_rilis = '$tanggal', gambar_anime = '$name_new_img', studio = '$studio' WHERE id_anime = '$eid'";
                    $result = mysqli_query($conn, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($conn));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='anime.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png $ekstensi.');window.location='anime.php';</script>";
              }
    } else {
      $query  = "UPDATE anime SET  nama_anime = '$nama', tanggal_rilis = '$tanggal',studio = $studio ";
      $query .= "WHERE id_anime = '$eid'";
      $result = mysqli_query($conn, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='anime.php';</script>";
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Edit</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/crud.css"/>
  </head>
  <body>
    <div class="sidebar">
      <h2>Admin</h2>
      <ul class="nav">
      <li>
          <a href="./index.php">
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="user.php">
            <span>User Account</span>
          </a>
        </li>
        <li>
          <a href="anime.php">
            <span>Anime</span>
          </a>
        </li>
        <li>
            <a href="../logout.php">
              <span>Log Out</span>
            </a>
        </li>
      </ul>
    </div>
    <div class="main">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container">
              <h1>Edit User</h1>
              <hr>
              <input type="hidden" name="id" value="<?php echo $ani['id_anime']?>">
              <label for="name"><b>Name</b></label>
              <input type="text" placeholder="Enter Name" name="nama" value="<?php echo $ani['nama_anime']?>"required>
              <label for="Tanggal Rilis"><b>Tanggal_rilis</b></label>
              <input type="datetime-local" id="dtmpicker">
              <label for="img"><b>Gambar</b></label>
              <input type="file" placeholder="Enter Gambar" name="img" required>
              <label for="studio"><b>Studio</b></label>
              <input type="text" placeholder="Enter studio" name="studio" value="<?php echo $ani['studio']?>"required>
              <hr>
              <button type="submit" class="addbtn" name="ubah" >Ubah Data</button>
            </div>
          </form>          
    </div>
  </body>
  <script src="./../js/jquery.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
  <script>$('#datetimepicker').datetimepicker('toggle')</script>
</html>