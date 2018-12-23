<?php

  include("connection.php");

  //Read Database
  $query = "select * from siswa";
  $result = mysqli_query($conn, $query);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabel Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
  </head>
  <body>
    <br>
    <div class="container">
      <h1>Tabel Siswa</h1>
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
              <th scope="col">id_siswa</th>
              <th scope="col">nama</th>
              <th scope="col">email</th>
              <th scope="col">alamat</th>
              <th scope="col">jenis_kelamin</th>
              <th scope="col">Editan</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><th scope='row'>" .$row["id_siswa"] . "</th><td>" .$row["nama"]. "</td><td>" .$row["email"]. "</td><td>" .$row["alamat"]. "</td><td>" .$row["jenis_kelamin"]. "</td><td><a href='edit.php?id=" .$row["id_siswa"]. "' type='button' class='btn btn-sm btn-primary'>Edit</a></td></tr>";
                }
              }

             ?>
            <tr class="thead-dark">
              <td colspan="6">
                <div class="text-center">
                  <a href="add.php" type="button" class="btn btn-sm btn-success">Tambah siswa</a>
                </div>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
  </body>
</html>
