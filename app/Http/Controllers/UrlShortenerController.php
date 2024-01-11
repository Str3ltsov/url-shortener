<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class UrlShortenerController extends Controller
{
    public function index(): Response
    {
        return inertia()->render('Home');
    }
}
