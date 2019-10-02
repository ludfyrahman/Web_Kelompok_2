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
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo Input::postOrOr('email') ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
                            </div>

                            <button class="btn btn-blue btn-block">Login</button>

                            <div class="foot">
                                Jika anda belum punya akun, anda dapat <a href="<?php echo BASEURL ?>register/">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>