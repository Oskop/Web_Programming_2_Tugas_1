<?php require_once 'connection.php'; ?>

<!-- File Header -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <title>List User</title>
  </head>
  <body>

<!-- End of File Header -->

  <div class="container">
    <div class="row">
      <div class="col-10 mt-3">
        <h2>FORM USER</h2>

        <!-- User Form -->

        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = $connection->query("SELECT * FROM users WHERE id={$_GET['id']}");
          $datanya = $sql->fetch_assoc();
        }
        ?>

        <!-- Form Untuk Apa Saja -->

        <?php
        if (isset($_POST['save'])) {
          $name = $_POST['nama'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $email = $_POST['email'];
          echo $_POST['nama'];

          $query = "INSERT INTO users (nama, username, password, email)
          VALUES('$name', '$username', '$password', '$email')";

          if (isset($_GET['id'])) {
            $query = "UPDATE users SET nama='$name', username='$username',
            password='$password', email='$email' WHERE id={$_GET['id']}";
          }

          if ($connection->query($query) === TRUE) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil Disimpan</div>";
            echo "<script>var time = setTimeout(function()
                  {window.location = 'index.php'}, 3000);</script>";
          } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal Disimpan</div>";
            echo "<script>var time = setTimeout(function()
                  {window.location = 'index.php'}, 3000);</script>";
            echo mysqli_errno($connection);
            echo mysqli_error($connection);
          }
        }
         ?>

        <form action="" method="post">
          <div class="form-group">
            <label for="nama">Nama</label>
            <!-- <input type="hidden" name="id" id="id" value="<?=$id;?>"> -->
            <input type="text" class="form-control" id="nama" name="nama"
            placeholder="Masukkan Nama Lengkap" value="<?php if (isset($_GET['id'])) {
              echo $datanya['nama'];
            } ?>">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username"
            id="username" placeholder="Masukkan Username" value="<?php if (isset($_GET['id'])) {
              echo $datanya['username'];
            } ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password"
            id="password" placeholder="Masukkan Password" value="
            <?php if (isset($_GET['id'])) {
              echo $datanya['password'];
            } ?>">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"
             id="email" placeholder="Masukkan Email" value="
             <?php if (isset($_GET['id'])) {
               echo $datanya['email'];
             } ?>">
          </div>
          <input type="submit" name="save" value="Save" class="btn btn-success"></input>
          <a href="index.php" class="ml-3 btn btn-primary">Kembali</a>
        </form>

        <!-- End of User Form -->

      </div>
    </div>
  </div>


<!-- Script Dependencies Section -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
     crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
     crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> -->
    </script>

<!-- End of Script Dependencies Section -->

  <!-- Validation Script -->

  <script type="text/javascript">
    function namaValidation(inputNama) {
      var letters = /^[A-Za-z]+$/;
      if (true) {

      }
    }
  </script>

  <!-- End of Validation Script -->

  </body>
</html>
