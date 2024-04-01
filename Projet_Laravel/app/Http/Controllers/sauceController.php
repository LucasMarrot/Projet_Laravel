<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sauce;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use App\Http\Requests\PostRequest;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index() : View
    {
        return view('sauce.index', [
            'sauces' => Sauce::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('sauce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // TODO (Quand il y aura la fonction de connexion): $userId = Auth::id(); 

        $sauce = Sauce::create($request->validated());
        
        return redirect()->route('sauce.show', ['sauce' => $sauce->id])->with('success', 'La sauce a été ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Illuminate\View\View
     */
    public function show(Sauce $sauce) : View
    {
        return view('sauce.show', [
            'sauce' => $sauce
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Sauce $sauce
     * @return \Illuminate\Http\Response
     */
    public function edit(Sauce $sauce)
    {
        return view('sauce.edit' , [
            'sauce' => $sauce
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest  $request
     * @param  Sauce  $sauce
     * @return \Illuminate\Http\Response
     */
    public function update(Sauce $sauce, PostRequest $request)
    {
        $sauce->update($request->validated());

        return redirect()->route('sauce.show', ['sauce' => $sauce->id])->with('success', 'La sauce a été modifiée avec succès.');
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
