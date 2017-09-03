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
        $lastestpost = $this->getPostByPostType('Normal news',12);
        $featureposts = $this->getPostByPostType('Feature news',12);
        $reviews = $this->getPostByPostType('Review',50);
        $popularnews = $this->getPostByPostType('Popular news',50);
        //dd($popularnews);

        $gadgetposts = $this->getPostByCategory('Gadget',6);
        $gameposts = $this->getPostByCategory('Game',6);
        $roboticposts = $this->getPostByCategory('Robotic',6);
        $technologyposts = $this->getPostByCategory('Technology',20);
        $subcategories_tech = $this->getSubCategoryByParentCategory(10);

        $videos = DB::table('videos')
                    ->select('videos.id','videos.name','videos.alias','videos.intro','videos.url','videos.thumb')
                    ->orderBy('id','DESC')
                    ->limit(4)
                    ->get();
        return view('fe.pages.home',compact('hotposttop','hotpost','lastestpost','gadgetposts','gameposts','roboticposts','subcategories_tech','videos','featureposts','reviews','popularnews'));
    }
    public function getPostByPostType($posttype,$limit) {
        $posts = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->leftJoin('users','posts.user_id','=','users.id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.created_at','categories.name as cname','users.name as uname')
                    ->where('posttypes.name','=',$posttype)
                    ->orderBy('id','DESC')
                    ->limit($limit)
                    ->get();
        return $posts;
    }

    public function getPostByCategory($category,$limit) {
        $posts = DB::table('posts')
                    ->leftJoin('categories','posts.category_id','=','categories.id')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->leftJoin('users','posts.user_id','=','users.id')
                    ->select('posts.id','posts.name','posts.intro','posts.alias','posts.title','posts.description','posts.keyword','posts.image','posts.created_at','categories.name as cname','users.name as uname')
                    ->where('categories.name','=',$category)
                    ->orderBy('id','DESC')
                    ->limit($limit)
                    ->get();
        return $posts;
    }

    public function getSubCategoryByParentCategory($category) {
        $subcategories = DB::table('categories')
                    ->select('categories.id','categories.name','categories.parent_id','categories.hassub')
                    ->where([
                        ['categories.parent_id','=',$category],
                        ['categories.hassub','=',0],
                        ['categories.status','=',1]
                    ])
                    ->get();
        return $subcategories;
    }

}
