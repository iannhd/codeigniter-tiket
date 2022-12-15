<?php if($this->session->flashdata('nomor') ===null): ?>
    <div class="container-fluid">
    <div class="row justify-content-center my-2">
        <div class="col-md-5">
            <div class="alert alert-danger text-center">
                <h4>PERINGATAN!<br> ANDA TELAH MELAKUKAN REFRESH  PADA HALAMAN INI! </h4>
                <p>Silahkan Lakukan Pemesanan Kembali Jika Belum Mendapat Kode Pembayaran</p>
            </div>
        </div>
    </div>
<?php else: ?>
<div class="container-fluid">
    <div class="row justify-content-center my-2">
        <div class="col-md-5">
            <div class="alert alert-danger text-center">
                <h4>PERINGATAN!<br> JANGAN REFRESH HALAMAN INI! </h4>
                <p>Untuk menghindari kegagalan sistem</p>
            </div>
            <div class="card">
                <div class="card-body ">
                    <h1 class="text-success text-center">Selamat!</h1>
                    <h2 class="text-center">Anda Berhasil Melakukan Pemesanan Tiket</h2>
                    <hr>
                    <h5 class="text-center text-danger">Silahkan Lakukan Pembayaran Sesuai Detail Berikut</h5>
                    <h3 class="text-center">A091230980123</h3>
                    <p class="text-center font-weight-bold mb-0">a/n PT. Kereta Api Indonesia</p>
                    <p class="text-center">BNI SYARIAH Kode Bank: 002</p>
                    <h5 class="text-center">Total Yang Harus Dibayar</h5>
                    <h2 class="text-center"><?= $this->session->flashdata('total') ?></h2>
                    <h5 class="text-center">Kode Pembayaran Anda</h5>
                    <h2 class="text-center"><?= $this->session->flashdata('nomor') ?></h2>
                    <br><br><br>
                    <p class="text-center">Jika Sudah Transfer Lakukan Konfirmasi Pembayaran Pada Link <a href="<?= base_url('confirm')?>">Konfirmasi Pembayaran</a></p>
                    <h4 class="text-center">Terima Kasih</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif ?>