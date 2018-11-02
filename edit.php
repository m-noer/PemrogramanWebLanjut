<?php
  $id_siswa = $_GET['id'];

  include 'connection.php';

  $query = "select * from siswa where id_siswa='$id_siswa'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $nama = $row['nama'];
      $email = $row['email'];
      $password = $row['password'];
      $alamat = $row['alamat'];
      $gender = $row['jenis_kelamin'];
    }
  }

  // Update data siswa
  if (isset($_POST['update'])) {
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

    $query = "update siswa
    set nama = '$nama',
    email='$email',
    password='$password',
    alamat='$alamat',
    jenis_kelamin='$gender'
    where id_siswa = '$id_siswa' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
      header("Location: index.php");
    } else {
      echo "Error". mysqli_error($conn);
    }
  }

  // Delete data Siswa
  if (isset($_POST['delete'])) {
    $query = "delete from siswa where id_siswa='$id_siswa'";

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
     <title>Tabel Siswa</title>
     <link rel="stylesheet" href="bootstrap.css">
   </head>
   <body>
     <div class="container">
       <h1>Edit Siswa</h1>
       <form class="row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $id_siswa; ?>" method="post">
          <div class="form-group col-sm-12">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo "$nama"; ?>">
          </div>
          <div class="form-group col-sm-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo "$email"; ?>">
          </div>
          <div class="form-group col-sm-12">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" value="<?php echo "$password"; ?>">
          </div>
          <div class="form-group col-sm-12">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo "$alamat"; ?>">
          </div>
          <div class="form-group col-sm-12">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender">
              <?php
                if ($gender == 'Laki-Laki') {
                  echo '<option selected value="l">Laki-laki</option>';
                  echo '<option value="p">Perempuan</option>';
                } else {
                  echo '<option value="l">Laki-laki</option>';
                  echo '<option selected value="p">Perempuan</option>';
                }
               ?>

            </select>
          </div>
          <div class="col-sm-12">
            <input class="btn btn-success form-control" type="submit" name="update" value="Update"><br><br>
            <input class="btn btn-danger form-control" type="submit" name="delete" value="Delete">
          </div>

       </form>
     </div>
   </body>
 </html>
