<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kpiController extends Controller
{
    public function index()
    {
        return view('kpi.index');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file_upload' => 'required|file|mimes:xlsx,csv',
        ]);

        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads',$fileName);
            return redirect()->back()->with('success','File "' . $fileName . '" berhasi diunggah!');
        }
        return redirect()->back()->with('error','Gagal mengunggah file.');
    }
}
