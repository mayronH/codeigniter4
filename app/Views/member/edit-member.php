<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<?= link_tag('css/form.css') ?>
<?= link_tag('css/crud-page.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">Update Member: <?= $member["member_name"] ?></h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                if (isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php } ?>
                <form action="<?= base_url('edit-member/'. $member["member_id"]) ?>" method="post" id="form_user">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $member['member_name'] ?>" required placeholder="Name:">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $member['member_email'] ?>" required placeholder="E-mail:">
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="control-label">Mobile:</label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?= $member['member_mobile'] ?>" required placeholder="Mobile:">
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-submit"> 🤵 save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://unpkg.com/imask"></script>

<script>
    const mask = IMask(document.querySelector('#mobile'), {
        mask: '(00) 00000-0000'
    })
</script>

<?= $this->endSection("scripts") ?>