<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
use App\Models\User;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;



    protected $rules = [
        'titulo' => 'required|string',
        'salario'=> 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos ['imagen'] = str_replace('public/vacantes','', $imagen);

        //Crear vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario' => $datos ['salario'],
            'categoria'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'descripcion'=> $datos['descripcion'],  
            'imagen'=> $datos['imagen'],
            'user_id' => auth()->user()->id

        ]);

        //Mostrar mensaje de creación de la vacante

        session()->flash('mensaje','La Vacante se publicó correctamente');


        //Redireccionar al usuario

        return redirect()->route('vacantes.index');
    }
    public function render()
    {
        return view('livewire.crear-vacante');
    }
}
