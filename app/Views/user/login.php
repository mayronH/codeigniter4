<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?= link_tag('css/form.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">Login</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="<?= base_url('login') ?>" method="post" id="form_login">
                    <div class="form-group">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail:">
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password:">
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-submit"> 🔓 login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>

<script>
    <?php
    if (session()->has('error')) { ?>
        message = {
            'type': 'error',
            'title': 'Login',
            'body': "<?= session('error') ?>"
        };
        displayMessage(message);
    <?php } ?>
</script>

<?= $this->endSection("scripts") ?>