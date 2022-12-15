<div class="container">
    <div class="card my-4">
        <div class="card-header bg-primary text-white">Info Perjalanan</div>
        <div class="card-body d-flex flex-column gap-sm-4">
            <div class="form-group row ">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Kereta</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $info->nama_kereta ?>" readonly disabled>
                </div>
            </div>
            <div class="form-group row ">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Waktu Berangkat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $info->tgl_berangkat ?>" readonly disabled>
                </div>
            </div>
            <div class="form-group row ">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Waktu Tiba</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $info->tgl_sampai ?>" readonly disabled>
                </div>
            </div>
            <div class="form-group row ">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Rute</label>
                <div class="col-sm-5 d-flex align-items-center text-center">
                    <span class="form-control">Asal :  </span><input type="text" value="Dari <?= $info->ASAL?>" readonly disabled class="form-control">
                </div>
                <div class="col-sm-5 d-flex align-items-center text-center ">
                <span class="form-control">Tujuan : </span><input type="text" value="<?= $info->TUJUAN?>" readonly disabled class="form-control">  
                </div>
            </div>
            <div class="form-group row ">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Penumpang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm fw-bold" id="colFormLabelSm" value="<?= $_GET['p'] ?>" readonly disabled>
                </div>
            </div>
            <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga Per Tiket</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm fw-bold" id="colFormLabelSm" value="Rp.<?= number_format($info->harga, 0, ',', '.') ?>" readonly disabled>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <form action="<?= base_url('pesanTiket')?>" method="post">
        <div class="card">
            <div class="card-header bg-primary text-white">Detail Penumpang</div>
            <div class="card-body">
                <input type="hidden" name="penumpang" value="<?= $_GET['p'] ?>">
                <input type="hidden" name="id_jadwal" value="<?= $id_jadwal?>"  >
                <input type="hidden" name="harga" value="<?= $info->harga?>"  >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>>= 17 Tahun Nomor ID(KTP, SIM, PASPORT)*</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $_GET['p'] ; $i++):?>
                        <tr class="text-center">
                            <td><?= $i?></td>
                            <td>
                                <input type="text" name="nama<?= $i?>" id="" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="identitas<?= $i?>" id="" class="form-control">
                            </td>
                        </tr>
                        <?php endfor?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header bg-primary text-white">Detail Pemesan</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Email Pemesan" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No. Telp</label>
                            <input type="text" name="no_telp" placeholder="Nomor Telpon Pemesan" >
                        </div>
                    </div>
                    <div class="clear-fix"></div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="" class="my-2">Alamat</label>
                            <textarea name="alamat" id="" cols="20" rows="5" class="form-control" placeholder="Alamat Pemesan"></textarea>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse my-5">
                    <button class="btn btn-success w-25">Simpan dan Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>