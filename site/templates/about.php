<?php snippet('head') ?>
<?php snippet('navigation') ?>
<main class="content-container">
    <div id="about">
        <div class="about-text">
            <?= $page->info_text()->kirbytext() ?>
        </div>
        <div class="imprint-text">
            <div class="imprint-contact">
                <h2>Kontakt</h2>
                <?= $site->address()->kt() ?>
                <p>
                    <?= $site->mail() ?> <br>
                    <?= $site->tel()?> <br>
                    <?= $site->tel_mobile() ?>
                </p>
            </div>

            <?= $page->imprint()->kirbytext() ?>
        </div>

    </div>
</main>
<?php snippet('footer') ?>