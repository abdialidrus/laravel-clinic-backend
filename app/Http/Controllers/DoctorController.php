<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'license_number' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            //'photo' => 'required',
            'address' => 'required',
            'nik' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->license_number = $request->license_number;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->nik = $request->nik;
        $doctor->id_ihs = $request->id_ihs;

        if ($request->photo) {
            $doctor->photo = $request->photo;
        }
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    //show
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'license_number' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            //'photo' => 'required',
            'address' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->license_number = $request->license_number;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        if ($request->photo) {
            $doctor->photo = $request->photo;
        }
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
