<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/bs/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <title><?= $title?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">iKereta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="<?= base_url('/')?>">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="<?= base_url('/admin/dashboard/kelola-jadwal')?>">Kelola Jadwal</a>
            </li>

        </ul>
        </div>
    </div>
    </nav>

<!-- <h1>admin dashboard</h1> -->

<div class="container-fluid my-4">
<div class="row">
    <div class="col-md-9">
        <div class="card-header bg-primary text-white">Daftar Stasiun</div>
        <div class="card-body">
            <table class="table table-condensed table-hover">
                <thead>
                   <tr>
                        <th>No</th>
                        <th>Nama Stasiun</th>
                        <th class="text-center">Aksi</th>
                   </tr>
                </thead>
                <tbody>
                    <?php $no= 1?>
                    <?php foreach($stasiun as $st) :
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $st->nama_stasiun ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="<?= base_url('admin/dashboard/edit/' . $st->id)?>"  class="btn btn-warning text-decoration-none">Update</a>
                            <a href="<?= base_url('hapusStasiun/')  . $st->id ?>" class="btn btn-danger text-decoration-none" >Hapus</a>
                        </td>
                        <td></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Tambah Stasiun</div>
            <div class="card-body">
                <form action="<?=base_url('tambahStasiun') ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Stasiun</label>
                        <input type="text" class="form-control" name="nama_stasiun" placeholder="Nama Stasiun">
                        <input type="submit" class="btn btn-success my-2" value="Tambah Stasiun">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col">
<a href="<?= base_url('logout')?>" class="btn btn-danger w-25 mt-5 ">Logout</a>
</div>
</div>
<script src="<?= base_url('assets/bs/bootstrap.bundle.min.js')?>"></script>
</body>
</html>

