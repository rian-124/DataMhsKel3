<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Jurusan</h3>
      
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>

            <form action="<?= BASEURL;?>/jurusan/cariJurusan" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari jurusan..." aria-label="Recipient's username" id="jurusan" name="jurusan">
                <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
            </form>


            <!-- Button trigger modal -->
        <div class="mt-4 mb-4">
            <button type="button" class="btn btn-primary TambahDataJurusan" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah data Jurusan
            </button>
        </div>

            <ul class="list-group">
                <?php foreach ($data['jrs'] as $jrs) : ?>
                <li class="list-group-item">
                    <?= $jrs['nama_jurusan']?>
                </li>
                <?php endforeach ?>
            </ul>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Jurusan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL;?>/jurusan/tambahJurusan" method="post">
            <div class="mb-3">
                <label for="nama_jurusan" class="mb-1">Jurusan</label>
                <input class="form-control mb-1" type="text" id="nama_jurusan" name="nama_jurusan" aria-label="default input example" required>
            </div>
      </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
    </div>
  </div>
</div>
