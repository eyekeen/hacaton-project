<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use Illuminate\Support\Facades\Redirect;

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
}
