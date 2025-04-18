<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data mahasiswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Ubah</li>
            </ol>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="ml-auto">
                                <h4>Ubah Data mahasiswa</h4>
                            </div>
                            <div class="ml-auto"><a class="btn btn-primary" href="<?= base_url('mhs/showdata_mahasiswa'); ?>">
                                    <i class="fas fa-chevron-left"></i> Kembali </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">NRP</label>
                                <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $mhs['nrp']; ?>">
                                <small class="form-text text-danger"><?= form_error('nrp'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $mhs['nama_mhs']; ?>">
                                <small class="form-text text-danger"><?= form_error('nama_mhs'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_smt">Semester</label>
                                <select class="form-control" id="nama_smt" name="nama_smt">
                                    <option value="" disabled>Pilih Semester</option>
                                    <?php foreach ($smt as $s) : ?>
                                        <option value="<?= $s['id_smt']; ?>"><?= $s['nama_smt']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('nama_smt'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_kls">Kelas</label>
                                <select class="form-control" id="nama_kls" name="nama_kls">
                                    <option value="" disabled>Pilih Kelas</option>
                                    <?php foreach ($kls as $k) : ?>
                                        <option value="<?= $k['id_kls']; ?>"><?= $k['nama_kls']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('nama_kls'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_sesi">Sesi</label>
                                <select class="form-control" id="nama_sesi" name="nama_sesi">
                                    <option value="" disabled>Pilih Semester</option>
                                    <?php foreach ($sesi as $i) : ?>
                                        <option value="<?= $i['id_sesi']; ?>"><?= $i['nama_sesi']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('nama_sesi'); ?></small>
                            </div>
                            <?php date_default_timezone_set("Asia/Jakarta"); ?>
                            <input hidden type="text" name="tmp" id="tmp" value="<?= date("d-m-Y H:i:s"); ?>">
                            <button type="submit" class="btn btn-primary cl">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>