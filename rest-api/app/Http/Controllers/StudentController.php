<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        $data = [
            "message" => "Get all Student",
            "data" => $students
        ];

        //kirim data (json) dan response code 200
        return response()->json($data, 200);
    }

    //membuat method store
    public function store(Request $request)
    {
        //menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        //menggunakan model student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => "student is creates succesfully",
            'data' => $student,
        ];

        //mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        // Temukan siswa berdasarkan ID
        $student = Student::find($id);

        // Jika siswa tidak ditemukan, kembalikan respons error
        if (!$student) {
            $data = [
                'message' => "Student not found",
            ];
            return response()->json($data, 404);
        }

        // Update data siswa
        $student->nama = $request->input('nama');
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->jurusan = $request->input('jurusan');
        $student->save(); 

        $data = [
            'message' => "Student updated successfully",
            'data' => $student,
        ];

        // Mengembalikan respons JSON dengan kode 200
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => "Student not found",
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => "Student deleted successfully",
        ];

        return response()->json($data, 203);
    }
};
