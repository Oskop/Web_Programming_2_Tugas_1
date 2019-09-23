<!-- Retrieve Data Script -->
<?php
require_once 'connection.php';
$users = mysqli_query($connection, "SELECT * FROM users ORDER BY id");
?>
<!-- End of Retrieve Data Script -->

<!-- File Header -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>List User</title>
  </head>
  <body>

<!-- End of File Header -->

<!-- File Body -->

    <div class="container">
      <div class="row">
        <div class="col-2 mt-4">
          <a href="formuser.php" class="btn btn-primary">Tambah User</a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <table id="list_users" class="display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($users as $usr => $data): ?>
                <tr>
                  <td><?=$usr+1;?></td>
                  <td><?=$data['nama'];?></td>
                  <td><?=$data['username'];?></td>
                  <td><?=$data['password'];?></td>
                  <td><?=$data['email'];?></td>
                  <td>
                    <a href="<?="formuser.php?id=".$data['id'];?>"
                      class="btn btn-primary">Edit</a>
                    <a href="<?="delete.php?id=".$data['id'];?>"
                      onclick="return confirm('Yakin ingin menghapus user ini?');"
                      class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<!-- End of File Body -->

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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>

<!-- End of Script Dependencies Section -->

<!-- Main Script Section -->

    <script type="text/javascript">
      $(document).ready(function() {
        $('#list_users').DataTable({
          columnDefs:[{
            targets: [0], orderData: [0, 1]
          }]
        });
      });
    </script>

<!-- End of Main Script Section -->

  </body>
</html>
