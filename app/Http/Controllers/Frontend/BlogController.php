<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blog;


/**
 * Class BlogsController.
 */
class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::where('status', 'Published')
                    ->orderBy('publish_datetime', 'asc')
                    ->take(15)
                    ->get();

        return view('frontend.blog', compact('blog', $blog));
    }

    public function show($id)
    {
        $post = Blog::findOrFail($id);;

        return view('frontend.post', compact('post', $post));
    }


}
