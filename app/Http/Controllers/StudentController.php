<?php

namespace App\Http\Controllers;

use App\Models\AnswerDocument;
use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Document;
use Illuminate\Support\Facades\Redirect;
use App\Models\DocumentCategory;
use App\Models\User;

class StudentController extends Controller
{
    public function mypetitions()
    {
        $user = auth()->user()->id;
        $mypetitions = Petition::where('user_id', $user)->get();
        $doc_cats = DocumentCategory::all();

        $newdocs = AnswerDocument::join('petitions', 'petitions.id', '=', 'answer_documents.petition_id')
                                ->where('petitions.user_id', '=', $user)
                                ->where('petitions.status', '=', 5)
                                ->select('answer_documents.*')
                                ->get();

        return view('student.mypetitions', ['petitions' => $mypetitions, 'doc_cats' => $doc_cats, 'newdocs' => $newdocs]);
    }

    public function sendpetition()
    {
        $documents = Document::all();


        $methodologist = User::join('roles', 'roles.user_id', '=', 'users.id')
            ->where('roles.role', 'methodologist')
            ->select('users.*')
            ->get();

        $user = auth()->user()->id;

        return view('student.sendpetition', [
            'documents' => $documents,
            'methodologist' => $methodologist,
        ]);
    }

    public function store(Request $request)
    {
        $document_id = $request->get('document');

        $user = auth()->user()->id;

        $status = 1;

        // условно методист
        $receiver = $request->get('methodolog');

        $petition = new Petition();

        $petition->document_id = $document_id;
        $petition->user_id = $user;
        $petition->status = $status;
        $petition->receiver = $receiver;

        $petition->save();

        return Redirect::to('/student/mypetitions');
    }
}
