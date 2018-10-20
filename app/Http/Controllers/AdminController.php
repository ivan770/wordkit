<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AddSpellCheckerWord(Request $request){
        $this->validate($request, [
            'word' => 'required|max:255',
            'lang' => 'required'
        ], 
        [
            'required' => "Missing ':attribute'"
        ]);

        app('db')->insert("INSERT INTO spellcheck (word, lang) VALUES (:word, :lang)", ["word" => $request->input('word'), "lang" => $request->input('lang')]);
        return response()->json(['error' => false]);
    }

    public function RemoveSpellCheckerWord(Request $request){
        $this->validate($request, [
            'word' => 'required|max:255',
            'lang' => 'required'
        ], 
        [
            'required' => "Missing ':attribute'"
        ]);

        app('db')->delete("DELETE FROM spellcheck WHERE word = :word AND lang = :lang", ["word" => $request->input('word'), "lang" => $request->input('lang')]);
        return response()->json(['error' => false]);
    }
}
