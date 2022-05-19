<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<?= link_tag('css/form.css') ?>
<?= link_tag('css/crud-page.css') ?>
<?= link_tag('css/student.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">Update Student: <?= $student["student_name"] ?></h1>
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
                <form action="<?= base_url('edit-student/' . $student["student_id"]) ?>" method="post" id="form_student" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $student['student_name'] ?>" required placeholder="Name:">
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="control-label">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $student['student_cpf'] ?>" required placeholder="CPF:">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $student['student_email'] ?>" required placeholder="E-mail:">
                    </div>

                    <div class="form-group">
                        <label for="image">Profile Pic</label>
                        <img src="<?= base_url($student['student_image']) ?>" alt="preview" id="preview" class="preview" />
                        <input type="file" accept="image/*" class="form-control" name="image" id="image" onchange="previewImage(event)">
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
    const mask = IMask(document.querySelector('#cpf'), {
        mask: '000.000.000-00'
    })

    const previewImage = e => {
        const preview = document.querySelector('#preview');
        preview.classList.remove('hidden');
        preview.src = URL.createObjectURL(e.target.files[0]);
        preview.onload = () => URL.revokeObjectURL(preview.src)
    }
</script>

<?= $this->endSection("scripts") ?>