<div class="container-fluid" style="z-index: 99">
    <div class="card-header py-3">
        <a href="<?= base_url('barang'); ?>"><i class="fa fa-backspace mx-3 float-left my-0" title="Daftar Barang"></i></a>
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang

    </div>
    <hr>
    <br>

    <form action="<?= base_url(); ?>barang/prosesTambahData" method="POST" autocomplete="off">
        <div class="ml-10">

            <input type="hidden" name="id_pasien" id="id_pasien">

            <!-- <div class="form-group row">
                <label for="tugas" class="col-sm-2 col-form-table">Penanggung Jawab</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tugas" name="tugas" required value="<?= $user['NamaLengkap']  ?>">
                </div>
            </div> -->

            <div class="form-group row">
                <label for="nama_brg" class="col-sm-2 col-form-table my-2">Nama Barang</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="hrg_pokok" class="col-sm-2 col-form-table my-2">Harga Pokok</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="hrg_pokok" name="hrg_pokok" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="hrg_jual" class="col-sm-2 col-form-table my-2">Harga Jual</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="hrg_jual" name="hrg_jual" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_exp" class="col-sm-2 col-form-table my-2">Tanggal Exp.</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_exp" name="tgl_exp">
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-table my-2">Stok</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="stok" name="stok" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="ket" class="col-sm-2 col-form-table my-2">Keterangan</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="ket" name="ket">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-table my-2">Kategori</label>
                <div class="my-2">:</div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="kategori" name="kategori">
                </div>
            </div> -->


            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-table my-2">Kategori</label>
                <div class="my-2 mr-3">:</div>
                <select class="form-control col-sm-4" id="kategori" name="kategori" required value="Pilih">
                    <option value="Reseller">Reseller</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-table my-2"></label>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>

        </div>
    </form>

</div>