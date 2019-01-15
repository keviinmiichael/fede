<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(NewsletterRequest $request)
    {
        Newsletter::firstOrCreate($request->all());
    }
}
