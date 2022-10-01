<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Halaman Laporan Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="card" style="background: #1a2226;">
            <div class="card-header" style="background: #1a2226;">
                <h3 class="fw-bold text-light text-center text-uppercase" style="padding-top: 23px;">Laporan Transaksi
                <a href="/transaksi" class="btn fw-bold mb-3" style="background: #1a2226; color: #0db8de; font-size: 30px;">+</a>
                </h3>
            </div>

            <div class="card-body">

                <div class="col-lg-6">
                    <form action="/laporan/filter" method="post" class="row" style="padding-bottom: 20px;">
                        <div class="col">
                            <select name="status" id="status" class="form-control">
                                <option value="">Semua</option>
                                <option value="0">Belum Diambil</option>
                                <option value="1">Sudah Diambil</option>
                            </select>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>

                <table class="table table-secondary table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Ambil</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 0;
                    foreach ($trans as $row) { 
                        
                        $no++;
                    ?>
                        <tr class="text-center">
                            <td><?=$no?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['tanggal_masuk']?></td>
                            <td><?=$row['tanggal_ambil']?></td>

                            <td>
                                <?php
                                    if ($row['status']==0)
                                    {
                                        ?>
                                        <a href="/transaksi/ambil/<?=$row['id']?>" class="btn btn-info">Belum Diambil</a>
                                        <?php
                                    }

                                    else
                                    {
                                        ?>
                                        <span>Sudah Diambil</span>
                                        <?php
                                    }
                                ?>
                            </td>

                            <td>
                                <a href="#" data="<?= $row['id']?>" data-bs-toggle="modal" data-bs-target="#detailTran" class="btn btn-warning details">Detail</a>
                                ||
                                <a href="<?= base_url('laporan/hapus/' . $row['id']) ?>" onclick="return confirm('Yakin Mau Hapus Data ?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>  
                    <?php    
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="modal fade" id="detailTran" tab-index="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Detail Transaksi</h5>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-bordered table-striped text-center pt-3"  id="data-detail"></table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <?php if (!empty(session()->getFlashdata("message"))):?>
        <div class="alert text-light fw-bold text-center text-uppercase" style="background: #0db8de;">
            <?= session()->getFlashdata("message")?>
        </div>
    <?php endif ?>

<?php if (!empty(session()->getFlashdata("sukses"))):?>
    <div class="alert text-light fw-bold text-center text-uppercase" style="background: red;">
        <?= session()->getFlashdata("sukses")?>
    </div>
<?php endif ?>


<?= $this->endSection() ?>

<?= $this->section('script')?>
    <script>
        $(document).ready(function() {
            $('.details').click(function() {
                // alert('res');
                var id = $(this).attr('data');

                $.ajax({
                    url: '/transaksi/detail/' + id,

                    success: function(res) {
                        $('#data-detail').html(res);
                        // alert(res);
                    },

                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                })
            });
        });
    </script>
<?= $this->endSection() ?>