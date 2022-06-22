<?= $this->extend('company/company_layout') ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
  .edit-scholarsip {
    width: 600px;
    margin: 0 auto;
  }
  .edit-scholarsip-card{
    margin-top: -50px;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<main id="main" class="mb-5">
  <div class="header-image">
    <img src="<?= base_url() ?>/public/img/bg-balcony.jpg">
  </div>
  <div class="edit-scholarsip container">
    <div class="card edit-scholarsip-card">
      <div class="card-body p-5">
        <?php if(!empty(session('msg'))): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        
        <h3 class="font-weight-bolder mb-5">Form Edit Beasiswa</h3>

        <form id="edit-scholarship-form" action="<?= base_url() ?>/company/edit_scholarship/<?= $scholarship['id'] ?>" method="post" enctype="multipart/form-data" novalidate>
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="name">Nama Beasiswa</label>
            <input name="name" type="text" class="form-control" id="name" value="<?= $scholarship['name'] ?>" required>
            <div class="invalid-feedback">
              nama tidak boleh kosong
            </div>
          </div>

          <div class="form-group mb-3">
            <label for="uploadBrochure">Upload Brosur Baru</label>
            <input name="brochure" type="file" class="form-control-file" id="uploadBrochure">
          </div>

          <div class="mb-3">
            <label for="description">Deskripsi Beasiswa</label>
            <input name="description" type="text" class="form-control" id="description" value="<?= $scholarship['description'] ?>" required>
            <div class="invalid-feedback">
              deskripsi tidak boleh kosong
            </div>
          </div>

          <div class="mb-3">
            <label for="end_date">Tanggal Akhir Pendaftaran</label>
            <input name="end_date" type="text" class="form-control" placeholder="TTTT-BB-HH" 
              pattern="(?:19|20)(?:[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31))|(?:[13579][26]|[02468][048])-02-29)" 
              id="end_date" value="<?= $scholarship['end_date'] ?>" required>
            <div class="invalid-feedback">
              tanggal akhir pendaftaran tidak boleh kosong atau format salah
            </div>
          </div>

          <div class="mb-3">
            <label for="link">Link Beasiswa</label>
            <input name="link" type="text" class="form-control" id="link" value="<?= $scholarship['link'] ?>" required>
            <div class="invalid-feedback">
              link tidak boleh kosong
            </div>
          </div>

          <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Edit Beasiswa</button>
          
          <p>Kembali ke <a href="<?= base_url() ?>/company/my_scholarship">Halaman Beasiswa Saya</a></p>

          
        </form>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
  const ESForm = document.querySelector('#edit-scholarship-form');
  ESForm.addEventListener('submit', function(event) {
    if (this.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    this.classList.add('was-validated');
  }, false);
</script>
<?= $this->endSection() ?>
