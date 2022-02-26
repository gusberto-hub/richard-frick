<header>
    <div class="nav-container">
        <!-- <div class="nav-bg">
        </div> -->
        <div class="nav-header">
            <a class="logo" href="/"><?= $site->title() ?></a>
            <button>Menu</button>
        </div>
        <nav class="">
            <ul id="menu" class="menu-lv1">
                <?php foreach($pages->listed() as $menu_lv1): ?>
                <?php if($menu_lv1 == 'Shop'): ?>
                <li class="menu-item-lv1"><a class="<?php e($menu_lv1->isOpen(), 'nav-current') ?>"
                        href="<?= $menu_lv1->url() ?>"><?= $menu_lv1->title() ?></a>
                </li>
                <?php else: ?>
                <li class="menu-item-lv1">
                    <a class="<?php e($menu_lv1->isOpen(), 'nav-current') ?> submenu-handler"
                        href="#"><?= $menu_lv1->title() ?></a>

                    <?php if($menu_lv1->hasChildren()): ?>
                    <ul class="menu-lv2">
                        <?php foreach($menu_lv1->children()->listed() as $menu_lv2): ?>
                        <li class="menu-item-lv2">
                            <a href="<?= $menu_lv2->url()?>" class="<?php e($menu_lv2->isOpen(), 'nav-current') ?>">
                                <?= $menu_lv2->title() ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </li>
                <?php endif ?>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>
    <div class="contact">
        <div class="contact-address">
            <?= $site->address()->kt() ?>
        </div>
        <div class="contact-social">
            <a href="mailto:<?= $site->mail()?>"><?= $site->mail()?></a>
            <a href="tel:<?= $site->tel()?>"><?= $site->tel()?></a>
            <a href="tel:<?= $site->tel_mobile()?>"><?= $site->tel_mobile()?></a>
        </div>
    </div>
    <?php if(page('Shop')->isOpen()): ?>
    <div class="cart-button">
        <button class="snipcart-checkout cart-btn">Warenkorb (<span class="snipcart-items-count">0</span>)
        </button>
    </div>
    <?php endif ?>
</header>