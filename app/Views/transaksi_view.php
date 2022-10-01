<?= $this->extend('layouts/admin') ?>
<?=$this->section('title') ?>
 Halaman Transaksi
<?=$this->endSection() ?>

<?= $this->section('content')?>
<div class="container" style="padding-top: 20px;">
    <div class="row"> 
        <div class="col-md-4 mb-5" >
            <div class="card">
                <div class="card-header bg-info text-center fw-bold">
                    INPUT DATA
                </div>
                <div class="card-body">
                    <form action="addCart" method="post">
                        <div class="form-group text-center text-uppercase fw-bold">
                            <label for="paket" class="mb-1">Paket</label>
                            <select name="paket" id="paket" class="form-control text-center">
                                <option value="">- Pilih Paket -</option>
                                <?php
                                    foreach ($paket as $key => $value) {
                                        ?>
                                        <option value="<?=$value['id']?>"><?=$value['nama_paket']?></option>
                                        <?php
                                        # code...
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group text-center text-uppercase fw-bold ">
                            <label for="jumlah" class="mt-2 mb-1">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control">
                        </div>
                        <br>
                        <div class="form-group text-center text-uppercase fw-bold mt-1">
                            <input type="submit" value="Masukkan Keranjang" class="btn form-control fw-bold text-uppercase text-light" style="background: #0db8de;">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header text-center text-uppercase fw-bold bg-info">
                    Data Pesanan
                </div>

                <div class="card-body text-center">
                    <table class="table table-border table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($trans!=null) 
                            {
                                $no=0;
                                foreach ($trans as $value) {
                                    $no++;
                                    # code...
                                ?>
                            
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$value['nama_paket']?></td>
                                    <td><?=$value['harga']?></td>
                                    <td><?=$value['jumlah']?></td>
                                    <td><?=$value['jumlah']*$value['harga']?></td>

                                    <td>
                                        <a href="/transaksi/hapus/<?=$value['id']?>" class="btn text-light fw-bold" style="background: red;">Hapus</a>
                                    </td>
                                </tr>

                                

                                <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="6">
                                    <form action="psimpan" method="post">
                                        <div class="form-group">
                                            <label for="pelanggan" class="mt-2 mb-1 fw-bold text-uppercase">Nama Pelanggan</label>
                                            <select name="pelanggan" id="pelanggan" class="form-control">
                                                <option value="">Pilih Pelanggan</option>

                                                <?php
                                                    foreach ($pelanggan as $key => $value) {
                                                        ?>
                                                            <option value="<?= $value ['id']?>"><?= $value ['nama']?>></option>
                                                        <?php
                                                        #code...
                                                    }
                                                ?>
                                            </select>

                                            <div class="form-group">
                                                <label for="tanggal_masuk" class="mt-2 mb-1 fw-bold text-uppercase">Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggal_ambil" class="mt-2 mb-1 fw-bold text-uppercase">Tanggal Ambil</label>
                                                <input type="date" name="tanggal_ambil" id="tanggal_ambil" class="form-control">
                                            </div>
                                            <br>
                                            <input type="submit" value="Simpan" class="btn form-control fw-bold text-uppercase text-light" style="background: #0db8de;">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if (!empty(session()->getFlashdata("sukses"))):?>
            <div class="alert alert-success">
                <?= session()->getFlashdata("sukses")?>
            </div>
        <?php endif ?>    
        
    </div>
</div>
<?=$this->endSection()?>
<?= $this->section('script')?>
<?= $this->endSection()?>