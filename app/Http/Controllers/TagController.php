<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::get();
        return response(view('tags.index', compact('tags')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('tags.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => ['required', 'unique:Tags,name_en', 'max:20'],
        ]);
        Tag::create($validated);
        return redirect('/admin/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show is here');
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
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id', $id)->delete();
        return redirect('/admin/tags');
    }

    public function validate_tags($request)
    {
        $tags = Tag::get();
        $available_tags = [];
        foreach($tags as $ttag){array_push($available_tags, $ttag->id);}
        return $request->validate([
            'tags' => ['nullable', 'array'],
            'tags.*' => ['numeric', Rule::in($available_tags)]
        ]);
    }
}
