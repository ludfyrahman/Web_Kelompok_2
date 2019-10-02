<div id="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel">
                    <div class="panel-heading"><?php echo $title ?></div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <?php Response::part('alert') ?>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama..." value="<?php echo Input::postOrOr('name', Account::Get('name')) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo Input::postOrOr('email', Account::Get('email')) ?>" required>
                            </div>

                            <button class="btn btn-blue btn-block">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>