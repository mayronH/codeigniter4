<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<?= link_tag('css/calendar.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">My Calendar</h1>
    </div>

    <div class="row">
        <div id="calendar"></div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<?= script_tag('js/calendar.js') ?>

<?= $this->endSection("scripts") ?>