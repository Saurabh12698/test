<?php

namespace App\Http\Controllers;

use auth;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use App\{
    Post,
};

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $uid = $user->uid;

        $Posts = DB::table('posts')
        ->select('users.uid as userid','users.name as name','posts.pid as postid','posts.url as posturl','posts.caption as caption')
        ->Join('users','posts.uid','=','users.uid')
        ->leftJoin('user_follow_lists', function($join) use ($uid){
            $join->on('user_follow_lists.uidtwo', '=', 'posts.uid')
                 ->where('user_follow_lists.uidone', '=', $uid);
        })
        ->leftJoin('likes', function($join) use ($uid){
            $join->on('likes.pid', '=', 'posts.pid')
                 ->where('likes.uid', '=', $uid);
        })
        ->leftJoin('comments', function($join) use ($uid){
            $join->on('comments.pid', '=', 'posts.pid')
                 ->where('comments.uid', '=', $uid);
        })
        ->orWhere('posts.uid','=', $uid)
        ->get();

        dd($Posts);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}