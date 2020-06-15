<?php

namespace App\Http\Controllers;

use App\Feeds;
use DB;
use Request;

class HomeController
{

    function index()
    {
        $results = Feeds::all();

        $articles = array();

        $url = null;

        return view('welcome', compact('articles', 'results', 'url'));
    }

    function return()
    {
        $url = request('feeds');

        // check if url exists in DB and add if not
        $checkDB = Feeds::where('url', $url)->first();

        $data = file_get_contents($url);

        try {
            $data = simplexml_load_string($data);
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'URL is not a valid RSS Feed');
        }

        if (empty($checkDB)) {
            $this->add($url);
        }

        $results = Feeds::all();

        $articles = array();

        if ($data->channel->item) {
            foreach ($data->channel->item as $item) {
                $articles[] = array(
                    'title' => (string)$item->title,
                    'description' => (string)$item->description,
                    'link' => (string)$item->link,
                );
            }
        } elseif ($data->item) {
            foreach ($data->item as $item) {
                $articles[] = array(
                    'title' => (string)$item->title,
                    'description' => (string)$item->description,
                    'link' => (string)$item->link,
                );
            }
        }

        return view('welcome', compact('articles', 'results', 'url'));
    }

    function add($url)
    {
        $data = file_get_contents($url);

        try {
            $data = simplexml_load_string($data);
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'URL is not a valid RSS Feed');
        }

        $feed = new Feeds();

        $feed->url = $url;

        $feed->save();
    }

    function delete($id)
    {
        $feed = Feeds::where('id', $id)->first();

        if ($feed) {
            $feed->delete();

            return redirect()->route('welcome')->with('success', 'URL deleted');
        } else {
            return redirect()->route('welcome')->with('error', 'URL not deleted');
        }
    }

    function edit()
    {
        $success = false;

        $errorURLs = [];

        if (request()->post()) {
            foreach (request()->post() as $key => $post) {
                if ($key != '_token') {
                    $feed = Feeds::where('id', $key)->first();

                    if ($feed->url != $post) {
                        $data = file_get_contents($post);

                        try {
                            $data = simplexml_load_string($data);
                        } catch (\Exception $e) {
                            return redirect()->route('welcome')->with('error', 'URL (' . $post . ') is not a valid RSS Feed');
                        }

                        $feed->url = $post;

                        $feed->save();

                        if($success = false) {
                            $success = true;
                        }
                    }
                }
            }
        }

        if ($success) {
            return redirect()->route('welcome')->with('success', 'URLs successfully updated');
        } else {
            return redirect()->route('welcome')->with('error', 'No URLs to update');
        }
    }
}
