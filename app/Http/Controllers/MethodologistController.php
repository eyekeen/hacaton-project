<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Document;
use Illuminate\Support\Facades\Redirect;

class MethodologistController extends Controller
{
    public function sentpetitions()
    {
        $user = auth()->user()->id;
        $sentpetitions = Petition::where('receiver', $user)->get();

        return view('methodologist.sentpetitions', ['petitions' => $sentpetitions]);
    }

    public function acceptpetition()
    {
        $documents = Document::all();

        $user = auth()->user()->id;

        return view('student.sendpetition', [
            'documents' => $documents,
        ]);
    }

    public function declinepetition()
    {
        $documents = Document::all();

        $user = auth()->user()->id;

        return view('student.sendpetition', [
            'documents' => $documents,
        ]);
    }
}
