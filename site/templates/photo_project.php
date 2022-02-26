<?php snippet('head') ?>
<?php snippet('navigation') ?>

<main class="content-container" id="<?= $page->template() ?>">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <!-- <div class="swiper-slide" swipeTitle="Introduction">
                <div class="swiper-text">
                    <h1>
                        <?= $page->intro_text_heading()?>

                    </h1>
                    <?= $page->intro_text_body()->kt()?>
                </div>
            </div> -->
            <?php foreach($page->files() as $image): ?>
            <div class="swiper-slide"
                swipeTitle="<?= e($image->caption()->isEmpty(), $image->name(),$image->caption() )  ?>">

                <?php if ($image->isFirst()): ?>
                <div class="swiper-text">
                    <div>
                        <h1><?= $page->intro_text_heading()?></h1>
                        <?= $page->intro_text_body()->kt()?>
                    </div>
                </div>

                <?php endif ?>
                <div
                    class="swiper-image <?= e($image->panorama()->isTrue(), 'panorama')?> <?= e($image->isPortrait(), 'portrait')?>">
                    <?= $image->thumb( ['width'=>1000 ]) ?>
                </div>
            </div>
            <?php endforeach ?>
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

    <div class="swiper-footer">
        <div></div>
        <div class="swipe-info">
            <div class="swiper-name">
                <p>Introduction</p>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</main>
<?php snippet('footer') ?>