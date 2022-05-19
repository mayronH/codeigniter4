<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?= link_tag('css/crud-page.css') ?>
<?= link_tag('css/table.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>List of People</h1>
                <div class="button">
                    <a href="<?= base_url('add-person') ?>" class="btn"> 🧙‍♂️ New Person</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-Mail</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($people as $person) { ?>
                            <tr>
                                <td data-label="#"><?= $person->person_id  ?></td>
                                <td data-label="First Name"><?= $person->firstName  ?></td>
                                <td data-label="Last Name"><?= $person->lastName  ?></td>
                                <td data-label="E-Mail"><?= $person->email  ?></td>
                                <td data-label="Created At"><?= $person->created_at  ?></td>
                                <td data-label="Updated At"><?= $person->updated_at  ?></td>
                                <td data-label="Actions" class="actions">
                                    <!-- <a href="<?= base_url('edit-member/' . $person->person_id); ?>" class="btn btn-edit">📝</a> -->
                                    <a href="<?= base_url('person/' . $person->person_id); ?>" class="btn btn-view"> 🔍 </a>
                                    <a href="<?= base_url('delete-person/' . $person->person_id); ?>" class="btn btn-delete">🚫</a>
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