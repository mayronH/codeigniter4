<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?= link_tag('css/crud-page.css') ?>
<?= link_tag('css/student.css') ?>
<?= link_tag('css/table.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>List of Student</h1>
                <div class="button">
                    <a href="<?= base_url('add-student') ?>" class="btn"> 👨‍🎓 New Student</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Profile Pic</th>
                        <th>Name</th>
                        <th>CPF</th>
                        <th>E-Mail</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td data-label="#"><?= $student['student_id']  ?></td>
                                <td data-label="Profile Pic"><img src="<?= base_url().$student['student_image'] ?>" class="student-image"></td>
                                <td data-label="Name"><?= $student['student_name']  ?></td>
                                <td data-label="CPF"><?= $student['student_cpf']  ?></td>
                                <td data-label="E-Mail"><?= $student['student_email']  ?></td>
                                <td data-label="Actions" class="actions">
                                    <a href="<?= base_url('edit-student/' . $student['student_id']); ?>" class="btn btn-edit">📝</a>
                                    <a href="<?= base_url('delete-student/' . $student['student_id']); ?>" class="btn btn-delete">🚫</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>

<script>
    <?php
    if (session()->has('success')) { ?>
        message = {
            'type': 'success',
            'title': 'Member',
            'body': '<?= session('success') ?>'
        };
        displayMessage(message);
    <?php } ?>
</script>

<?= $this->endSection("scripts") ?>