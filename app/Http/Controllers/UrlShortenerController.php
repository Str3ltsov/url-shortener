<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShortUrlRequest;
use App\Services\UrlShortenerService;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Exception;

class UrlShortenerController extends Controller
{
    public function __construct(private UrlShortenerService $service)
    {
    }

    // UrlShorter vue page.
    public function index(): Response
    {
        return inertia()->render('UrlShortener');
    }

    // Storing short url record and generating short url.
    public function store(CreateShortUrlRequest $request): RedirectResponse
    {
        $validInputs = $request->validated();

        try {
            $existingShortUrl = $this->service->getShortUrlWithUsedUrl($validInputs['url']);

            if ($existingShortUrl && $existingShortUrl->folder !== $validInputs['folder']) {
                $this->service->updateShortUrlFolder($existingShortUrl, $validInputs['folder']);
            }
            if (!$existingShortUrl) {
                $hash = $this->service->generateRandomHash();
                $this->service->createShortUrl($hash, $validInputs);
                $existingShortUrl = $this->service->getShortUrlWithUsedUrl($validInputs['url']);
            }

            return back()
                ->with([
                    'success' => 'Successfully created short url.',
                    'shortUrl' => $this->service->generateShortUrl($existingShortUrl)
                ]);
        } catch (Exception $exception) {
            return back()
                ->with(
                    'exception',
                    env('APP_ENV') === 'local' ? $exception : $exception->getMessage()
                );
        }
    }

    // Redirecting to url using short url with hash.
    public function redirectToUrl(string $hash): RedirectResponse
    {
        try {
            $url = $this->service->getUrlFromShortUrlByHashAndFolder($hash);
            return redirect()->to($url);
        } catch (Exception $exception) {
            return back()
                ->with(
                    'exception',
                    env('APP_ENV') === 'local' ? $exception : $exception->getMessage()
                );
        }
    }

    // Redirecting to url using short url with folder and hash.
    public function redirectToUrlWithFolder(string $folder, string $hash): RedirectResponse
    {
        try {
            $url = $this->service->getUrlFromShortUrlByHashAndFolder($hash, $folder);
            return redirect()->to($url);
        } catch (Exception $exception) {
            return back()
                ->with(
                    'exception',
                    env('APP_ENV') === 'local' ? $exception : $exception->getMessage()
                );
        }
    }
}
