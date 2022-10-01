<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    Pelanggan
<?= $this->endSection() ?>

<?= $this->section('content')?>
        <div class="row" >
            <div class="card" style="background: #1a2226;">
                <div class="card-header" style="background-color: #1a2226;">
                    <h3 class="fw-bold text-light text-center" style="padding-top: 23px;">PELANGGAN
                    <a href="/fpelanggan" class="btn fw-bold mb-3" style="background: #1a2226; color: #0db8de; font-size: 30px;">+</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-secondary table-striped ">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <?php
                            $no = 0;
                            foreach ($pelanggan as $row) {
                                $data=$row['id'].",".$row['nama'].",".$row['alamat'].",".$row['no_hp'].",".base_url('pelanggan/edit/'.$row['id']);
                                # code...
                                $no++;
                            ?>
                                <tr class="text-center">
                                    <td><?=$no?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['alamat']?></td>
                                    <td><?=$row['no_hp']?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#feditPelanggan" class="btn text-light fw-bold" style="background: #0db8de;" data-pelanggan="<?=$data?>">Edit</a> 
                                        ||  
                                        <a href="/pelanggan/delete/<?=$row['id']?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background: #FF1E00;">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }  
                            ?>
                        
                    </table>
                </div>
            </div>
        </div>

	  <div class="modal fade" id="feditPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #1a2226;">
                    <div class="modal-header">
                        <h5 class="modal-tittle fw-bold" style="color: #0db8de;" id="exampleModalLabel" >EDIT DATA PELANGGAN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="" id="editPelanggan" method="post"> 
                        <div class="modal-body">
                            
                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="nama">NAMA</label>
                                <input type="text" name="nama" id="nama" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>
                            
                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" name="alamat" id="alamat" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>

                            <div class="form-group fw-bold" style="color: #0db8de;">
                                <label for="no_hp">NO HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                            
                            <button type="submit" class="btn text-light fw-bold" style="background: #0db8de;">Save Changes</button>
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
            $("#feditPelanggan").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('pelanggan');
                if (data!="")

                {
                    const barisdata= data.split(",");
                    $('#nama').val(barisdata[1]);
                    $('#alamat').val(barisdata[2]);
                    $('#no_hp').val(barisdata[3]);
                    $('#editPelanggan').attr('action',barisdata[4]);
                }
            });
        });    
    </script>

<?= $this->endSection() ?>z