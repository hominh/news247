<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('videos')
                    ->select(DB::raw("videos.id,videos.name as vname,(CASE WHEN (status = 1) THEN 'Actived' ELSE 'Disable' END) as status,videos.created_at,users.name as uname"))
                    ->leftJoin('users','videos.user_id','=','users.id')
                    ->get();
        //dd($data);
        return view('admin/video/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/video/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:videos|min:5',
           'intro' => 'required|min:5',
        ]);
        $video = new Video;
        $video->name = $request->name;
        $video->alias = changeTitle($request->name);
        $video->intro = $request->intro;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->keyword = $request->keyword;
        $video->url = $request->url;
        $video->user_id = Auth::user()->id;
        if($request->image != "") {
            $video->thumb = $request->image;
        }
        $video->status = $request->status;
        $video->save();
        return redirect()->route('admin.video.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Video::findOrFail($id)->toArray();
        $currentnamestatus = "";
        $othernamestatus = "";
        $otherstatus = 0;
        $curentnumberofstatus = $data['status'];
        if($curentnumberofstatus == 1) {
            $otherstatus = 0;
            $currentnamestatus = "Actived";
            $othernamestatus  = "Disable";
        }
        else {
            $otherstatus = 1;
            $currentnamestatus = "Disable";
            $othernamestatus  = "Actived";
        }


        return view('admin.video.edit',compact('data','id','currentnamestatus','otherstatus','othernamestatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|min:5',
           'intro' => 'required|min:5',
        ]);

        $video = Video::find($id);
        $video->name = $request->name;
        $video->alias = changeTitle($request->name);
        $video->intro = $request->intro;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->keyword = $request->keyword;
        $video->url = $request->url;
        $video->user_id = Auth::user()->id;
        if($request->image != "") {
            $post->image = $request->image;
        }
        $video->status = $request->status;
        $video->save();
        return redirect()->route('admin.video.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('admin.video.list');
    }

    public function getDelImg($id,Request $request)
    {
        if($request->ajax()) {
            $idvideo = (int)$request->get('idvideo');
            $videodetail = Video::find($idvideo);
            if(!empty($videodetail)) {
                $img = public_path("");
                $img.= $videodetail->thumb;
                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $videodetail->thumb = "";
                $videodetail->save();

            }
            return "ok";
        }
    }
}
