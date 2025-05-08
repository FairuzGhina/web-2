<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="col-4" style="float: right;">
            <div class="card">
                <div class="card-header bg-primary text-white">Daftar Harga</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">TV : 4.200.000</li>
                    <li class="list-group-item bg-light">Kulkas : 3.100.000</li>
                    <li class="list-group-item bg-light">Mesin Cuci : 3.800.000</li>
                </ul>
            </div>
            <div class="card-footer bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>
        </div>

        <div class="col-8">
            <div class="header">
                <header class="border-bottom">
                    <h3>Belanja Online</h3>
                </header>
            </div>
            <div class="col-8 align-middle">
                <form method="POST" action="form_belanja.php">
                    <div class="form-group row text-end mt-3">
                        <label for="nama" class="col-4 col-form-label">Customer</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="produk" class="col-4 text-end">Pilih Produk</label>
                        <div class="col-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk1" type="radio" class="custom-control-input" value="Televisi" required>
                                <label for="produk1" class="custom-control-label">TV</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk2" type="radio" class="custom-control-input" value="Kulkas" required>
                                <label for="produk2" class="custom-control-label">Kulkas</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk3" type="radio" class="custom-control-input" value="Mesin Cuci" required>
                                <label for="produk3" class="custom-control-label">Mesin Cuci</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row text-end mt-3">
                        <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
                        <div class="col-4">
                            <input id="jumlah" name="jumlah" type="number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="proses" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr />

        <?php
        // MENANGKAP DATA YANG DI-INPUT
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer = isset($_POST['customer']) ? $_POST['customer'] : "";
            $produk = isset($_POST['produk']) ? $_POST['produk'] : "";
            $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : 0;

            // Daftar harga produk
            $harga_tv = 4200000;
            $harga_kulkas = 3100000;
            $harga_mesin_cuci = 3800000;

            // MENGHITUNG TOTAL BELANJA MENGGUNAKAN IF ELSE ATAU SWITCH
            switch ($produk) {
                case "TV":
                    $total_harga = $jumlah * $harga_tv;
                    break;
                case "Kulkas":
                    $total_harga = $jumlah * $harga_kulkas;
                    break;
                case "Mesin Cuci":
                    $total_harga = $jumlah * $harga_mesin_cuci;
                    break;
                default:
                    echo "Produk tidak valid!";
                    exit;
            }

            // MENCETAK HASIL
            echo "<h3>Hasil Transaksi</h3>";
            echo "<p>Customer: $customer</p>";
            echo "<p>Produk: $produk</p>";
            echo "<p>Jumlah: $jumlah</p>";
            echo "<p>Total Harga: Rp " . number_format($total_harga, 0, ',', '.') . "</p>";
        }
        ?>

    </div>
</body>

</html>