<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?= link_tag('css/member.css') ?>

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
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($people as $person) { ?>
                            <tr>
                                <td><?= $person->person_id  ?></td>
                                <td><?= $person->firstName  ?></td>
                                <td><?= $person->lastName  ?></td>
                                <td><?= $person->email  ?></td>
                                <td><?= $person->created_at  ?></td>
                                <td><?= $person->updated_at  ?></td>
                                <td class="actions">
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