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
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
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
            <a class="nav-link " aria-current="page" href="<?= base_url('/confirm')?>">Konfrimasi Pembayaran</a>
            </li>

        </ul>
        </div>
    </div>
    </nav>

<!-- <h1>admin dashboard</h1> -->

<div class="container-fluid my-4">
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-dark text-white">Edit Stasiun</div>
            <div class="card-body">
                <form action="<?= base_url('editStation')?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Stasiun</label>
                        <input type="hidden" name="id" value="<?= $data_stasiun->id?>">
                        <input type="text" name="nama_stasiun" id="" class="form-control" value="<?= $data_stasiun->nama_stasiun ?>">
                        <input type="submit" value="Edit Stasiun" class="btn btn-warning mt-4">
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

