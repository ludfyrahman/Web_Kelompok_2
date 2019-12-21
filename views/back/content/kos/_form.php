<div class="page-content-wrapper-inner">
    <?php App::breadcrumb()?>
    <div class="content-viewport">
        <!-- <form method="post" action="#" enctype="multipart/form-data"> -->
            <div class="row">
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Tambah Kos</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="form-group">
                                    <label for="inputEmail1">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?=Input::postOrOr('nama', $data['nama'])?>" placeholder="Masukkan nama kos">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Jumlah Kamar</label>
                                    <input type="number" min="1" id="jumlah_kamar" name="jumlah_kamar" class="form-control" value="<?=Input::postOrOr('jumlah_kamar', $data['jumlah_kamar'])?>"  placeholder="Masukkan jumlah kamar kos">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Jenis Kos</label>
                                    <select class="custom-select" name="jenis_kos" id="jenis_kos">
                                    <option value=' '>Pilih Kos</option>
                                    <?php
                                    $jen = Input::postOrOr('jenis_kos', $data['jenis_kos']);
                                    ?>
                                        <option <?=($jen == '1' ? 'selected' : '')?> value='1'>Laki laki</option>
                                        <option <?=($jen == '2' ? 'selected' : '')?> value='2'>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Harga</label>
                                    <input type="number" min="1" name="harga" id="harga" class="form-control" value="<?=Input::postOrOr('harga', $data['harga'])?>" placeholder="Masukkan harga kos">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Deskripsi</label>
                                    <textarea name="deskripsi" id="ckedtor deskripsi" name="deskripsi" class=" ckeditor form-control" cols="30" rows="10"><?=Input::postOrOr('deskripsi', $data['deskripsi'])?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Kategori</label>
                                    <select class="custom-select" name="kategori" id="kategori">
                                    <option value=' '>Pilih Kategori</option>
                                    <?php
                                    $kat = Input::postOrOr('kategori', $data['id_kategori']);
                                    foreach($kategori as $k){
                                    ?>
                                        <option <?=($k['id'] == $kat ? 'selected' : '')?> value='<?= $k['id'] ?>'><?= $k['nama'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Fasilitas</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row">
                                    <?php 
                                        foreach ($subfas as $sf) {
                                    ?>
                                    <div class="form-group col-md-6">
                                        <label><input type="checkbox" name="fasilitas[]" value="<?= $sf['id_fasilitas'] ?>"> <?= $sf['nama'] ?></label>
                                        <div class="container">
                                            <?php 
                                                foreach ($sf['sub'] as $sub) {
                                            ?>
                                                <input type="checkbox" name="sub_fasilitas[]" value="<?= $sub['id'] ?>"> <?= $sub['nama'] ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <p class="grid-header">Foto / Video</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="alert alert-warning"><b>Perhatian</b>. unggah file dengan type png, jpg, dan jpeg untuk video dengan type mp4 dengan ukuran maksimal 4MB</div>
                                <div class="dropzone dropzone-previews">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="grid-header">Lokasi Kos</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="alert alert-info"><b>Info</b>. pilih lokasi kos anda</div>
                                <div id="map">
                                                        
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="equal-grid">
                <button type="submit" class="simpan btn btn-sm btn-primary pull-right"><?=$type?></button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>