<?php

namespace App\Http\Controllers;

use App\Models\Datamember;
use Illuminate\Http\Request;

class DatamemberController extends Controller
{
    public function index()
    {
        $members = Datamember::latest()->get();
        return view("datamember.index", compact("members"));
    }

    public function create()
    {
        return view("datamember.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nama" => "required|string|max:255",
            "email" => "required|email|unique:datamember,email",
            "no_hp" => "required|string|max:30",
            "jenis_membership" => "required|in:harian,bulanan,tahunan",
            "tanggal_daftar" => "required|date",
            "tanggal_berakhir" => "required|date|after_or_equal:tanggal_daftar",
            "status" => "required|in:aktif,nonaktif",
        ]);

        Datamember::create($data);

        return redirect()->route("datamember.index")
            ->with("success", "Member berhasil ditambahkan");
    }

    public function edit(Datamember $datamember)
    {
        return view("datamember.edit", compact("datamember"));
    }

    public function update(Request $request, Datamember $datamember)
    {
        $data = $request->validate([
            "nama" => "required|string|max:255",
            "email" => "required|email|unique:datamember,email," . $datamember->id,
            "no_hp" => "required|string|max:30",
            "jenis_membership" => "required|in:harian,bulanan,tahunan",
            "tanggal_daftar" => "required|date",
            "tanggal_berakhir" => "required|date|after_or_equal:tanggal_daftar",
            "status" => "required|in:aktif,nonaktif",
        ]);

        $datamember->update($data);

        return redirect()->route("datamember.index")
            ->with("success", "Data berhasil diperbarui");
    }

    public function destroy(Datamember $datamember)
    {
        $datamember->delete();

        return redirect()->route("datamember.index")
            ->with("success", "Data berhasil dihapus");
    }
}
