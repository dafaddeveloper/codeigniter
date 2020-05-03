<div class="content-wrapper">	
	<section class="content-header">
      <h1>
        Data Servis Masuk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Servis Masuk</li>
      </ol>
    </section>

    <section class="content">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Servis Masuk</button>

      <a class="btn btn-danger" href=" <?php echo base_url('c_service/print') ?>"><i class="fa fa-print"></i> Print</a>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          
        <tr>
          <th>NO</th>
          <th>Tanggal Masuk</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th>Nama Barang</th>
          <th>Jenis Kerusakan</th>
          <th>Keterangan</th>
          <th coolspan="3">Aksi</th>
        </tr>

        </thead>
        <tbody>
          
        <?php 

        $no = 1;
        foreach ($terimaservis as $ts) : {
          # code...
        }
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $ts->tgl_terima ?></td>
          <td><?php echo $ts->nama ?></td>
          <td><?php echo $ts->alamat ?></td>
          <td><?php echo $ts->telp ?></td>
          <td><?php echo $ts->barang ?></td>
          <td><?php echo $ts->rusak ?></td>
          <td><?php echo $ts->ket_masuk ?></td>
          <td onclick="javascript: return confirm('Apakah Anda Yakin akan Menghapus?')"><?php echo anchor('c_service/hapus/'.$ts->id_masuk,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
          <td><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>
          <td>

            <div class="btn btn-primary btn-sm <?php if($ts->status==1): ?>hide <?php endif;?>" data-toggle="modal"  data-target="#ambilModal<?php echo $ts->id_masuk ?>">Ambil Service</div>
          </td>
        </tr>
      <?php endforeach; ?>
        </tbody>

      </table>
    </section>

<!-- Modal -->
<?php foreach ($terimaservis as $ts) : ?>
<div class="modal fade" id="ambilModal<?php echo $ts->id_masuk ?>" tabindex="-1" role="dialog" aria-labelledby="ambilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="ambilModalLabel">Ambil Service</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'c_service/terima_aksi'; ?>">
       <label>Tanggal:</label>
          <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            <input type="text" name="tgl_keluar" class="form-control pull-right datepicker" value="<?=date("Y-m-d")?>">
          </div> 
        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="id_masuk" value="<?php echo $ts->id_masuk ?>" class="form-control">
            <input type="text" name="nama" value="<?php echo $ts->nama ?>" readonly class="form-control">
        </div><div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="ket" value="" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Total Biaya</label>
            <input type="text" name="total" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Servis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'c_service/tambah_aksi'; ?>">
          <div class="form-group">
                <label>Tanggal:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_terima" class="form-control pull-right datepicker" id="datepicker" required value="<?=date("Y-m-d")?>">
                </div>
                <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="telp" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="barang" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Jenis Kerusakan</label>
            <input type="text" name="rusak" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="ket_masuk" class="form-control" required>
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
      </div>
    </div>
  </div>
</div>

</div>