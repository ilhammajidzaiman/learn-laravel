<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
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
}
