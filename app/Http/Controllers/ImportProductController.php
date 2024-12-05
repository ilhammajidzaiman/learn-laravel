<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ProductImportService;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

final class ImportProductController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        // ProductImportService $productImportService
        $validated = $request->validate([
            'file' => 'required|string',
        ]);

        // Copy the file from a temporary location to a permanent location.
        $fileLocation = Storage::putFile(
            path: 'imports',
            file: new File(Storage::path($validated['file']))
        );

        // $productImportService->import(
        //     fileLocation: $fileLocation
        // );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'file' => $request->file,
        ];
        dd($data);
        return redirect()
            ->route('products.index')
            ->with('success', 'Products imported successfully');
    }

    // public function __invoke(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|string',
    //     ]);
    //     // dd($request->file);
    //     $tempPath = $request->file;
    //     $filePath = Storage::move($tempPath, 'imports/' . basename($tempPath));

    //     // Tambahkan logika import data file di sini...

    //     return redirect()->back()->with('success', 'File imported successfully.');
    // return redirect()
    //     ->route('products.index')
    //     ->with('success', 'Products imported successfully');
    // }
}
