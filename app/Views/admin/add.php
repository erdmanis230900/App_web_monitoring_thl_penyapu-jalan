<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah data</h1>




    <div class="col-lg">


        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class=" card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                        </div>

                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form class="user" action="<?= url_to('register') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.register') ?></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->
</div>
</div>
</div>
</div>
<?= $this->endSection(); ?>