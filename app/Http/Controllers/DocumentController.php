<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function create(Request $request)
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        // Генерируем уникальное имя для хранения файла
        $storedName = uniqid() . '.' . $file->getClientOriginalExtension();

        // Сохраняем файл в папку uploads
        $path = Storage::disk('public')->putFileAs('uploads', $file, $storedName);

        // Сохраняем информацию о файле в базу данных
        Document::create([
            'document_name' => $file->getClientOriginalName(),
            // 'uri' => $storedName,
            'uri' => $path,
            // 'path' => $path,
        ]);

        return 'ok';
    }
}
