<div class="col-lg-2 col-md-2" style="background: #1a2226; margin-top: 20px;">
    <div class="card" style="background: #0db8de;">
        <div class="card-header text-center fw-bold text-uppercase" style="background:#0db8de; color: #1a2226;;">
          Menu
          <?=session('hak_akses')?>
        </div>

        <div class="list-group">
          <?php
            if (session('hak_akses') == 'KASIR') {
              ?>
                <a href="/transaksi" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Transaksi</a>         
                <a href="/laporan" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Laporan</a>
             <?php
            }

            else
            {
              ?>
                <a href="/pelanggan" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Pelanggan</a>
                <a href="/paket" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Paket</a>
                <a href="/user" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Petugas</a>
                <a href="/transaksi" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Transaksi</a>
                <a href="/laporan" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Laporan</a>
              <?php
            }
          ?>
          

          <?php
            if (session('loged_in')) {
              ?>
              <a href="/logout" class="list-group-item list-group-item-action list-group-item fw-bold text-uppercase text-center" style="background: #222d32; color: red;">LogOut</a>
              <?php
            }
          ?>
        </div>

    </div>
</div>
    
    
    <!-- <div class="list-group">
      <a href="/" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Home
      </a>
      <a href="/pelanggan" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Pelanggan</a>
      <a href="/paket" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Paket</a>
      <a href="/user" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Petugas</a>
      <a href="/transaksi" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Transaksi</a>
      <a href="/laporan" class="list-group-item list-group-item-action list-group-item fw-bold text-light text-uppercase text-center" style="background: #222d32;">Laporan</a>

      // ?php if (!empty(session()->get("username"))):?>
        <a href="/logout" class="list-group-item list-group-item-action list-group-item fw-bold text-uppercase text-center" style="background: #222d32; color: red;">LogOut</a>
      // ?php endif ?>  
    </div> -->