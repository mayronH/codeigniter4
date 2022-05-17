<?= $this->extend("layout/master") ?>

<?= $this->section("styles") ?>

<?= link_tag('css/person.css') ?>

<?= $this->endSection("styles") ?>

<?= $this->section("content") ?>

<section class="container">
    <div class="row justify-content-center">
        <h1 class="title">Person View</h1>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="person">
                <!-- Virtual Property -->
                <h2><?= $person->fullName() ?></h2>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quas odit incidunt deleniti unde, facilis magnam sed, molestiae minima maiores sapiente aperiam voluptatum corrupti recusandae esse suscipit praesentium ipsum quisquam?</p>

                <div class="contact">
                    <h3>Contact</h3>
                    <p><?= $person->email ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>