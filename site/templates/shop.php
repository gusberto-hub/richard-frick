<?php snippet('head') ?>
<?php snippet('navigation') ?>
<main class="content-container" id="shop">
    <div class="product-grid">
        <?php foreach($page->children()->listed() as $product): ?>
        <div class="product-cell">
            <a href="<?= $product->url() ?>">
                <div class="product-image aspect-ratio">
                    <?= $product->primaryImage()->toFile()?>
                </div>
                <div class="product-title">
                    <h2><?= $product->name()?></h2>
                    <?= $product->shortDescription()->kt()?>,
                    <?= number_format($product->price()->toFloat(),2) . ' CHF'?>
                </div>
            </a>
        </div>
        <?php endforeach ?>
    </div>
</main>

<?php snippet('footer') ?>