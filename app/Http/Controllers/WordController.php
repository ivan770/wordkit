<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function Translate(Request $request, $lang_from, $lang_to, $word)
    {
        $select = app('db')->select("SELECT * FROM words WHERE origin = :word AND lang_from = :from AND lang_to = :to", ["word" => $word, "from" => $lang_from, "to" => $lang_to]);

        if(empty($select)){
            return response()->json(["error" => true], 404);
        } else {
            return response()->json(["origin" => $select[0]->origin, "translation" => $select[0]->translation, "error" => false], 200);
        }
    }

    /* FIX CYRILLIC CHECK */

    public function SpellChecker(Request $request, $lang, $word){
        $select = app('db')->select("SELECT * FROM spellcheck WHERE word = :word AND lang = :lang", ["word" => $word, "lang" => $lang]);

        if(empty($select)){
            return response()->json(["correct" => false], 404);
        } else {
            return response()->json(["correct" => true], 200);
        }
    }
}