<header>
    <div class="nav-container">
        <div class="nav-header">
            <a class="logo" href="/"><?= $site->title() ?></a>
            <button>Menu</button>
        </div>
        <nav>
            <ul id="menu" class="menu menu-lv1">
                <?php foreach($pages->listed() as $menu_lv1): ?>
                <?php if($menu_lv1->Togglepagestatus()->exists() && $menu_lv1->Togglepagestatus()->toBool() === false): ?>
                <li>
                    <a href="#" class="<?php e($menu_lv1->isOpen(), 'nav-current') ?> submenu-handler menu-item-lv1">
                        <?= $menu_lv1->title() ?>
                    </a>
                    <ul class="menu-inactive menu-lv2">
                        <li>
                            <a href="#" class="nav-current inactive">In Bearbeitung</a>
                        </li>
                    </ul>
                </li>

                <?php elseif($menu_lv1->Togglepagestatus()->toBool() == true && $menu_lv1 == ('Shop')): ?>

                <li>
                    <a href="<?= $menu_lv1->url() ?>"
                        class="<?php e($menu_lv1->isOpen(), 'nav-current') ?>  menu-item-lv1"><?= $menu_lv1->title() ?>
                    </a>
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
                        <?php if($menu_lv2->hasChildren()): ?>
                        <li class="<?php e($menu_lv2->isOpen(), 'open-menu') ?>">

                            <a href="#"
                                class="<?php e($menu_lv2->isOpen(), 'nav-current') ?> submenu-handler menu-item-lv2">
                                <?= $menu_lv2->title() ?>
                            </a>

                            <ul class="menu-lv3">
                                <?php foreach($menu_lv2->children()->listed() as $editorial): ?>
                                <li>
                                    <a href="<?= $editorial->url()?>"
                                        class="<?php e($editorial->isOpen(), 'nav-current open-menu')  ?> ">
                                        <?= $editorial->title() ?>
                                    </a>
                                </li>
                                <?php endforeach ?>
                            </ul>

                        </li>
                        <?php else: ?>
                        <li class="">
                            <a href="<?= $menu_lv2->url()?>">
                                <?php if ($menu_lv2->isOpen()): ?>
                                <h1 class='nav-current'><?= $menu_lv2->title() ?></h1>
                                <?php else: ?>
                                <?= $menu_lv2->title() ?>
                                <?php endif ?>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </li>
                <?php endif ?>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>

    <?php if(page('Shop')->isOpen()): ?>
    <div class="cart-button">
        <button class="snipcart-checkout cart-btn">Warenkorb (<span class="snipcart-items-count">0</span>)
        </button>
    </div>
    <?php endif ?>
</header>