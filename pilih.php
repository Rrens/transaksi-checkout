<?php 
include "config.php";
// $id = $_GET['id_user'];
$query = mysqli_query($db, "SELECT * FROM BARANG a JOIN PElANGGAN b JOIN TRANSAKSI c ON a.ID_BARANG = b.ID_PElANGGAN = c.ID_TRANSAKSI");
$query_cek_id = mysqli_query($db, "SELECT * FROM CART");

$row_cek_id = mysqli_fetch_assoc($query_cek_id);
// $id_user = $_GET['id_user'];
$id_cart = $row_cek_id['ID_CART'];
// if (isset($_POST['pilih'])) {
//     if ($_GET['id_user'] == $row_cek_id['ID_PELANGGAN']) {
//         echo "ID TIDAK ADA";
//         $pesan = "tidak ada";
//         echo "<h1>tidak ada</h1>";
//     }else{
//         echo "<h1> ada</h1>";
//     }
// }
if(isset($_GET['id_user'])){
    $id = $_GET['id_user'];
    if ($_GET['id_user'] == $row_cek_id['ID_PELANGGAN']) {
      echo "<h1> ada</h1>";
      var_dump($row_cek_id['ID_PELANGGAN']);
      var_dump($_GET['id_user']);
      
  }
  if (isset($_GET['id'])) {
    //   mysqli_query($db, "UPDATE `cart_item` SET `ID_CART` = '$row_cek_id['$row_cek_id['ID_CART']' WHERE `cart_item`.`ID_CART_ITEM` = 4001")
    mysqli_query($db, "INSERT INTO CART_ITEM VALUES('','$id_cart','$id','')");
    var_dump($_GET['id']);
  }

}else{
  echo "<h1>tidak ada</h1>";
  mysqli_query($db, "INSERT INTO CART VALUES('','$id','','')");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <?php 
    include "bootstrap.php";
    ?>
    <title>Album example · Bootstrap v5.0</title>

  

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>    
    <header>
    <!-- <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div> -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index2.php">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item m-auto">
                    <a class="nav-link" href="index2.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pilih.php">Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cart-item.php">Cart <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <!-- <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.html">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light"></span>
                </a>
            </form> -->
        </div>
    </div>
</nav>
    </header>

    <main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
        <?php 
            $query_id_pelanggan = mysqli_query($db, "SELECT * FROM PELANGGAN ");
            $row_id_pelanggan = mysqli_fetch_assoc($query_id_pelanggan);
        ?>
            <div class="tombol">
                <a href="tambah.php?id=<?= $row_id_pelanggan['ID_PELANGGAN'] ?>">
                    <button type="submit" class="btn btn-primary ms-3 mb-3">Primary</button>
                </a>
            </div>
        
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $query_produk = mysqli_query($db, "SELECT * FROM BARANG");
                $query_id = mysqli_query($db, "SELECT * FROM BARANG ORDER BY ID_BARANG");
                $row_lagi = mysqli_fetch_assoc($query_id);
                while ($row = mysqli_fetch_assoc($query_produk)) : ?>
                <?php $id = $row_lagi['ID_BARANG']; ?>
                
                
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <h5></h5>
                            <div class="card-body">
                                <h5><?= $row['NAMA_BARANG']; ?></h5>
                                <h2><?= $row['ID_BARANG']; ?></h2>
                            <p class="card-text"><?= $row['DESKRIPSI']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="cart-item.php?id=<?= $row['ID_BARANG'] ?>" method="post">
                                        <a href="cart-item.php?id=<?= $row['ID_BARANG'] ?>">
                                            <button type="submit" name="tmbh_keranjang" class="btn btn-sm btn-outline-secondary me-3" data-bs-toggle="modal" data-bs-target="#keranjang">+ Keranjang</button>
                                        </a>
                                    </form>
                                        <a href="editlagi.php?id=<?= $row['ID_BARANG'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                                        </a>
                                        <!-- <a href="delete-barang.php?id_barang=<?= $row['ID_BARANG']; ?>" class="btn btn-danger">Hapus</a> -->
                                        <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus</button> -->
                                </div>
                                
                                <small class="text-muted">Sisa: <?= $row['STOK'] ?></small>
                            </div>
                            </div>
                            <?php 
                                $query_tambah = mysqli_query($db, "INSERT INTO CART VALUES('','$id','10000')");
                            ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="keraaaanjang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                        <?php 
                            $id = $_GET['ID_BARANG'];
                            $query_modal = mysqli_query($db, "SELECT * FROM BARANG WHERE ID_BARANG = '$id'");
                            $row_modal = mysqli_fetch_assoc($query_modal);
                        ?>
                        <h5>Contoh</h5>
                        <h5><?= $row_modal['NAMA_PRODUK'] ?></h5>
                        <h5><?= $row_modal['HARGA'] ?></h5>
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
            <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                ...
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

  </body>
</html>
