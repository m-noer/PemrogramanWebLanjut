<?php

  include("connection.php");

  if (isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    if ($_POST['gender'] == 'l') {
      $gender = "Laki-Laki";
    } else {
      $gender = "Perempuan";
    }

    $query = "insert into siswa (nama, email, password, alamat, jenis_kelamin) values ('$nama', '$email', '$password', '$alamat', '$gender')";

    $result = mysqli_query($conn, $query);

    if ($result) {
      header("Location: index.php");
    } else {
      echo "Error". mysqli_error($conn);
    }

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Tabel Siswa</title>
    <link rel="stylesheet" href="bootstrap.css">
  </head>
  <body>
    <div class="container">
      <h1>Insert Tabel Siswa</h1>
      <form class="row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div class="form-group col-sm-12">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" name="nama">
         </div>
         <div class="form-group col-sm-12">
           <label for="email">Email</label>
           <input type="email" class="form-control" name="email">
         </div>
         <div class="form-group col-sm-12">
           <label for="password">Password</label>
           <input type="text" class="form-control" name="password">
         </div>
         <div class="form-group col-sm-12">
           <label for="alamat">Alamat</label>
           <input type="text" class="form-control" name="alamat">
         </div>
         <div class="form-group col-sm-12">
           <label for="gender">Jenis Kelamin</label>
           <select class="form-control" name="gender">
             <option selected>--Jenis Kelamin--</option>
             <option value="l">Laki-laki</option>
             <option value="p">Perempuan</option>
           </select>
         </div>
         <div class="col-sm-12">
           <input class="btn btn-success form-control" type="submit" name="add" value="Add"><br><br>
         </div>
      </form>
    </div>
  </body>
</html>
