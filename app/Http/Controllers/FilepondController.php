<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    public function index()
    {
        $data['article'] = Article::orderByDesc('id')->limit(10)->get();
        return view('filepond.index', $data);
    }

    public function create()
    {
        return view('filepond.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'file' => 'required|string',
            'attachment' => 'array',
            'attachment.*' => 'string',
        ]);
        if ($request->has('file')) :
            $fileTmp = $request->file;
            $newPath = 'article/' . now()->format('Y/m/');
            $filePath = $newPath . basename($fileTmp);
            Storage::disk('public')->put($filePath, Storage::get($fileTmp));
            Storage::delete($fileTmp);
        endif;

        $attachments = [];
        if ($request->has('attachment')) :
            foreach ($request->attachment as $attachmentTmp) :
                $attachmentPath = $newPath . basename($attachmentTmp);
                Storage::disk('public')->put($attachmentPath, Storage::get($attachmentTmp));
                Storage::delete($attachmentTmp);
                $attachments[] = $attachmentPath;
            endforeach;
        endif;

        Article::create([
            'title' => $request->title ?? null,
            'content' => $request->content ?? null,
            'file' => $filePath ?? null,
            'attachment' => json_encode($attachments) ?? null,
        ]);
        return redirect()->route('filepond.index');
    }

    public function upload(Request $request): string
    {
        $files = $request->allFiles();
        if (empty($files)) :
            abort(422, 'No files were uploaded.');
        endif;
        if (count($files) > 1) :
            abort(422, 'Only 1 file can be uploaded at a time.');
        endif;
        $requestKey = array_key_first($files);
        $file = is_array($request->input($requestKey)) ? $request->file($requestKey)[0] : $request->file($requestKey);
        return $file->storeAs(
            path: 'tmp',
            name: now()->format('YmdHis') . '-' .  Str::random(20) . '.' . $file->extension()
        );
    }

    public function show($id)
    {
        $data['article'] = Article::where('id', $id)->first();
        return view('filepond.show', $data);
    }
}
