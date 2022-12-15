    <section class="jumbotron ">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-8 jumbo-head">
                        <h1>Selamat Datang di iKereta</h1>
                        <p>Anda dapat melakukan pemesanan tiket dengan mudah</p>
                    </div>
                <div class="col-md-4">
                    <form action="<?= base_url('cariTiket')?>" method="post">
                        <div class="form-group">
                            <label>Stasiun Asal</label>
                            <select class="form-control" name="asal" value="<?= set_value("asal")?>">
                                <?php foreach($stasiun as $st) : ?>
                                <option value="<?=$st->id ?>"><?= $st->nama_stasiun?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Stasiun Tujuan</label>
                            <select class="form-control" name="tujuan">
                                 <?php foreach($stasiun as $st) : ?>
                                    <option value="<?=$st->id ?>"><?= $st->nama_stasiun?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="date" name="tanggal" id="" class="form-control" value="<?=set_value("tanggal") ?>" min="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penumpang</label>
                            <select class="form-control" name="jumlah">
                                <?php for($i = 1;$i <=5; $i++) :?>
                                <option value="<?= $i ?>"><?= $i?> Penumpang</option>
                                <?php endfor?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-dark w-100 mt-2" value="Cari Tiket">
                    </form>
                </div>
            </div>
        </div>
    </section>
<section class="container">
        <?php if(!isset($tiket)):?>
        <?php else: ?>
        <table class="table table-hover table-bordered">
            <thead class="bg-primary text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Kereta</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Sampai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if($tiket < 1):?>
                    <p>Maaf tiket tidak tersedia</p>
                <?php endif ?>
                <?php $no = 1?>
                <?php foreach ($tiket as $tk) : ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $tk->nama_kereta?></td>
                    <td><?= $tk->tgl_berangkat?></td>
                    <td><?= $tk->tgl_sampai?></td>
                    <td>
                        <a href="<?= base_url('pesan/' . $tk->id . '?p=' . $penumpang)?>" class="btn btn-success">Pesan</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php endif?>
    </section>
 
