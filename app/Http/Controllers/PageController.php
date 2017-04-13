<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PageController extends Controller
{

    public function create(Request $request)
    {
    	$this->validate($request, [
          'title' => 'required',
          'slug' => 'required',
          'body' => 'required',

      ]);
    	$page = new Page;
    	$page->title=$request['title'];
    	$page->author_id=1;
    	$page->slug=$request['slug'];
    	$page->excerpt=$request['excerpt'];
    	$page->body=$request['body'];
    	$page->meta_description=$request['meta_description'];
    	$page->meta_keywords=$request['meta_keywords'];
    	$page->save();
    	$pagelist = Page::all();
        return view('admin.crudcms',compact('pagelist'));
    } 




}
