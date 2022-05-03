<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $site->Metadescription() ?>">
    <meta name="robots" content="index" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="preconnect" href="<https://app.snipcart.com>" />
    <link rel="preconnect" href="<https://cdn.snipcart.com>" />
    <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.2.1/default/snipcart.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <?= Bnomei\Fingerprint::css('main/assets/css/style.css');?>

    <?php if($page->isHomePage()): ?>
    <title>
        <?= $site->title() . ' . Plakatsammler, Dozent und Grafiker' ?>
    </title>
    <?php elseif ($page->template() == 'about'): ?>
    <title>
        <?=  $site->title() . ' . Werk | Biographie' ?>
    </title>
    <?php else: ?>
    <title>
        <?= $site->title() . ' . ' . $page->parent()->title() . ' ' . $page->title() ?>
    </title>
    <?php endif ?>
</head>

<div class="main-container">

    <body class="preload">