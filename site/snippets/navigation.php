<header>
    <div class="nav-container">
        <!-- <div class="nav-bg">
        </div> -->
        <div class="nav-header">
            <a class="logo" href="/"><?= $site->title() ?></a>
            <button>Menu</button>
        </div>
        <nav>
            <ul id="menu" class="menu menu-lv1">
                <?php foreach($pages->listed() as $menu_lv1): ?>
                <?php if($menu_lv1 == ('Shop') or $menu_lv1 == ('Sammlung')): ?>
                <li>
                    <a class="<?php e($menu_lv1->isOpen(), 'nav-current') ?> submenu-handler menu-item-lv1"><?= $menu_lv1->title() ?>
                    </a>
                    <ul class="menu-inactive menu-lv2">
                        <li>
                            <a class="nav-current">In Bearbeitung</a>
                        </li>
                    </ul>
                </li>

                <?php else: ?>
                <li class="<?php e($menu_lv1->isOpen(), 'nav-current open-menu') ?>">
                    <a class="<?php e($menu_lv1->isOpen(), 'nav-current') ?> submenu-handler menu-item-lv1"
                        href="#"><?= $menu_lv1->title() ?></a>

                    <?php 
                    $children_count = $menu_lv1->children()->count();
                    if($menu_lv1->hasChildren()): 
                    ?>
                    <ul class="menu-lv2 <?php e($children_count > 4, 'menu-col-2') ?>">
                        <?php foreach($menu_lv1->children()->listed() as $menu_lv2): ?>
                        <li class="<?php e($menu_lv2->isOpen(), 'nav-current open-menu') ?>">

                            <?php if($menu_lv2->hasChildren()): ?>
                            <a class="<?php e($menu_lv2->isOpen(), 'nav-current') ?> submenu-handler menu-item-lv2">
                                <?= $menu_lv2->title() ?></a>

                            <ul class="menu-lv3">
                                <?php foreach($menu_lv2->children()->listed() as $editorial): ?>
                                <li>
                                    <a href="<?= $editorial->url()?>"
                                        class="<?php e($editorial->isOpen(), 'nav-current')  ?> ">
                                        <?= $editorial->title() ?>
                                    </a>
                                </li>
                                <?php endforeach ?>
                            </ul>

                            <?php else: ?>
                            <a href="<?= $menu_lv2->url()?>" class="<?php e($menu_lv2->isOpen(), 'nav-current') ?>">
                                <?= $menu_lv2->title() ?></a>
                            <?php endif ?>
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
    <!-- <div class="contact">
        <div class="contact-address">
            <?= $site->address()->kt() ?>
        </div>
        <div class="contact-social">
            <a href="mailto:<?= $site->mail()?>"><?= $site->mail()?></a>
            <a href="tel:<?= $site->tel()?>"><?= $site->tel()?></a>
            <a href="tel:<?= $site->tel_mobile()?>"><?= $site->tel_mobile()?></a>
        </div>
    </div> -->
    <?php if(page('Shop')->isOpen()): ?>
    <div class="cart-button">
        <button class="snipcart-checkout cart-btn">Warenkorb (<span class="snipcart-items-count">0</span>)
        </button>
    </div>
    <?php endif ?>
</header>