<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Posttype;
use DB;
use Auth;
use App\Http\Controllers\Controller;

class PosttypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$data = DB::table('posttypes')
            ->join('users','posttypes.user_id','=','users.id')
            ->select('posttypes.id as id', 'posttypes.name as pname','users.name as uname','posttypes.created_at')
            ->get();
        return view('admin/posttype/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posttype.add');
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
            'name' => 'required|unique:posttypes|min:5',
        ]);

        $posttype = new Posttype;
        $posttype->name = $request->name;
        $posttype->user_id = Auth::user()->id;
        $posttype->save();
        return redirect()->route('admin.posttype.list');
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
        $data = Posttype::findOrFail($id)->toArray();
        return view('admin.posttype.edit',compact('data'));
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
        ]);

        $posttype = Posttype::find($id);
        $posttype->name = $request->name;
        $posttype->user_id = Auth::user()->id;
        $posttype->save();
        return redirect()->route('admin.posttype.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posttype = Posttype::find($id);
        $posttype->delete();
        return redirect()->route('admin.posttype.list');
    }
}
