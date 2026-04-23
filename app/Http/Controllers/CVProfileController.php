<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class CVProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = \App\Models\Profile::first();

        if (!$profile) {
            $profile = new \App\Models\Profile();
            $profile->nama = 'Ichwan Rizqi Agung';
            $profile->nim = '43240382';
            $profile->alamat = 'Jl. Balerante, Cirebon';
            $profile->email = 'ichwan1377@gmail.com';
            $profile->telepon = '082318942591';
            $profile->bio = 'Seorang pengembang web yang antusias dengan desain antar muka dan pengalaman pengguna.';
        }

        return view('welcome', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profile::where('nim', $request->nim)->first();
        $fotoPath = $profile ? $profile->foto : null;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            
            $fotoPath = $request->file('foto')->store('photos', 'public');
        }

        Profile::updateOrCreate(
            ['nim' => $request->nim],
            [
                'nama' => $request->name,
                'nim' => $request->nim,
                'foto' => $fotoPath,
                'email' => $request->email,
                'alamat' => $request->address,
                'bio' => $request->bio,
            ]
        );

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile-edit');
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

    /**
     * Menampilkan detail portofolio.
     */
    public function showPortofolio($slug)
    {
        if ($slug === 'web-design') {
            $data = [
                'title' => 'Web Design Project',
                'description' => 'Ini adalah detail dari proyek Web Design. Proyek ini melibatkan pembuatan antarmuka modern yang responsif dan berfokus pada kenyamanan pengguna.',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'Bootstrap']
            ];
            return view('portofolio-detail', compact('data'));
        }

        abort(404);
    }
}
