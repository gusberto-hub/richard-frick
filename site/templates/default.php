<?php snippet('head') ?>
<?php snippet('navigation') ?>
<main>
    <div id="start-screen">
        <?= $site->home_screen()->toFile()->thumb(['width' => 1200]) ?>
    </div>
</main>
<?php snippet('footer') ?>