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

    <pre>
        <?= $data_edit->nama_kereta?>
    </pre>
    <pre>
        <?= $data_edit->tgl_sampai?>
    </pre>


    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-header bg-dark text-white ">Form Tambah Jadwal</div>
                    <div class="card-body">
                        <form action="<?= base_url('editJadwal') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data_edit->id?>">
                            <div class="form-group">
                                <label for="">Nama Kereta</label>
                                <input type="text" class="form-control" name="nama_kereta" placeholder="Nama Kereta" value="<?= $data_edit->nama_kereta?>">
                            </div>
                            <div class="form-group">
                                <label for="" >Stasiun Asal</label>
                                <select name="asal" id="" class="form-control">
                                    <optgroup label="Terpilih">
                                        <option value="<?= $data_edit->asal ?>" selected>
                                            <?= $data_edit->ASAL?>
                                        </option>
                                    </optgroup>
                                    <hr>
                                    <?php foreach($stasiun as $st): ?>
                                    <option value="<?= $st->id?>"><?= $st->nama_stasiun?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" >Stasiun Tujuan</label>
                                <select name="tujuan" id="" class="form-control">
                                    <optgroup label="Terpilih">
                                        <option value="<?= $data_edit->tujuan ?>" selected>
                                            <?= $data_edit->TUJUAN?>
                                        </option>
                                    </optgroup>
                                    <hr>
                                    <?php foreach($stasiun as $st): ?>
                                    <option value="<?= $st->id?>"><?= $st->nama_stasiun?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>                           
                            <div class="form-group">
                                <label for="" >Tanggal Berangkat</label>
                                <?php $date = date_create($data_edit->tgl_berangkat)?>
                                <input type="datetime-local" name="tgl_berangkat" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" class="form-control">
                            </div>                            
                            <div class="form-group">
                                <label for="" >Tanggal Sampai</label>
                                <?php $date = date_create($data_edit->tgl_sampai)?>
                                <input type="datetime-local" name="tgl_sampai" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" class="form-control">
                            </div>                            
                            
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas" id="" class="form-control">
                                    <optgroup label="Terpilih">
                                        <option value="<?= $data_edit->kelas?>" selected>
                                            <?= $data_edit->kelas?>
                                        </option>
                                    </optgroup>
                                    <option value="ekonomi">EKONOMI</option>
                                    <option value="bisnis">BISNIS</option>
                                    <option value="eksekutif">EKSEKUTIF</option>
                                </select>
                            </div>
                            <input type="submit" value="Update Jadwal" class="btn btn-success my-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url('assets/bs/bootstrap.bundle.min.js')?>"></script>
</body>
</html>

