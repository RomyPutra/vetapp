<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Pasien</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('pasien/update'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php 
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

                  <input type="hidden" name="pasienid" value="<?php echo $pasien['PasienId']; ?>">
                  <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="pasienname" placeholder="Enter pasien name" value="<?php echo $pasien == null ? '' : $pasien['PasienName']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select name="gender" id="gender" class="form-control">
                          <option <?php echo $pasien == null ? '' : ($pasien['Gender'] == "L" ? "selected" : ""); ?> value="L">Laki - Laki</option>
                          <option <?php echo $pasien == null ? '' : ($pasien['Gender'] == "P" ? "selected" : ""); ?> value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Umur</label>
                      <input type="text" class="form-control" name="age" placeholder="Enter umur pasien" value="<?php echo $pasien == null ? '' : $pasien['Age']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Status Pasien</label>
                      <select name="status" id="status" class="form-control">
                          <option <?php echo $pasien == null ? '' : ($pasien['Status'] == "1" ? "selected" : ""); ?> value="1">Aktif</option>
                          <option <?php echo $pasien == null ? '' : ($pasien['Status'] == "0" ? "selected" : ""); ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('pasien'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>