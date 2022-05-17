<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?= link_tag('css/member.css') ?>
<?= link_tag('css/table.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>List of Members</h1>
                <div class="button">
                    <a href="<?= base_url('add-member') ?>" class="btn"> 🤵 New Member</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($members as $member) { ?>
                            <tr>
                                <td data-label="#"><?= $member['member_id']  ?></td>
                                <td data-label="Name"><?= $member['member_name']  ?></td>
                                <td data-label="E-Mail"><?= $member['member_email']  ?></td>
                                <td data-label="Mobile"><?= $member['member_mobile']  ?></td>
                                <td data-label="Actions" class="actions">
                                    <a href="<?= base_url('edit-member/' . $member['member_id']); ?>" class="btn btn-edit">📝</a>
                                    <a href="<?= base_url('delete-member/' . $member['member_id']); ?>" class="btn btn-delete">🚫</a>
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