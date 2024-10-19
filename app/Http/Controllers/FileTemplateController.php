<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileTemplateController extends Controller
{
    public function index()
    {
        $files = Storage::disk('public')->allFiles();

        return $files;
    }

    public function show()
    {
        $file = Storage::disk('public')->get('template.docx');

        return $u;

        return $file;
    }

    public function store()
    {
        Storage::disk('public')->put('test.txt', 'content');

        return 'stored';
    }

    public function delete()
    {
        Storage::disk('public')->delete('test.txt');

        return 'deleted';
    }
}
