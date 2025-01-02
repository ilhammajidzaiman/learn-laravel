<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['article'] = Article::orderByDesc('id')->limit(10)->get();
        return view('article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['article'] = Article::where('id', $id)->first();
        return view('article.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['article'] = Article::where('id', $id)->first();
        return view('article.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
