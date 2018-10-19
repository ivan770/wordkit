<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AddSpellCheckerWord(Request $request){
        $this->validate($request, [
            'word' => 'required|max:255',
            'lang' => 'required',
            'key' => 'required'
        ], 
        [
            'required' => "Missing ':attribute'"
        ]);
        
        if($request->input('key') === (string)env('WORDKIT_KEY', false)){
            app('db')->insert("INSERT INTO spellcheck (word, lang) VALUES (:word, :lang)", ["word" => $request->input('word'), "lang" => $request->input('lang')]);
            return response()->json(['error' => false]);
        } else {
            return response()->json(['error' => true]);
        }
    }
}
