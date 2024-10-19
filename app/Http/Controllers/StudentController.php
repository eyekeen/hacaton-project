<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Document;
use Illuminate\Support\Facades\Redirect;
use App\Models\DocumentCategory;

class StudentController extends Controller
{
    public function mypetitions()
    {
        $user = auth()->user()->id;
        $mypetitions = Petition::where('user_id', $user)->get();
        $doc_cat = DocumentCategory::all();

        return view('student.mypetitions', ['petitions' => $mypetitions, 'doc_cat' => $doc_cat]);
    }

    public function sendpetition()
    {
        $documents = Document::all();

        $user = auth()->user()->id;

        return view('student.sendpetition', [
            'documents' => $documents,
        ]);
    }

    public function store(Request $request)
    {
        $document_id = $request->get('document');

        $user = auth()->user()->id;

        $status = 1;

        // условно методист
        $receiver = 7;

        $petition = new Petition();

        $petition->document_id = $document_id;
        $petition->user_id = $user;
        $petition->status = $status;
        $petition->receiver = $receiver;

        $petition->save();

        return Redirect::to('/student/mypetitions');
    }
}
