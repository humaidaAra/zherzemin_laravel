<?php

namespace App\Http\Controllers;

use App\Models\Sponser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsers = Sponser::get();
        return response(view('sponsers.index', compact('sponsers')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('sponsers.create'));
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
            'name'=> ['required', 'unique:Sponsers', 'max:100'],
            'url' => ['required']
        ]);
        Sponser::create($validated);

        return redirect('/admin/sponsers');
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
        Sponser::find($id)->delete();
        return redirect('/admin/sponsers');
    }

    public function validate_sponsers($request)
    {
        $sponsers = Sponser::get();
        $available_sponsers = [];
        foreach($sponsers as $ssponser){array_push($available_sponsers, $ssponser->id);}
        return $request->validate([
            'sponsers' => ['nullable', 'array'],
            'sponsers.*' => ['numeric', Rule::in($available_sponsers)]
        ]);
    }
}
