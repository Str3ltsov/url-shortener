<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShortUrlRequest;
use App\Services\UrlShortenerService;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Exception;

class UrlShortenerController extends Controller
{
    public function __construct(private UrlShortenerService $service)
    {
    }

    public function index(): Response
    {
        return inertia()->render('Home');
    }

    public function store(CreateShortUrlRequest $request): RedirectResponse
    {
        $validInputs = $request->validated();

        try {
            $existingShortUrl = $this->service->getShortUrlWithUsedUrl($validInputs['url']);

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
                ->with('error', env('APP_ENV') === 'local' ? $exception : $exception->getMessage());
        }
    }
}
