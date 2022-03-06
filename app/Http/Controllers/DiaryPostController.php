<?php

namespace App\Http\Controllers;

use App\Models\DiaryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $diaryposts = DiaryPost::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->paginate(5);
        return view('diaryposts.index')->with('diaryposts', $diaryposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diaryposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form data
        $this->validate($request, [
            'title' => 'bail | required | max:255',
            'content' => 'required',
        ]);
        //process and submit data
        $diarypost = new DiaryPost();
        $diarypost->title = $request->title;
        $diarypost->content = $request->content;
        $diarypost->user()->associate(Auth::user()->id);
        //if succesful redirect to index
        if ($diarypost->save()) {
            return redirect()->route('diary.index', $diarypost->id);
        } else {
            return redirect()->route('diary.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diarypost = DiaryPost::findOrFail($id);
        if ($diarypost->user->id != Auth::id()) {
            return abort(403);
        }

        return view('diaryposts.show')->with('diarypost', $diarypost);
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

        $this->validate($request, [
            'title' => 'bail | required | max:255',
            'content' => 'required',
        ]);
        $diarypost = DiaryPost::findOrFail($id);
        $diarypost->title = $request->title;
        $diarypost->content = $request->content;
        $diarypost->save();
        if ($diarypost->save()) {
            return redirect()->route('diary.index', $diarypost->id);
        } else {
            return redirect()->route('diary.show', $diarypost->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $diary = DiaryPost::findOrFail($id);
        $diary->delete();
        return redirect()->route('diary.index');
    }
}
