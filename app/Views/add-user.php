<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" rel="stylesheet" />
<?= link_tag('css/form.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">New User</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="javascript:void(0)" method="post" id="form_user">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name:">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail:">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">Phone:</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone:">
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-submit"> 🧑 save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/imask"></script>

<script>
    const mask = IMask(document.querySelector('#phone'), {
        mask: '(00) 00000-0000'
    })
</script>

<?= script_tag('js/form.js') ?>

<?= $this->endSection("scripts") ?>