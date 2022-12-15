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
            <a class="nav-link " aria-current="page" href="<?= base_url('admin/dashboard/kelola-jadwal')?>">Kelola Jadwal</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="<?= base_url('admin/dashboard/')?>">Dashboard</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<!-- <h1>admin dashboard</h1> -->

    <div class="container mt-5">
        <div class="row gx-2">
            <div class="col-sm-8">
                <div class="card border-secondary">
                    <div class="card-header bg-dark text-white">Daftar Jadwal</div>
                    <div class="card-body">
                        <table class="table table-condensed table-hover table-responsive table-sm">
                            <thead>
                                <tr class="align-items-center text-center fs-6">
                                    <th>No</th>
                                    <th>Nama Kereta</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Sampai</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                <?php $no = 1?>
                                    <?php foreach ($jadwal as $jd): ?> 
                                    <td class="d-flex align-items-center"><?= $no++?></td>
                                    <td><?= $jd->nama_kereta ?></td>
                                    <td><?= $jd->ASAL ?></td>
                                    <td><?= $jd->TUJUAN ?></td>
                                    <td><?= $jd->tgl_berangkat ?></td>
                                    <td><?= $jd->tgl_sampai ?></td>
                                    <td><?= $jd->kelas ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/dashboard/edit-jadwal/' . $jd->id)?>" class="btn btn-warning mx-1">Edit</a>
                                        <a href="<?= base_url('admin/dashboard/hapus-jadwal/' . $jd->id)?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-secondary">
                    <div class="card-header bg-dark text-white ">Form Tambah Jadwal</div>
                    <div class="card-body">
                        <form action="<?= base_url('tambahJadwal') ?>" method="post">
                            <div class="form-group">
                                <label for="">Nama Kereta</label>
                                <input type="text" class="form-control" name="nama_kereta" placeholder="Nama Kereta">
                            </div>
                            <div class="form-group">
                                <label for="" >Stasiun Asal</label>
                                <select name="asal" id="" class="form-control">
                                    <?php foreach($stasiun as $st): ?>
                                    <option value="<?= $st->id?>"><?= $st->nama_stasiun?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" >Stasiun Tujuan</label>
                                <select name="tujuan" id="" class="form-control">
                                    <?php foreach($stasiun as $st): ?>
                                    <option value="<?= $st->id ?>"><?= $st->nama_stasiun?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label for="" >Tanggal Berangkat</label>
                                <input type="datetime-local" name="tgl_berangkat" value="<?= date('Y-m-d\TH:i')?>" class="form-control">
                            </div>                            
                            <div class="form-group">
                                <label for="" >Tanggal Sampai</label>
                                <input type="datetime-local" name="tgl_sampai" value="<?= date('Y-m-d\TH:i')?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas" id="" class="form-control">
                                    <option value="EKONOMI">EKONOMI</option>
                                    <option value="BISNIS">BISNIS</option>
                                    <option value="EKSEKUTIF">EKSEKUTIF</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" id="" placeholder="Masukkan harga" class="form-control">
                            </div>
                            <input type="submit" value="Tambah Jadwal" class="btn btn-success my-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url('assets/bs/bootstrap.bundle.min.js')?>"></script>
</body>
</html>

