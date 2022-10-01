<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    Form Input Paket
<?= $this->endSection() ?>

<?= $this->section('content')?>
    <div class="card" style="background: #1a2226; padding-top: 30px; font-family: 'Roboto',sans-serif;">
        <div class="card-header text-light fw-bold text-uppercase text-center">
            <h3>Form Input Paket</h3>
        </div>
        <form action="addPaket" method="post">
            <div class="card-body text-uppercase text-center">
                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" name="nama_paket" id="nama_paket" class="form-control form-control-sm text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>

                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="form-control form-control-sm text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>

                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control form-control-sm text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>
            </div>

            <div class="card-footer mb-4">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-2">
                        <input type="submit" value="Simpan" class="btn text-light fw-bold form-control" style="background: #0db8de; box-shadow: 3px 3px 3px #0db8de; border-radius: 50px;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 pt-2">
                        <input type="reset" value="Cancel" class="btn btn-secondary text-light fw-bold form-control" style="border-radius: 50px;">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>