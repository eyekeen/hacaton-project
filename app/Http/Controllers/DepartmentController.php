<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use Illuminate\Support\Facades\Redirect;
use App\Models\AnswerDocument;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function sentpetitions()
    {
        $user = auth()->user()->id;
        $sentpetitions = Petition::where('receiver', $user)->get();

        return view('department.sentpetitions', ['petitions' => $sentpetitions]);
    }

    public function acceptpetition(Request $request)
    {
        $p_id = $request->get('p_id');

        $petition = Petition::find($p_id);

        $petition->status = 5;
        $petition->receiver = $petition->user_id;

        $petition->save();

        return Redirect::to('/department/sentpetitions');
    }

    public function declinepetition(Request $request)
    {
        $p_id = $request->get('p_id');

        $petition = Petition::find($p_id);

        $petition->status = 4;
        $petition->receiver = $petition->user_id;

        $petition->save();

        return Redirect::to('/department/sentpetitions');
    }

    public function oldmethod(Request $request)
    {

        $user = auth()->user()->id;


        $file = $request->file('newdoc');
        $originalFileName = $request->file('newdoc')->getClientOriginalName();
        $p_id = $request->get('p_id');
        $newFileName = time() . '_' . uniqid() . '.' . pathinfo($originalFileName, PATHINFO_EXTENSION);
        $filePath = $newFileName;

        $path = Storage::disk('public')->putFileAs('uploads', $file, $newFileName);
        
        $ansdoc = Document::create([
            'document_name' => $originalFileName,
            'uri' => $newFileName,
        ]);


        $up_p = Petition::where('id', $p_id)->get();

        $p_u_id = $up_p[0]->user_id;

        $up_p[0]->receiver = $p_u_id;
        $up_p[0]->status = 5;
        $up_p[0]->document_id = $ansdoc->id;

        $up_p[0]->save();

        return Redirect::to('/department/sentpetitions');

    }
}
