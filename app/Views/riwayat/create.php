<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Riwayat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Riwayat</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('riwayat/store'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php 
                  $inputs = session()->getFlashdata('inputs');
                  $errors = session()->getFlashdata('errors');
                  if(!empty($errors)){ ?>
                  <div class="alert alert-danger" role="alert">
                    Whoops! Ada kesalahan saat input data, yaitu:
                    <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                  </div>
                  <?php } ?>

                  <input type="hidden" name="riwayatid" value="<?php echo $riwayatid; ?>">
                  <div class="form-group">
                      <label for="">Pasien Id</label>
                      <input type="text" class="form-control" name="pasienid" placeholder="Enter pasien id" value="<?php echo $inputs == null ? '' : $inputs['pasienid']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Diagnosa</label>
                      <input type="text" class="form-control" name="diagnosa" placeholder="Enter diagnosa" value="<?php echo $inputs == null ? '' : $inputs['diagnosa']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Tindakan</label>
                      <input type="text" class="form-control" name="tindakan" placeholder="Enter tindakan" value="<?php echo $inputs == null ? '' : $inputs['tindakan']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Obat</label>
                      <input type="text" class="form-control" name="obat" placeholder="Enter obat" value="<?php echo $inputs == null ? '' : $inputs['obat']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Status Pasien</label>
                      <select name="status" id="status" class="form-control">
                          <option <?php echo $inputs == null ? '' : ($inputs['status'] == "1" ? "selected" : ""); ?> value="1">Aktif</option>
                          <option <?php echo $inputs == null ? '' : ($inputs['status'] == "0" ? "selected" : ""); ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('riwayat'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>