<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    User
<?= $this->endSection() ?>

<?= $this->section('content')?>
        <div class="row">
            <div class="card" style="background: #1a2226;">
                <div class="card-header" style="background-color:#1a2226;">
                <h3 class="fw-bold text-light text-center" style="padding-top: 23px;">USER
                    <a href="/fuser" class="btn fw-bold mb-3" style="background: #1a2226; color: #0db8de; font-size: 30px;">+</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-secondary table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <?php
                            $no = 0;
                            foreach ($user as $row) {
                                $data=$row['id'].",".$row['nama'].",".$row['username'].",".$row['password'].",".$row['hak_akses'].",".base_url('user/edit/'.$row['id']);
                                # code...
                                $no++;
                            ?>
                                <tr class="text-center"> 
                                    <td><?=$no?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['hak_akses']?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#fedituser" class="btn text-light fw-bold" style="background: #0db8de;" data-user="<?=$data?>">Edit</a> 
                                        ||   
                                        <a href="/user/delete/<?=$row['id']?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background: #FF1E00;">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }  
                            ?>
                        
                    </table>
                </div>
            </div>
        </div>

<div class="modal fade" id="fedituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #1a2226;">
                    <div class="modal-header">
                        <h5 class="modal-tittle fw-bold" style="color: #0db8de;" id="exampleModalLabel">EDIT DATA USER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="" id="edituser" method="post"> 
                        <div class="modal-body">
                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" value="" class="form-control  text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>

                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>

                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" value="" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
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
            </div>
        </div>
             
        <?php if (!empty(session()->getFlashdata("message"))):?>
            <div class="alert text-light fw-bold text-center text-uppercase" style="background: #0db8de; font-family: 'Roboto',sans-serif;">
                <?= session()->getFlashdata("message")?>
            </div>
        <?php endif ?>   

<?= $this->endSection() ?> 

<?= $this->section('script')?>

    <script>
        $(document).ready(function(){
            $("#fedituser").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('user');
                if (data!="")
                // alert("asa");
                // alert(data);

                {
                    const barisdata= data.split(",");
                    $('#nama').val(barisdata[1]);
                    $('#username').val(barisdata[2]);
                    $('#password').val(barisdata[3]);
                    $('#hak_akses').val(barisdata[4]).change();
                    $('#edituser').attr('action',barisdata[5]);
                }
            });
        });    
        
    </script>

<?= $this->endSection() ?>