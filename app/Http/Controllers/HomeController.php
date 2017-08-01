<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotposttop = $this->getPostByPostType('Hot new in top homepage',1);
        $hotpost = $this->getPostByPostType('Hot news',3);
        $lastestpost = $this->getPostByPostType('Normal news',6);
        return view('fe.pages.home',compact('hotposttop','hotpost','lastestpost'));
    }
    public function getPostByPostType($posttype,$limit) {
        $posts = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.created_at','categories.name as cname')
                    ->where('posttypes.name','=',$posttype)
                    ->orderBy('id','DESC')
                    ->limit($limit)
                    ->get();
        return $posts;
    }
}
