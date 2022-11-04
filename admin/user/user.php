<?php
	session_start();
if($_SESSION['level']==""){
  echo "<script>alert('Login Dulu.');
  document.location.href ='./../../index.php?pesan=gagal';</script>";
}
require '../../koneksi.php';
if (isset($_POST['search'])) {
  $search=trim($_POST['search']);
  $sql="select * from user where nama like '%".$search."%' or username like '%".$search."%' or email like '%".$search."%' order by id_user asc";
  $result = mysqli_query($conn,$sql);
  $user = [];
while($row = mysqli_fetch_assoc($result)){
  $user[] =$row;

}
}else {
$result = mysqli_query($conn,"SELECT * FROM user");
$user = [];
while($row = mysqli_fetch_assoc($result)){
  $user[] =$row;
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - User Account</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/search.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  </head>
  <body>
    <div class="sidebar">
      <h2>Admin</h2>
      <ul class="nav">
        <li>
          <a href="#">
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span>User Account</span>
          </a>
        </li>
        <li>
          <a href="../anime/anime.php">
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
      <div class="search">
        <form action="" method="post">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <a href="add.php" >
        <span class="add">Tambah data</span>
      </a>
        <table class="table">
            <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Username</th>
            <th>password</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Action</th>
            <tbody>
              <?php $i = 1; foreach($user as $usr) :?>
            </tr>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $usr["nama"];?></td>
              <td><?php echo $usr["username"];?></td>
              <td><?php echo $usr["pass"];?></td>
              <td><?php echo $usr["email"];?></td>
              <td><?php echo $usr["level"];?></td>
              <td>
                <a class="edit-button" href="edit.php?id=<?php echo $usr["id_user"];?>">edit</a>
                <a class ="hapus-button" href="delete.php?id=<?php echo $usr["id_user"];?>">hapus</a>
              </td>
            </tr>
            <?php $i++; endforeach;?>
            </tbody>
        </table>
    </div>
  </body>
</html>