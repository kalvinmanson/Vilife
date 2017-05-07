<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function duplicate(Request $request) {
        $page = Page::find($request->id);
        $newPage = $page->replicate();
        $newPage->slug = $newPage->slug .'-copy'; 
        $newPage->save();

        return redirect()->action('PageController@edit', $newPage->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->session()->get('q');
        $q_category = $request->session()->get('q_category');
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        if(isset($request->q)) {
            //set categry
            $request->session()->put('q_category', $request->q_category);
            $q_category = $request->q_category;

            //set query
            $request->session()->put('q', $request->q);
            $q = $request->q;

        }

        $pages = Page::where(function($query) use ($q){
                    $query->where('name', 'LIKE', '%'.$q.'%')
                        ->orWhere('content', 'LIKE', '%'.$q.'%');
            })
            ->where(function($query) use ($q_category){
                if(!empty($q_category) && $q_category != 'all') {
                    $query->where('category_id', $q_category);
                }
            })
            ->orderBy('updated_at', 'desc')->paginate(50);
        $categories = Category::all();
        return view('pages/index', compact('pages', 'categories', 'q_category', 'q'));
    }

    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages', 'required', 'max:50']
        ]);
        $record_store = request()->all();
        $page = Page::create($record_store);
        return redirect()->action('PageController@edit', $page->id);
    }

    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::find($id);
        $categories = Category::all();
        return view('pages/edit', compact('page', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages,slug,'.$page->id, 'required', 'max:50']
        ]);
        $record_store = request()->all();
        $page->fill($record_store)->save();
        return redirect()->action('PageController@index');
    }
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $page = Page::find($id);
        Page::destroy($page->id);
        return redirect()->action('PageController@index');
    }
}
