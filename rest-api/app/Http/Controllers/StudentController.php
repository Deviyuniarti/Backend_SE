<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        //jika data kosong maka kirim status code 204
        if ($students->isEmpty()){
            $data = [
                'message' => 'Resource is empty'
            ];

            return response()->json($data,204);

        }

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
        //validasi data request
        $request->validate([
            "nama"=> "required",
            "nim"=> "required",
            "email"=> "required|email",
            "jurusan"=> "required",
        ]);

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

        //jika data yang dicari tidak ada, kirim kode 404 
        if(!$student){
            $data = [
                "message" => "Data not found"
            ];
            return response()->json($data, 404);
        }

        $student->update([
            'nama'=> $request->nama ?? $student->nama,
            'nim'=> $request->nim ?? $student->nim,
            'email'=> $request->email ?? $student->email,
            'jurusan'=> $request->jurusan ?? $student->jurusan,
        ]);
        
        $data = [
            'message' => "Data is updated",
            'data' => $student,
        ];

        // Mengembalikan respons JSON dengan kode 200
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        //jika data yang dicari tidak ada, kirim kode 404
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

    public function show($id){
        $student = Student::find($id);
        //jika data yang dicari tidak ada, kirim kode 404
        if (!$student) {
            $data = [
                'message' => "Student not found",
            ];
            return response()->json($data, 404);
        }
        $data = [
            'message' => "show details of students",
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
}

    
