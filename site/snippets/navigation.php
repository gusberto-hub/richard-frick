<header>
    <div class="nav-container">
        <a class="logo" href="/"><?= $site->title() ?></a>
        <nav>
            <ul id="menu">
                <?php foreach($pages->listed() as $menu_lv1): ?>
                <li><a class="<?php e($menu_lv1->isOpen(), 'nav-current') ?>" href="#"><?= $menu_lv1->title() ?></a>
                    <ul class="main-menu">
                        <?php if($menu_lv1->hasChildren()): ?>
                        <?php foreach($menu_lv1->children()->listed() as $menu_lv2): ?>
                        <li>
                            <a href="<?= $menu_lv2->url()?>">
                                <?= $menu_lv2->title() ?></a>
                            <ul class="main-menu">
                                <?php if($menu_lv2->hasChildren()): ?>
                                <?php foreach($menu_lv2->children()->listed() as $menu_lv3): ?>
                                <li>
                                    <a href="<?= $menu_lv3->url()?>">
                                        <?= $menu_lv3->title() ?></a>
                                </li>
                                <?php endforeach ?>
                                <?php endif ?>
                            </ul>
                        </li>
                        <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>
    <div class="contact">
        <div class="contact-address">
            <?= $site->address()->kt() ?>
        </div>
        <div class="contact-social">
            <?= $site->mail()->kt() ?>
            <?= $site->tel()->kt() ?>
            <?= $site->tel_mobile()->kt() ?>
        </div>
    </div>
</header>