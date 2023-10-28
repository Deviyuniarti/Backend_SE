<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['Anjing', 'Kelinci'];
    public function index()
    {
        echo "Menampilkan data animals <br>";

        //loop property animals
        foreach ($this->animals as $animal)
            echo "-$animal <br>";
    }

    public function store(Request $request)
    {
        echo "Menambahkan hewan baru <br>";

        array_push($this->animals, $request->animal);

        //panggil method index
        $this->index();
    }

    public function update($id, Request $request)
    {
        echo "Mengupdate data hewan id $id. <br>";
        // update data di property animals 
        $this->animals[$id] = $request->animal;

        // panggil method index
        $this->index();
    }

    public function destroy($id)
    {
        echo "Menghapus data hewan id $id. <br>";

        unset($this->animals[$id]);

        $this->index();
    }
}
