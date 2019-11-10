<div class="page-content-wrapper-inner">
    <div class="viewport-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb has-arrow">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Kos</li>
        </ol>
    </nav>
    </div>
    <div class="content-viewport">
    <div class="row">
        <div class="col-lg-6 equel-grid">
            <div class="grid">
                <p class="grid-header">Tambah Kos</p>
                <div class="grid-body">
                    <div class="item-wrapper">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?=Input::postOrOr('nama', $data['nama'])?>" placeholder="Masukkan nama kos">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?=Input::postOrOr('harga', $data['harga'])?>" id="inputPassword1" placeholder="Masukkan harga kos">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1">Deskripsi</label>
                                <textarea name="deskripsi" name="deskripsi" class="form-control" id="" cols="30" rows="10"><?=Input::postOrOr('deskripsi', $data['deskripsi'])?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1">Kategori</label>
                                <select class="custom-select" name="kategori">
                                <?php
                                $kat = Input::postOrOr('kategori', $data['id_kategori']);
                                foreach($kategori as $k){
                                ?>
                                    <option <?=($k['id'] == $kat ? 'selected' : '')?> value='<?= $k['id'] ?>'><?= $k['nama'] ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary"><?=$type?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 equel-grid">
            <div class="grid">
                <p class="grid-header">Foto/Video</p>
                <div class="grid-body">
                    <div class="item-wrapper">
                    <form action="file-upload.php" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    </div>
</div>