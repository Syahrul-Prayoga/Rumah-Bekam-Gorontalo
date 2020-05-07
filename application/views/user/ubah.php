  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ubah Data User</h1>
              </div>
              <?php foreach ($using as $using) {
              	?>
              <form action="<?= base_url('user/prosesUbahData') ?>" method="POST" class="user">
              	<input type="hidden" class="form-control form-control-user" id="id_user" name="id_user" placeholder="Nama Lengkap" value="<?= $using->id_user ?>" autocomplete="off">
              	<input type="hidden" class="form-control form-control-user" id="id_role" name="id_role" placeholder="Nama Lengkap" value="<?= $using->id_role ?>" autocomplete="off">
              	<input type="hidden" class="form-control form-control-user" id="is_aktiv" name="is_aktiv" placeholder="Nama Lengkap" value="<?= $using->is_aktiv ?>" autocomplete="off">

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="NamaLengkap" name="NamaLengkap" placeholder="Nama Lengkap" value="<?= $using->NamaLengkap ?>" autocomplete="off">
                  <?= form_error('NamaLengkap','<small class="text-danger pd-7">'),'</small>' ?>

                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= $using->username ?>"autocomplete="off">
                  <?= form_error('username','<small class="text-danger pd-7">'),'</small>' ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password Lama">
                    <?= form_error('password','<small class="text-danger pd-7">'),'</small>' ?>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru">
                    <?= form_error('password1','<small class="text-danger pd-7">'),'</small>' ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Akun
                </button>
              </form>
          <?php } ?>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url();?>user">Kembali!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>