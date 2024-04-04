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
            'sauces' => Sauce::simplePaginate(9)
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
        $sauce = new Sauce($request->validated());
        $sauce->userId = Auth::user()->id;
        $sauce->save();

        return redirect()->route('sauces.show', ['sauce' => $sauce->id])->with('success', 'La sauce a été ajoutée avec succès.');
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
        if((Auth::user()->id == $sauce->userId) || (Auth::user()->id == 1)) {
            return view('sauce.edit' , ['sauce' => $sauce]);        
        }
        else {
            return redirect()->route('sauces.index');
        }  
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

        if((Auth::user()->id == $sauce->userId) || (Auth::user()->id == 1)) {
            $sauce->delete();

            return redirect()->route('sauces.index')->with('success', 'Sauce supprimée avec succès');
        }
        else {
            return redirect()->route('sauces.index');
        }  
    }

    /**
     * Like a sauce.
     *
     * @param  Sauce  $sauce
     * @return \Illuminate\Http\Response
     */
    public function like(Sauce $sauce)
    {
        $sauce = Sauce::findOrFail($sauce->id);
        $user = Auth::user();
    
        if (!is_null($sauce->usersDisliked) && in_array($user->id, json_decode($sauce->usersDisliked))) {
            $usersDisliked = json_decode($sauce->usersDisliked);
            $index = array_search($user->id, $usersDisliked);
            unset($usersDisliked[$index]);
            $sauce->usersDisliked = json_encode(array_values($usersDisliked));
    
            $sauce->dislikes--;
    
            $sauce->save();
        }
    
        if (is_null($sauce->usersLiked)) {
            $sauce->usersLiked = json_encode([]);
        }

        if (in_array($user->id, json_decode($sauce->usersLiked))) {
            $usersLiked = json_decode($sauce->usersLiked);
            $index = array_search($user->id, $usersLiked);
            unset($usersLiked[$index]);
            $sauce->usersLiked = json_encode(array_values($usersLiked));

            $sauce->likes--;

            $sauce->save();

            return redirect()->back();
        }
    
        if (!in_array($user->id, json_decode($sauce->usersLiked))) {
            $usersLiked = json_decode($sauce->usersLiked);
            array_push($usersLiked, $user->id);
            $sauce->usersLiked = json_encode($usersLiked);
    
            $sauce->likes++;
        }
    
        $sauce->save();
    
        return redirect()->back();
    }

    /**
     * Dislike a sauce.
     *
     * @param  Sauce  $sauce
     * @return \Illuminate\Http\Response
     */
    public function dislike(Sauce $sauce)
    {
        $sauce = Sauce::findOrFail($sauce->id);
        $user = Auth::user();
    
        if (!is_null($sauce->usersLiked) && in_array($user->id, json_decode($sauce->usersLiked))) {
            $usersLiked = json_decode($sauce->usersLiked);
            $index = array_search($user->id, $usersLiked);
            unset($usersLiked[$index]);
            $sauce->usersLiked = json_encode(array_values($usersLiked));
    
            $sauce->likes--;
    
            $sauce->save();
        }
    
        if (is_null($sauce->usersDisliked)) {
            $sauce->usersDisliked = json_encode([]);
        }
    
        if (in_array($user->id, json_decode($sauce->usersDisliked))) {
            $usersDisliked = json_decode($sauce->usersDisliked);
            $index = array_search($user->id, $usersDisliked);
            unset($usersDisliked[$index]);
            $sauce->usersDisliked = json_encode(array_values($usersDisliked));
    
            $sauce->dislikes--;
    
            $sauce->save();
    
            return redirect()->back();
        }

        if (!in_array($user->id, json_decode($sauce->usersDisliked))) {
            $usersDisliked = json_decode($sauce->usersDisliked);
            array_push($usersDisliked, $user->id);
            $sauce->usersDisliked = json_encode($usersDisliked);
    
            $sauce->dislikes++;
        }
    
        $sauce->save();
    
        return redirect()->back();
    }
}
