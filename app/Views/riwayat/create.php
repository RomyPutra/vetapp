<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Karyawan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Karyawan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('karyawan/store'); ?>" method="post">
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
                      <label for="">KTP</label>
                      <input type="text" class="form-control" name="no_ktp" placeholder="Enter Karyawan name" value="<?php echo $inputs == null ? '' : $inputs['no_ktp']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="nama_karyawan" placeholder="Enter Karyawan name" value="<?php echo $inputs == null ? '' : $inputs['nama_karyawan']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select name="jk" id="" class="form-control">
                          <option <?php echo $inputs == null ? '' : ($inputs['jk'] == "L" ? "selected" : ""); ?> value="L">Laki - Laki</option>
                          <option <?php echo $inputs == null ? '' : ($inputs['jk'] == "P" ? "selected" : ""); ?> value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Alamat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Enter Karyawan name" value="<?php echo $inputs == null ? '' : $inputs['alamat']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">No HP</label>
                      <input type="text" class="form-control" name="no_hp" placeholder="Enter Karyawan name" value="<?php echo $inputs == null ? '' : $inputs['no_hp']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Bulan Bergabung</label>
                      <select name="bln" id="" class="form-control">
                          <option value="">Pilih Bulan</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "01" ? "selected" : ""); ?> value="01">Januari</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "02" ? "selected" : ""); ?> value="02">Februari</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "03" ? "selected" : ""); ?> value="03">Maret</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "04" ? "selected" : ""); ?> value="04">April</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "05" ? "selected" : ""); ?> value="05">Mei</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "06" ? "selected" : ""); ?> value="06">Juni</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "07" ? "selected" : ""); ?> value="07">Juli</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "08" ? "selected" : ""); ?> value="08">Agustus</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "09" ? "selected" : ""); ?> value="09">September</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "10" ? "selected" : ""); ?> value="10">Oktober</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "11" ? "selected" : ""); ?> value="11">November</option>
                          <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[0] == "12" ? "selected" : ""); ?> value="12">Desember</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Tahun Bergabung</label>
                      <select name="thn" id="" class="form-control">
                          <option value="">Pilih Tahun</option>
                          <?php $y = date("Y"); for($i=2000;$i < $y;$i++) { ?>
                            <option <?php echo $inputs == null ? '' : (explode('-',$inputs['bln_thn_masuk'])[1] == $i ? "selected" : ""); ?> value="<?php echo $i;?>"><?php echo $i; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-outline-info">Back</a>
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