<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::view('/', 'pages.home')->name('home');

/*
| sitemap.xml - list of public, indexable URLs.
| Add new public routes to $urls as pages ship (catalog, product detail, etc.).
*/
Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => route('home'), 'changefreq' => 'weekly', 'priority' => '1.0'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>'
        .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '<url>'
            .'<loc>'.htmlspecialchars($url['loc']).'</loc>'
            .'<changefreq>'.$url['changefreq'].'</changefreq>'
            .'<priority>'.$url['priority'].'</priority>'
            .'</url>';
    }

    $xml .= '</urlset>';

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
