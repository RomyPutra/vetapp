<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Pasien</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('pasien/store'); ?>" method="post">
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

                  <div class="form-group">
                      <label for="">Id Pasien</label>
                      <input type="text" class="form-control" name="pasienid" placeholder="Enter pasien id" value="<?php echo $inputs == null ? '' : $inputs['pasienid']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="pasienname" placeholder="Enter pasien name" value="<?php echo $inputs == null ? '' : $inputs['pasienname']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select name="gender" id="gender" class="form-control">
                          <option <?php echo $inputs == null ? '' : ($inputs['gender'] == "L" ? "selected" : ""); ?> value="L">Jantan</option>
                          <option <?php echo $inputs == null ? '' : ($inputs['gender'] == "P" ? "selected" : ""); ?> value="P">Betina</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Umur</label>
                      <input type="text" class="form-control" name="age" placeholder="Enter umur pasien" value="<?php echo $inputs == null ? '' : $inputs['age']; ?>">
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
                    <a href="<?php echo base_url('pasien'); ?>" class="btn btn-outline-info">Back</a>
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