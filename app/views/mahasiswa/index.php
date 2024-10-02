<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
      
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>

            <form action="<?= BASEURL;?>/mahasiswa/cari" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari nama mahasiswa..." aria-label="Recipient's username" id="keyword" name="keyword">
                <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
            </form>

            

            <!-- Button trigger modal -->
        <div class="mt-4 mb-4">
            <button type="button" class="btn btn-primary tambahDataMahasiswa" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah data mahasiswa
            </button>
        </div>

        <p>Test jenskins</p>

            <ul class="list-group">
                <?php foreach ($data ['mhs'] as $mhs) :?>
                <li class="list-group-item">
                    <?= $mhs ['nama'];?>
                    <div class="d-flex justify-content-end align-items-center">
                    <a href="" class="btn btn-danger text-white me-2" onclick="confirmDelete(<?= $mhs ['id'];?>, event)">Delete</a>
                    <a href="" class="btn btn-success text-white me-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $mhs['id'];?>">Ubah</a>
                    <a href="<?= BASEURL;?>/mahasiswa/detail/<?= $mhs['id'];?>" class="btn btn-primary text-white me-2">Detail</a>
                    </div>
                </li>
                <?php endforeach; ?>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
        <form action="<?= BASEURL;?>/jurusan/tambahJurusan" method="post">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label for="username" class="mb-1">Username</label>
                    <input class="form-control mb-1" type="text" id= "username" name="nama" aria-label="default input example">
                <label for="nim" class="mb-1">Nim</label>
                    <input class="form-control" type="text" id= "nim" name="nim" aria-label="default input example">
                <label for="email" class="form-label mt-1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                    <?php foreach ($data['jrs'] as $jrs) : ?>
                    <option value="<?= $jrs ['nama_jurusan']?>"><?= $jrs ['nama_jurusan']?></option>
                    <?php endforeach; ?>
                </select>
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
