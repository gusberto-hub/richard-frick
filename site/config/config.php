<?php

return [
'debug' => true,

'routes' => [
    [
        'pattern' => 'sitemap.xml',
        'action'  => function() {
            $pages = site()->pages()->index();
            $ignores = kirby()->option('sitemap.ignore', ['error']);
            // Allow ignore option to include children via 'page/*' syntax
            $ignoresExpanded = [];

            function endsWith($haystack, $needle) {
                $length = strlen($needle);
                return $length > 0 ? substr($haystack, -$length) === $needle : true;
            }

            function startsWith ( $haystack, $needle ) {
                return strpos( $haystack , $needle ) === 0;
              }
            
            foreach ($ignores as $ignore) {
                if (endsWith($ignore, '/*')) {
                $ignore = substr($ignore, 0, -2);
                foreach ($pages as $page) {
                    if (startsWith($page, $ignore)) {
                    array_push($ignoresExpanded, $page);
                    }
                };
                }
            }
            $ignore = array_merge($ignores, $ignoresExpanded);
            $content = snippet('sitemap', compact('pages', 'ignore'), true);

            return new Kirby\Cms\Response($content, 'application/xml');
        }
    ],
    [
        'pattern' => 'sitemap',
        'action'  => function() {
        return go('sitemap.xml', 301);
        }
    ]
    ],
    'sitemap.ignore' => ['error', 'Shop/*'],
];