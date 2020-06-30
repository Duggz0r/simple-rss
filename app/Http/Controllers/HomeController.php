<?php

namespace App\Http\Controllers;

use App\Feeds;
use DB;
use Request;

class HomeController
{

    function index()
    {
        // Get all of the results from the rss-feeds table
        $results = Feeds::all();

        // Declare variables
        $articles = array();

        $url = null;

        // Return the view
        return view('welcome', compact('articles', 'results', 'url'));
    }

    function return()
    {
        // Get the URL passed from the page
        $url = request('feeds');

        // Check if url exists in DB
        $checkDB = Feeds::where('url', $url)->first();

        // Get the contents from the url
        $data = file_get_contents($url);

        // Try loading the XML, if it can't throw error
        try {
            $data = simplexml_load_string($data);
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'URL is not a valid RSS Feed');
        }

        // If the url doesn't exist on the DB, add it
        if (empty($checkDB)) {
            $this->add($url);
        }

        // Get all of the results from the rss-feeds table
        $results = Feeds::all();

        // Declare variable
        $articles = array();

        // Build articles array with the data required, work around as some RSS feeds don't follow the standard
        // xml layout
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

        // Return the view
        return view('welcome', compact('articles', 'results', 'url'));
    }

    function add($url)
    {
        // Get contents from the URL passed to be added
        $data = file_get_contents($url);

        // Try loading the XML, if it can't throw error
        try {
            $data = simplexml_load_string($data);
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'URL is not a valid RSS Feed');
        }

        // Create a new 'feed'
        $feed = new Feeds();

        // Set the feed->url to the passed url
        $feed->url = $url;

        // Save
        $feed->save();
    }

    function delete($id)
    {
        // Get the feed from the database to be deleted
        $feed = Feeds::where('id', $id)->first();

        // If feed found, delete it
        if ($feed) {
            $feed->delete();

            // Return to home with success
            return redirect()->route('welcome')->with('success', 'URL deleted');
        } else {
            // Feed not found, return to home with error
            return redirect()->route('welcome')->with('error', 'URL not deleted');
        }
    }

    function edit()
    {
        // Declare variable
        $success = false;

        // Confirm request is post
        if (request()->post()) {
            // Loop through each request->post and save the $key against the $post (url)
            foreach (request()->post() as $key => $post) {
                // Ignore '_token'
                if ($key != '_token') {
                    // Get feed from DB where the id exists
                    $feed = Feeds::where('id', $key)->first();

                    // Protect if statement
                    if($feed) {
                        // We only want to update records that have actually been amended, this if checks if the feed->url
                        // from the database is different to what has been passed from the page
                        if ($feed->url != $post) {
                            // Get contents from the URL passed to be added
                            $data = file_get_contents($post);

                            // Try loading the XML, if it can't throw error
                            try {
                                $data = simplexml_load_string($data);
                            } catch (\Exception $e) {
                                return redirect()->route('welcome')->with('error', 'URL (' . $post . ') is not a valid RSS Feed');
                            }

                            // Set the feed->url to the new updated url
                            $feed->url = $post;

                            // Save
                            $feed->save();

                            // Set success variable to true in order to return correct message to the page later
                            if ($success = false) {
                                $success = true;
                            }
                        }
                    }
                }
            }
        }

        // If success is true, redirect to home with success message
        if ($success) {
            return redirect()->route('welcome')->with('success', 'URLs successfully updated');
        } else {
            // Success is false, redirect to home with error message
            return redirect()->route('welcome')->with('error', 'No URLs to update');
        }
    }
}
