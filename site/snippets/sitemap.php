<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($pages as $p): ?>
    <?php if (in_array($p->uri(), $ignore) && $p->hasChildren() != 1) continue ?>
    <url>
        <loc><?= html($p->url()) ?></loc>
        <lastmod><?= $p->modified('c', 'date') ?></lastmod>

    </url>
    <?php endforeach ?>
</urlset>