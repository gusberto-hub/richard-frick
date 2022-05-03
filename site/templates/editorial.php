<?php snippet('head') ?>
<?php snippet('navigation') ?>

<main class="content-container" id="<?= $page->template() ?>">

    <?php if($page->hasSlideshow()->toBool() === false): ?>

    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" swipeTitle="<?= $page->title() ?>">
                <iframe src="<?= $page->Editorial_url() ?>" width="100%" height="480" seamless="seamless" scrolling="no"
                    frameBorder="0" allowFullScreen></iframe>
            </div>

        </div>
        <div class="change-slide-btns">
            <div class="swipe-prev">
                <svg class="arrow-desktop" viewBox="0 0 30 60">
                    <polyline points="30,0 0,30 30,60" />
                </svg>
                <svg class="arrow-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.34 12.03">
                    <polygon class="cls-1"
                        points="7.5 10.71 6.02 12.03 0 6 6.02 0 7.48 1.28 3.52 5.06 17.34 5.06 17.34 6.97 3.52 6.97 7.5 10.71" />
                </svg>
            </div>
            <div class="swipe-next">
                <svg class="arrow-desktop" viewBox="0 0 30 60">
                    <polyline points="0,0 30,30 0,60" />
                </svg>
                <svg class="arrow-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.34 12.03">
                    <polygon class="cls-1"
                        points="0 6.97 0 5.06 13.82 5.06 9.86 1.28 11.32 0 17.34 6 11.32 12.03 9.84 10.71 13.82 6.97 0 6.97" />
                </svg>
            </div>
        </div>
    </div>

    <?php else: snippet('slideshow'); endif ?>
</main>
<?php snippet('footer') ?>