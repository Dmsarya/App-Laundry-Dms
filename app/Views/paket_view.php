<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    Paket
<?= $this->endSection() ?>

<?= $this->section('content')?>
        <div class="row">
            <div class="card" style="background: #1a2226;">
                <div class="card-header" style="background-color:#1a2226;">
                    <h3 class="fw-bold text-light text-center" style="padding-top: 23px;">PAKET
                    <a href="/fpaket" class="btn fw-bold mb-3" style="background: #1a2226; color: #0db8de; font-size: 30px;">+</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-secondary table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <?php
                            $no = 0;
                            foreach ($paket as $row) {
                                $data=$row['id'].",".$row['nama_paket'].",".$row['satuan'].",".$row['harga'].",".base_url('paket/edit/'.$row['id']);
                                # code...
                                $no++;
                            ?>
                                <tr class="text-center">
                                    <td><?=$no?></td>
                                    <td><?=$row['nama_paket']?></td>
                                    <td><?=$row['satuan']?></td>
                                    <td><?=$row['harga']?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#feditPaket" class="btn text-light fw-bold" style="background: #0db8de;" data-paket="<?=$data?>">Edit</a> 
                                        ||  
                                        <a href="/paket/delete/<?=$row['id']?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background: #FF1E00;">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }  
                            ?>
                        
                    </table>
                </div>
            </div>
        </div>

<div class="modal fade" id="feditPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #1a2226;">
                    <div class="modal-header">
                        <h5 class="modal-tittle fw-bold" style="color: #0db8de;" id="exampleModalLabel">EDIT DATA PAKET</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="" id="editpaket" method="post"> 
                        <div class="modal-body">

                            <div class="form-grup fw-bold" style="color: #0db8de;">
                                <label for="nama_paket">NAMA PAKET</label>
                                <input type="text" name="nama_paket" id="nama_paket" value="" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;"> 
                            </div>

                            <div class="form-grup fw-bold" style="color: #0db8de;">
                                <label for="satuan">SATUAN</label>
                                <input type="text" name="satuan" id="satuan" value="" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
                            </div>

                            <div class="form-grup fw-bold" style="color: #0db8de;">
                                <label for="harga">HARGA</label>
                                <input type="number" name="harga" id="harga" value="" class="form-control text-light" style="background: #1a2226; border: 2px solid #0db8de; border-radius: 10px; margin-bottom: 20px;" style="focus outline: none; border: none; background: #1a2226; margin: 0;">
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
            $("#feditPaket").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('paket');
                if (data!="")

                {
                    const barisdata= data.split(",");
                    $('#nama_paket').val(barisdata[1]);
                    $('#satuan').val(barisdata[2]);
                    $('#harga').val(barisdata[3]);
                    $('#editpaket').attr('action',barisdata[4]);
                }
            });
        });    
    </script>

<?= $this->endSection() ?>