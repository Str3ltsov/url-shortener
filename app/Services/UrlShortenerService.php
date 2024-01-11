<?php

namespace App\Services;

use App\Models\ShortUrl;

class UrlShortenerService
{
    // Generates random alphanumeric hash.
    public final function generateRandomHash(int $length = 6): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomHash = '';

        for ($i = 0; $i < $length; $i++) {
            $randomHash .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomHash;
    }

    // Finds and retrieves short url record where entered url is already being used.
    public final function getShortUrlWithUsedUrl(string $url): object
    {
        return ShortUrl::where('url', $url)->first();
    }

    // Creates new short url record.
    public final function createShortUrl(string $hash, array $validInputs): void
    {
        ShortUrl::create([
            'hash' => $hash,
            'url' => $validInputs['url'],
            'folder' => $validInputs['folder'] ?? null
        ]);
    }

    // Generates short url.
    public final function generateShortUrl(object $shortUrl): string
    {
        return env('APP_URL') . ':' . env('APP_PORT') . '/' . $shortUrl->folder . '/' . $shortUrl->hash;
    }

    // Finds and retrieves url from short url record by folder and hash.
    public final function getUrlFromShortUrlByFolderAndHash(?string $folder, string $hash): string
    {
        return ShortUrl::where([
            'folder' => $folder,
            'hash' => $hash
        ])->first()->url;
    }
}
