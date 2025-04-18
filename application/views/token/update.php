<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Token</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active text-primary"><?= $bc . " / " . $title ?> / Ubah</li>
            </ol>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="ml-auto">
                                <h4>Ubah token</h4>
                            </div>
                            <div class="ml-auto"><a class="btn btn-primary" href="<?= base_url('token/showdata_token'); ?>">
                                    <i class="fas fa-chevron-left"></i> Kembali </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <tokenel for="nama_token">token</tokenel>
                                <input class="form-control" type="text" name="nama_token" id="nama_token" value="<?= $token['nama_token']; ?>">
                                <small class="form-text text-danger"><?= form_error('nama_token'); ?></small>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="form-control" type="date" name="tanggal" style="height: 50px;" value="<?= $token['tanggal'] ?>">
                                <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                            </div>
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input class="form-control" type="time" name="mulai" style="height: 50px;" value="<?= $token['mulai'] ?>">
                                <small class="form-text text-danger"><?= form_error('mulai'); ?></small>
                            </div>
                            <div class="form-group">
                                <label>Waktu Akhir</label>
                                <input class="form-control" type="time" name="akhir" style="height: 50px;" value="<?= $token['akhir'] ?>">
                                <small class="form-text text-danger"><?= form_error('akhir'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" type="text" name="status" id="status">
                                <option disabled value="">Pilih Status</option>
                                    <option value="aktif" <?= $token['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="nonaktif" <?= $token['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                                </select>
                                <small class="form-text text-danger"><?= form_error('status'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>