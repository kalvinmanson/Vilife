<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Auth;
use Storage;
use File;
use App\Category;
use App\Page;
use App\Picture;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //home
    public function index()
    {
        $lastNews = Page::where('tags', 'LIKE', '%noticia%')->limit(6)->orderBy('created_at', 'desc')->get();
        return view('web/index', compact('lastNews'));
    }
     //Show category
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $pages = Page::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(6);

        if (view()->exists('web/category-'.$slug)) {
            return view('web/category-'.$slug, compact('category', 'pages', 'blocks'));
        } else {
            return view('web/category', compact('category', 'pages', 'blocks'));
        }
    }
    //Show Page
    public function page($category, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $lastNews = Page::where('tags', 'LIKE', '%noticia%')->limit(6)->orderByRaw("RAND()")->get();
        if (view()->exists('web.page-cat-'.$category)) {
            return view('web/page-cat-'.$category, compact('page', 'lastNews'));
        } else {
            return view('web/page', compact('page', 'lastNews'));
        }
    }
    // Send email
    public function contact(Request $request) {
        if($request->method() == "POST") {

            $data = [
                        'data' => [
                            'name'=>$request->name, 
                            'email'=>$request->email,
                            'celphone'=>$request->celphone,
                            'subject'=>$request->subject,
                            'content'=>$request->content
                        ]
                    ];
            Mail::send('emails.contact', $data, function ($message) {
                $message->from('no-reply@droni.co', 'No Reply | Drodmin');
                $message->subject("Contacto Web Drodmin");
                $message->to('kalvinmanson@gmail.com')->cc('gustavo.barragan@musculocreativo.com.co');
            });
            return view('web/contact_thanks');

        } else {
            return view('web/contact');
        }
    }

    public function staff() { return view('web/staff'); }
    public function my() { return view('web/my'); }
    public function planes() { return view('web/planes'); }
    public function consultas() { return view('web/consultas'); }
    public function prices() { return view('web/prices'); }
}
