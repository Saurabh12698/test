<?php

namespace App\Http\Controllers;

use auth;
use Webpatser\Uuid\Uuid;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use App\{
    Post,
    CmtyShre,
};

class PostController extends Controller
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
        // dd($file = request()->file('img'));
        $user = Auth::user();
        $pid = Uuid::generate(4);
        $input = $request->all();

        if(request()->hasFile('img')){
           
            $file = request()->file('img');
            $name = 'IMG'.now()->timestamp.'.'.$file->getClientOriginalExtension();
            $path = './Users/'.$user->uid.'/images'.'/'.date("Y-m-d").'/';

            if($file->move($path, $name)){   

                $path = 'Users/'.$user->uid.'/images'.'/'.date("Y-m-d").'/';
                $post = New Post;
                $post->pid = $pid;
                $post->uid = $user->uid;
                $post->url = $path."".$name;
                $post->caption = $input['caption'];
                $post->type = 0;
                $post->view = 0;
                $post->endis = 0;
                $post->save();

                if(request()->has('cmty')){
                    foreach ($input['cmty'] as $value) {
                        $cmtyshre = new CmtyShre;
                        $cmtyshre->pid = $pid;
                        $cmtyshre->cid = $value;
                        $cmtyshre->save();
                    }
                }
            }
        }

        if(request()->hasFile('vid')){
            $file = request()->file('vid');
            $name = 'VID'.now()->timestamp.'.'.$file->getClientOriginalExtension();
            $path = './Users/'.$user->uid.'/videos'.'/'.date("Y-m-d").'/';

            if($file->move($path, $name)){

                $path = 'Users/'.$user->uid.'/videos'.'/'.date("Y-m-d").'/';
                $post = New Post;
                $post->pid = $pid;
                $post->uid = $user->uid;
                $post->url = $path."".$name;
                $post->caption = $input['name'];
                $post->type = 1;
                $post->view = 0;
                $post->endis = 0;
                $post->save();

                if(request()->has('cmty')){
                    foreach ($input['community'] as $value) {
                        $cmtyshre = new CmtyShre;
                        $cmtyshre->pid = $pid;
                        $cmtyshre->cid = "";
                        $cmtyshre->save();
                    }
                }
            }
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $user = Auth::user();

        $communities = DB::table('usr_cmty_mems')
        ->select('communities.cid','communities.url','communities.name')
        ->join('communities','communities.cid','=','usr_cmty_mems.cid')
        ->where('usr_cmty_mems.uid','=', $user->uid)
        ->get();
        
        // dd($community);

        if($post == 'img'){
            return view('post.image', compact('communities'));
        }elseif($post == 'vid'){
            return view('post.video', compact('communities'));
        }else{
            return 'redirect';
        }
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
