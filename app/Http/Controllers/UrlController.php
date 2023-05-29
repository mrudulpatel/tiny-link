<?php

namespace App\Http\Controllers;

use App\Models\Urls;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysqli;

class UrlController extends Controller
{
    public function index()
    {
        //
    }

    public function shorten(Request $request, $id)
    {
        $request->validate([
            'long_url' => 'required|url'
        ]);

        $input['long_url'] = $request->long_url;
        $code = substr(md5(microtime()), rand(0, 26), 5);
        $input['short_url'] = url('/') . '/' . $code;
        $input['user_id'] = auth()->user()->id;

        Urls::create($input);

        return redirect('/dashboard/' . $id)->with('success', 'Shortened URL with code: ' . $input['short_url']);
    }

    public function shortenLink($code)
    {
        $url = Urls::where('short_url', url('/') . '/' . $code)->first();
        if ($url) {
            $url->increment('clicks');
            return redirect($url->long_url);
        } else {
            return redirect('/')->with('error', 'Invalid URL');
        }
    }
}
