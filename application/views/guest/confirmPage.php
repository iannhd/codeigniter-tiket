<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-5">
        <?php if($this->session->flashdata('pesan') !== null) :?>
            <div class="alert alert-success">
                <?= $_SESSION['pesan'] ?>
            </div>
        <?php endif?>
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                Konfirmasi Pembayaran
            </div>
            <div class="card-body">
                <form action="<?= base_url('confirmCheck')?>" method="post">
                    <div class="form-group py-3">
                        <label for="" class="mb-2">Kode Booking</label>
                        <input type="text" name="kode" id="" placeholder="Kode Booking" class="form-control">
                    </div>

                    <button class="bg-dark text-white">
                        Cek Kode Booking
                    </button>
                </form>
            </div>
        </div>
        <hr>
        <?php if(isset($_GET['kode'])):?>
        <div class="card ">
            <div class="card-header bg-dark text-white">Detail Pembayaran Anda</div>
                <div class="card-body">
                    <h1 class="text-center">
                        <?php if($no_tiket->status === '0'): ?>
                            <i class="fa fa-times text-danger" aria-hidden="true"></i> Belum Dibayar
                        <?php else : ?>
                            <i class="fa fa-check text-success"></i> Sudah Dibayar
                        <?php endif; ?>
                    </h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Identitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail as $dt):?>
                                <tr>
                                    <td><?= $dt->nama ?></td>
                                    <td><?= $dt->no_identitas ?></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                        <div class="text-center">
                        <p><b>Total Pembayaran Anda : Rp <?= number_format($no_tiket->total_pembayaran, 0, ',', '.') ?></b></p>

                        <?php if($no_tiket->status === '0'): ?>
                        <p class="text-danger"><b>Silahkan Kirim Bukti Pembayaran Anda Pada Kolom di Bawah</b></p>
                        </div>
                        <?php echo form_open_multipart('pictureCheck') ?>
                        <input type="file" name="gambar" class="form-control" id="">
                        <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>" class="form-control" id="">
                        <img class="img-fluid" id="img_gerbong" src="<?= base_url('assets/gerbong/gerbong1.png') ?>" alt="">
                        <select class="form-control" name="gerbong" id="select_gerbong" onchange="cekGerbong()">
                            <option value="" disabled selected>=== PILIH GERBONG ===</option>
                            <option value="1">GERBONG 1</option>
                            <option value="2">GERBONG 2</option>
                            <option value="3">GERBONG 3</option>
                        </select>
                        <select class="form-control" name="bagian" id="bagian" onchange="cekBagian()">
                            <option value="" disabled selected>=== PILIH BARIS ===</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                        <select class="form-control" name="kursi" id="bagian_a">
                            <?php for($i = 1; $i <= 29; $i++):?>
                                <option value=""><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                        <select class="form-control" name="kursi" id="bagian_b">
                            <?php for($i = 1; $i <= 29; $i++):?>
                                <option value=""><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                        <div>
                        <button type="submit" class="btn btn-success w-100 mt-3">Unggah Bukti Pembayaran</button>
                        </div>
                        <?php echo form_close()?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>