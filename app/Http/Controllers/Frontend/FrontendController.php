<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\Models\Blogs\Blog;
use App\Repositories\Frontend\Pages\PagesRepository;
use Illuminate\Support\Facades\Mail;
use Session;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{

    private $subscriptionService;


    public function __construct(SubscriptionService $subscriptionService) 
    {
        $this->subscriptionService = $subscriptionService;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blog = Blog::where('status', 'Published')
                    ->orderBy('publish_datetime', 'asc')
                    ->take(3)
                    ->get();

        $subscriptions = $this->subscriptionService->getAll();            

        return view('frontend.index', compact('blog', 'subscriptions'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('frontend.about');
    }    



    /**
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        return view('frontend.faq');
    }    


    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }
}
