<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Obat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Obat</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('obat/store'); ?>" method="post">
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
                      <label for="">Id Obat</label>
                      <input type="text" class="form-control" name="obatid" placeholder="Enter ObatId" value="<?php echo $inputs == null ? '' : $inputs['obatid']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="obatname" placeholder="Enter Obat name" value="<?php echo $inputs == null ? '' : $inputs['obatname']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Obat</label>
                      <select name="jo" id="jo" class="form-control">
                          <option <?php echo $inputs == null ? '' : ($inputs['jo'] == "L" ? "selected" : ""); ?> value="L">Luar</option>
                          <option <?php echo $inputs == null ? '' : ($inputs['jo'] == "D" ? "selected" : ""); ?> value="D">Dalam</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Kandungan</label>
                      <input type="text" class="form-control" name="kandungan" placeholder="Enter kandungan obat" value="<?php echo $inputs == null ? '' : $inputs['kandungan']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Status Obat</label>
                      <select name="so" id="so" class="form-control">
                          <option <?php echo $inputs == null ? '' : ($inputs['so'] == "1" ? "selected" : ""); ?> value="1">Aktif</option>
                          <option <?php echo $inputs == null ? '' : ($inputs['so'] == "0" ? "selected" : ""); ?> value="0">Tidak Aktif</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('obat'); ?>" class="btn btn-outline-info">Back</a>
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