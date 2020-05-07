<div class="card shadow mb-4" style="z-index: 1;">
    <div class="card-header py-3">

        <h5 class="m-0 font-weight-bold text-primary"><i class="<?= $icon; ?> m-0 font-weight-bold text-primary mr-2"></i><?= $judul; ?>
            <a href="<?= base_url('barang/tambahData'); ?>" class="btn btn-primary btn-sm float-right">
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
                        <th scope="col">Nama Barang
                        <th scope="col">Harga Pokok</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Tanggal Exp.</th>
                        <th scope="col">Stok</th>
                        <!-- <th scope="col">Keterangan</th> -->
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($barang as $brg) : ?>
                        <tr style="text-align: center">
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $brg['nama_brg']; ?></td>
                            <td><?= $brg['hrg_pokok']; ?></td>
                            <td><?= $brg['hrg_jual']; ?></td>
                            <td><?= $brg['tgl_exp']; ?></td>
                            <td><?= $brg['stok']; ?></td>
                            <!-- <td><?= $brg['ket']; ?></td> -->
                            <td><?= $brg['kategori']; ?></td>
                            <td>
                                <b title="Hapus" onclick="return confirm('Yakin akan dihapus?');"><?php echo anchor('barang/hapus/' . $brg['id_brg'], ' <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div> '); ?>
                                </b>
                                <b title="Edit"> <?php echo anchor('barang/ubahData/' . $brg['id_brg'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>'); ?>
                                </b>
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

</div>
</div>