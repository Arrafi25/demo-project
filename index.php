<?php 
    
    include 'config.php';

    if( !isset($_SESSION["user"]) ) {

        header('Location: login.php');
         exit;
    }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .border {

            border: solid 5px gray;
            width: 100%;
        }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row">
        <div class="col-3" style="background-color: #dddfeb; min-height: 39rem;">
            <div class="row mt-4">
                <div class="col text-center">
                    <img src="img/user.png" width="40%" class="rounded-circle" alt="">
                    <h4 class="mt-2">ADMIN</h4>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p><a href="index.php?page=dashboard">Dashboard</a></p>
                        <p><a href="index.php?page=data_admin">Data Admin</a></p>
                        <p><a href="index.php?page=data_siswa">Data Siswa</a></p>
                        <p><a href="index.php?page=data_pemasukan">Pemasukan</a></p>
                        <p><a href="index.php?page=data_pengeluaran">Pengeluaran</a></p>
                        <p><a href="index.php?page=laporan_pemasukan">Laporan Pemasukan</a></p>
                        <p><a href="index.php?page=laporan_pengeluaran">Laporan Pengeluaran</a></p>
                        <p><a href="logout.php" onclick="return confirm('Logout?')">Logout</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9" style="background-color: lightgray;">
            <?php 

                $halaman = $_GET['page']; 
                if(isset($halaman)) {
                    switch ($halaman) {
                        case 'dashboard':
                            include "halaman/dashboard.php";
                            break;    
                        case 'data_siswa':
                            include "halaman/data_siswa.php";
                            break;
                        case 'tambah_siswa':
                            include "halaman/tambah_siswa.php";
                            break;  
                        case 'edit_siswa':
                            include "halaman/edit_siswa.php";
                            break;
                        case 'hapus_siswa':
                            include "halaman/hapus_siswa.php";
                            break;
                        case 'data_admin':
                            include "halaman/data_admin.php";
                            break;
                        case 'tambah_admin':
                            include "halaman/tambah_admin.php";
                            break;  
                        case 'edit_admin':
                            include "halaman/edit_admin.php";
                            break;
                        case 'hapus_admin':
                            include "halaman/hapus_admin.php";
                            break;
                        case 'data_pemasukan':
                            include "halaman/data_pemasukan.php";
                            break;
                        case 'tambah_pemasukan':
                            include "halaman/tambah_pemasukan.php";
                            break;
                        case 'edit_pemasukan':
                            include "halaman/edit_pemasukan.php";
                            break;
                        case 'hapus_pemasukan':
                            include "halaman/hapus_pemasukan.php";
                            break;
                        case 'data_pengeluaran':
                            include "halaman/data_pengeluaran.php";
                            break;
                        case 'tambah_pengeluaran':
                            include "halaman/tambah_pengeluaran.php";
                            break;
                        case 'detail_pengeluaran':
                            include "halaman/detail_pengeluaran.php";
                            break;
                        case 'edit_pengeluaran':
                            include "halaman/edit_pengeluaran.php";
                            break;
                        case 'hapus_pengeluaran':
                            include "halaman/hapus_pengeluaran.php";
                            break;
                        case 'laporan_pemasukan':
                            include "halaman/laporan_pemasukan.php";
                            break;
                        case 'laporan_pengeluaran':
                            include "halaman/laporan_pengeluaran.php";
                            break;              
                        default:
                            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                            break;
                    }
                }

            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>