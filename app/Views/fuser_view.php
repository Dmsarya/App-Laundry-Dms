<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    Form Input User
<?= $this->endSection() ?>


<?= $this->section('content')?>
    <div class="card" style="background: #1a2226; padding-top: 30px; font-family: 'Roboto',sans-serif;">
        <div class="card-header text-light fw-bold text-uppercase text-center">
            <h3>Form Input User</h3>
        </div>
        <form action="addUser" method="post">
            <div class="card-body text-uppercase text-center">
                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="nama">NAMA</label>
                    <input type="text" name="nama" id="nama" class="form-control form-control-sm fw-bold text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>

                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm fw-bold text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>

                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm fw-bold text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                </div>

                <div class="form-group fw-bold" style="color: #0db8de;">
                    <label for="hak_akses" class="form-label">Hak Akses</label>
                    
                    <select name="hak_akses" id="hak_akses" class="form-control form-control-sm text-light fw-bold" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">>
                        <option value="ADMIN" class="fw-bold text-light text-center">Admin</option>
                        <option value="KASIR" class="fw-bold text-light text-center">Kasir</option>
                    </select>
                </div>
            </div>

            <div class="card-footer mb-4">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-2">
                        <input type="submit" value="Simpan" class="btn text-light fw-bold form-control" style="background: #0db8de; border-radius: 50px;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-2">
                        <input type="reset" value="Cancel" class="btn btn-secondary text-light fw-bold form-control" style="border-radius: 50px;">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>  