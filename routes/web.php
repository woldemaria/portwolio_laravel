<?php

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/skills', function () {
    return view('skills');
});

Route::get('/download-cv', function () {
    $path = storage_path('app/public/cv.pdf');
    if (! file_exists($path)) {
        $pdf = '%PDF-1.4
1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj
2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj
3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R /Resources << /Font << /F1 5 0 R >> >> >> endobj
4 0 obj << /Length 44 >>
stream
BT /F1 24 Tf 100 700 Td (Woldemariam Abi - Resume) Tj ET
endstream
endobj
5 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica >> endobj
xref
0 6
0000000000 65535 f
0000000009 00000 n
0000000058 00000 n
0000000115 00000 n
0000000266 00000 n
0000000360 00000 n
trailer << /Size 6 /Root 1 0 R >>
startxref
424
%%EOF';
        file_put_contents($path, $pdf);
    }

    return response()->download($path, 'Woldemariam_Abi_CV.pdf');
});

Route::post('/skills', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'category' => ['required', 'string', 'max:255'],
        'level' => ['required', 'string', 'max:255'],
        'icon' => ['nullable', 'string', 'max:255'],
    ]);

    Skill::create([
        'name' => $request->name,
        'category' => $request->category,
        'level' => $request->level,
        'icon' => $request->icon,
    ]);

    return back()->with('status', 'Skill added successfully.');
});

Route::get('/github', function () {
    return view('github');
});

Route::get('/resume', function () {
    return view('resume');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    \App\Models\Contact::create($request->only(['name', 'email', 'phone', 'message']));

    return back()->with('status', 'Message sent successfully.');
});

Route::get('/contacts', function () {
    $contacts = \App\Models\Contact::orderByDesc('created_at')->get();
    return view('contacts', compact('contacts'));
});

Route::get('/settings', function () {
    $settings = DB::table('portfolio_settings')->where('id', 1)->first();
    if (! $settings) {
        DB::table('portfolio_settings')->insert(['id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        $settings = DB::table('portfolio_settings')->where('id', 1)->first();
    }

    return view('settings', compact('settings'));
});

Route::post('/upload-images', function (Request $request) {
    $request->validate([
        'profile_image' => 'nullable|image|max:2048',
        'header_image' => 'nullable|image|max:2048',
        'additional_image' => 'nullable|image|max:2048',
    ]);

    $profilePath = null;
    $headerPath = null;
    $additionalPath = null;

    if ($request->hasFile('profile_image')) {
        $profilePath = $request->file('profile_image')->store('portfolio', 'public');
    }
    if ($request->hasFile('header_image')) {
        $headerPath = $request->file('header_image')->store('portfolio', 'public');
    }
    if ($request->hasFile('additional_image')) {
        $additionalPath = $request->file('additional_image')->store('portfolio', 'public');
    }

    $existing = DB::table('portfolio_settings')->where('id', 1)->first();

    if ($existing) {
        $update = [];
        if ($profilePath !== null) {
            $update['profile_image'] = $profilePath;
        }
        if ($headerPath !== null) {
            $update['header_image'] = $headerPath;
        }
        if ($additionalPath !== null) {
            $update['additional_image'] = $additionalPath;
        }
        $update['updated_at'] = now();
        DB::table('portfolio_settings')->where('id', 1)->update($update);
    } else {
        DB::table('portfolio_settings')->insert([
            'id' => 1,
            'profile_image' => $profilePath,
            'header_image' => $headerPath,
            'additional_image' => $additionalPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return back()->with('status', 'Images updated successfully.');
});
