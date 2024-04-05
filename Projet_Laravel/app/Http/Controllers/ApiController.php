<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class ApiController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    public function show($id)
    {
        $sauces = Sauce::findOrFail($id);
        return response()->json($sauces);
    }

    // create pas daptable en API

    public function store(FormPostRequest $request)
    {
        $sauce = new Sauce($request->validated());
        $sauce->userId = Auth::user()->id;
        $sauce->save();

        return response()->json(Sauce::all());
    }

    // edit pas adaptable en API

    public function update(Sauce $sauce, FormPostRequest $request)
    {
        $sauce->update($request->validated());

        return response()->json(Sauce::all());
    }

    public function destroy(Sauce $sauce)
    {
        $sauce = Sauce::findOrFail($sauce->id);

        if((Auth::user()->id == $sauce->userId) || (Auth::user()->id == 1)) {
            $sauce->delete();

            return response()->json(Sauce::all());
        }
        else {
            return response()->json(Sauce::all());
        }  
    }

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

            return response()->json(Sauce::all());
        }
    
        if (!in_array($user->id, json_decode($sauce->usersLiked))) {
            $usersLiked = json_decode($sauce->usersLiked);
            array_push($usersLiked, $user->id);
            $sauce->usersLiked = json_encode($usersLiked);
    
            $sauce->likes++;
        }
    
        $sauce->save();
    
        return response()->json(Sauce::all());
    }

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
    
            return response()->json(Sauce::all());
        }

        if (!in_array($user->id, json_decode($sauce->usersDisliked))) {
            $usersDisliked = json_decode($sauce->usersDisliked);
            array_push($usersDisliked, $user->id);
            $sauce->usersDisliked = json_encode($usersDisliked);
    
            $sauce->dislikes++;
        }
    
        $sauce->save();
    
        return response()->json(Sauce::all());
    }
}
