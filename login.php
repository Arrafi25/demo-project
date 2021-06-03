<?php 

    include 'config.php';

    if( isset($_SESSION["user"]) ) {

      echo "<script>document.location.href = 'index.php?page=dashboard' </script>";
    }
    
    if( isset($_POST["login"]) ) {

        $user = $_POST["username"];
        $pass = $_POST["password"];

        $query = "SELECT * FROM 08_tbl_admin WHERE username = '$user'";
        $result = mysqli_query($conn, $query);

        if( mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_assoc($result);
            
            if( password_verify($pass, $row["password"]) ) {

                $_SESSION["user"] = $user;
                $_SESSION["nama_admin"] = $row['nama_admin'];
                $_SESSION["id_admin"] = $row['id_admin'];
                   
                echo "<script>alert('Login Sukses'); document.location.href = 'index.php?page=dashboard' </script>";
            } 

            else {
                $error = true;            }
        }
    }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Login Page</title>
  </head>
  <body>

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-5">
          <h1 class="text-center">Halaman Login</h1>

          <div class="card mt-5">
            <div class="card-header text-center">
              Silahkan Login
            </div>
            <div class="card-body">
              <form action="" method="post">
                <?php if(isset($error)) : ?>
                  <div class="alert alert-danger" role="alert">
                    Login gagal! username / password salah
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-success btn-block">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>