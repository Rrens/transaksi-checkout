<?php 
    include "config.php";

    $query_id_cart = mysqli_query($db, "SELECT * FROM cart");
    $query_cek_id_cart = mysqli_fetch_assoc($query_id_cart);
    $id_cart = $query_cek_id_cart['ID_CART'];

    if (isset($_POST['tambah'])) {

        // $query_sum = mysqli_query($db, "SELECT SUM(a.HARGA) FROM BARANG a JOIN CART_ITEM b 
        // ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
        // $row_sum = mysqli_fetch_assoc($query_sum);
        // $row_id_cart = mysqli_fetch_assoc($query_id_cart);
        // $row_cek_id_item = mysqli_fetch_assoc($query_cek_id_item);
        
        $total = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(a.HARGA), a.STOK, a.ID_BARANG FROM BARANG a JOIN CART_ITEM b 
        ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'"));
        $jumlah = 0;
        $jumlah_1 = mysqli_query($db, "SELECT * FROM BARANG a JOIN CART_ITEM b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
            while ($tabel = mysqli_fetch_assoc($jumlah_1)) {
                $data = $tabel['HARGA'];
                $jumlah = $jumlah+$data;
            }
            
        $id_tambah = $_GET['id_cart_item'];
        $query_tambah = mysqli_query($db, "SELECT * FROM CART_ITEM WHERE ID_CART_ITEM = '$id_tambah'");
        $row_tambah = mysqli_fetch_assoc($query_tambah);
        $hitung_tambah = $row_tambah['QUANTITY'];
        $hitung_tambah++;
        mysqli_query($db, "UPDATE CART_ITEM SET QUANTITY = '$hitung_tambah' WHERE ID_CART_ITEM = '$id_tambah'");
        // mysqli_query($db, "SELECT sum(b.STOK - a.QUANTITY) FROM CART_ITEM a JOIN BARANG b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART_ITEM = '$id_tambah'");

            $query_tambah_stok = mysqli_query($db, "SELECT a.ID_BARANG, b.STOK, a.QUANTITY FROM CART_ITEM a JOIN BARANG b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART_ITEM = '$id_tambah'");
            $row_tambah_stok = mysqli_fetch_assoc($query_tambah_stok);
            $id_barang_tambah = $row_tambah_stok['ID_BARANG'];


        $total_tambah = ($row_tambah_stok['STOK'] - 1);
        
        echo $total_tambah;
        mysqli_query($db, "UPDATE BARANG SET STOK = '$total_tambah' WHERE ID_BARANG = '$id_barang_tambah'");
        
    }else if(isset($_POST['kurang'])){
        $query_id_cart = mysqli_query($db, "SELECT * FROM cart");
        $query_cek_id_cart = mysqli_fetch_assoc($query_id_cart);
        $id_cart = $query_cek_id_cart['ID_CART'];
        // $query_sum = mysqli_query($db, "SELECT SUM(a.HARGA) FROM BARANG a JOIN CART_ITEM b 
        // ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
        // $row_sum = mysqli_fetch_assoc($query_sum);
        // $row_id_cart = mysqli_fetch_assoc($query_id_cart);
        // $row_cek_id_item = mysqli_fetch_assoc($query_cek_id_item);
        
        $total = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(a.HARGA) FROM BARANG a JOIN CART_ITEM b 
        ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'"));
            $jumlah = 0;
        $jumlah_1 = mysqli_query($db, "SELECT * FROM BARANG a JOIN CART_ITEM b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
            while ($tabel = mysqli_fetch_assoc($jumlah_1)) {
                $data = $tabel['HARGA'];
                $jumlah = $jumlah+$data;
            }

        $id_kurang = $_GET['id_cart_item'];
        $query_kurang = mysqli_query($db, "SELECT * FROM CART_ITEM WHERE ID_CART_ITEM = '$id_kurang'");
        $row_kurang = mysqli_fetch_assoc($query_kurang);
        $hitung_kurang = $row_kurang['QUANTITY'];
        $hitung_kurang--;
        mysqli_query($db, "UPDATE CART_ITEM SET QUANTITY = '$hitung_kurang' WHERE ID_CART_ITEM = '$id_kurang'");
    }

    if(isset($_POST['tmbh_keranjang'])){
            // $id = $_GET['id_user'];
    $query_cek_id = mysqli_query($db, "SELECT * FROM CART");
    $query_cek_id_item = mysqli_query($db, "SELECT * FROM CART_ITEM");
    
    $query_id_cart = mysqli_query($db, "SELECT ID_CART FROM cart");
    $row_cek_id = mysqli_fetch_assoc($query_cek_id);
    $id_cart = $row_cek_id['ID_CART'];
    // $query_sum = mysqli_query($db, "SELECT SUM(a.HARGA) FROM BARANG a JOIN CART_ITEM b 
    // ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
    // $row_sum = mysqli_fetch_assoc($query_sum);
    $row_id_cart = mysqli_fetch_assoc($query_id_cart);
    $row_cek_id_item = mysqli_fetch_assoc($query_cek_id_item);
    
    $total = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(a.HARGA) FROM BARANG a JOIN CART_ITEM b 
    ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'"));
        $jumlah = 0;
    $jumlah_1 = mysqli_query($db, "SELECT * FROM BARANG a JOIN CART_ITEM b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id_cart'");
        while ($tabel = mysqli_fetch_assoc($jumlah_1)) {
            $data = $tabel['HARGA'];
            $jumlah = $jumlah+$data;
        }
    // echo $total;

    // if (isset($_POST['lanjutkan'])) {
    //     $banyak = $_POST['banyak']; 
    //     while($row = mysqli_fetch_assoc($query_join)) {
    //       $total = $row['HARGA'] * $row['banyak'];
    //       mysqli_query($db, "UPDATE CART SET `GRAND_TOTAL` = '$total' WHERE `cart`.`ID_CART` = '$id'");
    //     }
    //   }
    


        // echo "HASILNYA" . $jumlah;
        

    // $id_user = $_GET['id_user'];
    // Cek id cart


    var_dump($id_cart);
    $id = $_GET['id'];
    echo "<br>";
    echo " Ini ID = ".$id;
    $cek_id = $id;
    
    
        while($row = mysqli_fetch_assoc($query_cek_id_item) ){
            // var_dump($cek_id_barang);
            echo "<br>";
            $cek_id_barang = $row['ID_BARANG'];
                if ($cek_id_barang === $id){
                    break;
                }
                echo " ID_BARANG = " .$cek_id_barang;
            }
    
    echo "<br>";
    echo "<br>";

if(isset($_POST['tmbh_keranjang'])){
    $quantity = 1;
    if ($id != $cek_id_barang || $id == null) {
        mysqli_query($db, "INSERT INTO CART_ITEM VALUES('','$id_cart','$id','$quantity')");

        echo "ID_BARANG JADI = " .$cek_id_barang;
        echo "<br>";
        echo "ID JADI = " .$id;
        // var_dump($cek_id_barang);
        
        // var_dump($id);
            echo "<H5>Sukses Update</H5>";
            
    }else{
        echo "ID_BARANG JADI = " .$cek_id_barang;
        echo "<br>";
        echo "ID JADI = " .$id;
        // var_dump($cek_id_barang);
        
        // var_dump($id);
        
            $quantity++;
            mysqli_query($db, "UPDATE CART_ITEM SET QUANTITY = '$quantity' WHERE ID_BARANG = '$id'");
        
        
        echo "<H5>Gagal Update</H5>";
    }
}

    
    // var_dump($row['ID_CART_ITEM']);
    // if ($cek_id_barang != $id) {
    //     mysqli_query($db, "INSERT INTO CART_ITEM VALUES('','','$id','1')");
    //     echo "<H5>Sukses Update</H5>";
    // }
    // var_dump($_GET['id']);
    // $query = mysqli_fetch_assoc($db, "SELECT * FROM cart_item");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
    include "bootstrap.php";
?>
    <title>Document</title>
</head>
<body>

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
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <!-- <form action="cart_item.php" method="post"> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Product</th>
                                <th scope="col">Available</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <!-- <th></th> -->
                                <th scope="col">Aksi</th>
                                
                                
                                <th scope="col" class="text-right">Price</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                            

                        
                        // WHERE ID_CART = '$id'
                            $query = mysqli_query($db, "SELECT * FROM CART_ITEM a JOIN BARANG b ON b.ID_BARANG = a.ID_BARANG");
                            while ($row = mysqli_fetch_assoc($query)) : 
                            ?>
                            <tr>
                                <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                <td><?= $row['NAMA_BARANG']; ?></td>
                                <td><?= $row['STOK']; ?></td>
                                <td>
                                    <!-- <input class="form-control" type="text" name="banyak" id="banyak" /> -->
                                    <?= $row['QUANTITY'] ?>
                                </td>
                                <form action="cart-item.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>" method="post">
                                    <td>
                                        <a href="cart-item.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>">
                                            <button type="submit" class="btn btn-primary" name="tambah">+</button>
                                        </a>
                                        <a href="cart-item.php?id_cart_item=<?= $row['ID_CART_ITEM'] ?>">
                                            <button type="submit" class="btn btn-danger" name="kurang" style="margin-left: 10px;">-</button>
                                        </a>
                                    </td>
                                </form>
                                <!-- <td><input type="text" name="quantity"></td> -->
                                <td class="text-right">Rp.<?= $row['HARGA'] ?></td>
                                <!-- <td></td> -->
                                <td></td>
                            </tr>
                            <!-- <td class="text-right">
                                    <a href="delete-barang.php?id_cart_item=<?= $row['ID_BARANG'] ?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                                    </a>
                                </td> -->
                            
                            <?php 
                                
                            endwhile;
                            ?>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?= $jumlah ?></strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <form action="checkout.php?" method="post">
                        <div class="col-sm-12 col-m d-6 text-right">
                            <a href="checkout.php?id_cart=<?= $query_cek_id_cart['ID_CART'] ?>">
                                <button class="btn btn-lg btn-block btn-success text-uppercase"  type="submit" name="lanjutkan">Lanjutkan</button>
                            </a>
                        </div>
                    </form>
                <!-- </form> -->
            </div>
        </div>
        <!-- <div class="col mb-2">
            <div class="row">
                <!-- <div class="col-sm-12  col-md-6">
                    <a href="pilih.php"><button class="btn btn-block btn-light">Continue Shopping</button>
                </a>    
                </div> -->
                <!-- <div class="col-sm-12 col-md-6 text-right">
                    <a href="checkout.php?id_cart=<?= $row_id_cart['ID_CART'] ?>">
                        <button class="btn btn-lg btn-block btn-success text-uppercase"  type="button" name="lanjutkan">Lanjutkan</button>
                    </a>
                </div> -->
            </div>
        </div> -->
    </div>
</div>

</body>
</html>
