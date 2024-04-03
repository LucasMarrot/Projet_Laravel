<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sauce;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use App\Http\Requests\FormPostRequest;
use Illuminate\Support\Facades\Auth;

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
            'sauces' => Sauce::simplePaginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $sauce = new Sauce();

        return view('sauce.create', [
            'sauce' => $sauce
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FormPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormPostRequest $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        if ($userId) {
            $requestData = $request->all();
            $requestData['userId'] = $userId;
            $request->replace($requestData);
            
            $sauce = Sauce::create($request->validated());

            return redirect()->route('sauces.show', ['sauce' => $sauce->id])->with('success', 'La sauce a été ajoutée avec succès.');
        }
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
     * @param FormPostRequest  $request
     * @param  Sauce  $sauce
     * @return \Illuminate\Http\Response
     */
    public function update(Sauce $sauce, FormPostRequest $request)
    {
        $sauce->update($request->validated());

        return redirect()->route('sauces.show', ['sauce' => $sauce->id])->with('success', 'La sauce a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sauce  $sauce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sauce $sauce)
    {
        $sauce = Sauce::findOrFail($sauce->id);

        if((Auth::user()->id === $sauce->userId) || (Auth::user()->id === 1)) {
            $sauce->delete();

            return redirect()->route('sauces.index')->with('success', 'Sauce supprimée avec succès');
        }  
    }
}
