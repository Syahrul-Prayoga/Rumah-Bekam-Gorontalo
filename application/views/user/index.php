  <div class="card shadow mb-4" style="z-index: 1;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User
        <a href="<?= base_url('user/tambahData');?>" class="btn btn-primary btn-sm float-right">
            + Tambah Data
        </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <?= $this->session->flashdata('tambah') ?>
        <?= $this->session->flashdata('hapus') ?>
        <?= $this->session->flashdata('ubah') ?>
        <table class="table table-border shadow" id="dataTable" width="100%" cellspacing="0">
          <thead>
    <!-- <thead class="thead-light"> -->
        <tr style="text-align: center">
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Id Role</th>
            <th scope="col">Aksi</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($using as $using) : ?>
            <tr style="text-align: center">
                <th scope="row"><?= $i; ?></th>
                <td><?= $using['NamaLengkap']; ?></td>
                <td><?= $using['username']; ?></td>
                <td><?= $using['password']; ?></td>
                <td><?= $using['id_role']; ?></td>
                <td>
                    <span title="Hapus" onclick="return confirm('Yakin akan dihapus?');"><?php echo anchor('user/hapus/'. $using['id_user'], ' <div class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash"></i></div> ');?>  
                    </span>
                </td>
                <td>
                    <span title="Edit"> <?php echo anchor('user/ubah_Data/'. $using['id_user'],'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>');?>
                    </span>
                </td>
            </tr>
        <?php $i++;
        endforeach ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</h6></div></div>