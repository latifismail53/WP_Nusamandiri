<?php include 'config.php' ?>
<?php $no = 1;
$join = mysqli_query($con, "SELECT b.*,t.subtotal,t.diskon,t.total FROM barang as b INNER JOIN transaksi as t ON t.jumlah_barang = b.jumlah") ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>
        <?= $title ?>
    </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-center">
                        <h4>UJIAN HER NUSA MANDIRI</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title p-3">Masukan Data barang</h5>
                        <div class="container">
                            <div class="row">
                                <form action="proses.php" method="post">
                                    <div class="mb-3 form-floating">
                                        <input type="text" name="kodebarang" id="namabarang" placeholder="namabarang"
                                            class="form-control">
                                        <label for="">Kode barang</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="text" name="namabarang" id="namabarang" placeholder="namabarang"
                                            class="form-control">
                                        <label for="">Nama barang</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="number" name="jumlahbarang" id="namabarang"
                                            placeholder="namabarang" class="form-control">
                                        <label for="">Jumlah barang</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <?php $sql = mysqli_query($con, "SELECT * FROM kategori"); ?>
                                        <select name="katbar" id="" class="form-select">
                                            <?php while ($data = mysqli_fetch_array($sql)) : ?>
                                            <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <label for="">Kategori barang</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="number" name="hargabarang" id="namabarang" placeholder="namabarang"
                                            class="form-control">
                                        <label for="">Harga barang</label>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Checkout" name="check">
                                    <input type="reset" class="btn btn-danger" value="Batal" name="check">
                                </form>
                            </div>
                            <div class="row mt-5">
                                <table class="table table-striped table-border">
                                    <thead class="table-dark">
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>total</th>
                                        <th>Diskon</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($join)) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['kd_barang'] ?></td>
                                            <td><?= $row['namabarang'] ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td><?= number_format($row['harga']) ?></td>
                                            <td><?= number_format($row['subtotal']) ?></td>
                                            <td><?= number_format($row['diskon']) ?></td>
                                            <td><?= number_format($row['total']) ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>














    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>