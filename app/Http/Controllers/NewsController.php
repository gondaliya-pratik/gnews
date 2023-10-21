<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function fetchNews(Request $request) 
    {	

    	$language = $request->lang;
    	$country = $request->country;
    	$base_path = config('app.gnew_base_url');
    	$apikey = config('app.gnew_api_key');
		$url = $base_path."/search?q=example&lang=$language&country=$country&max=15&apikey=$apikey";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = json_decode(curl_exec($ch), true);
		curl_close($ch);
		
		$articles = $data['articles'];
    	return view('news', compact('articles'));
    }
}
