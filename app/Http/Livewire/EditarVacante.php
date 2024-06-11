<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\Vacante;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_actualizada;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario'=> 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_actualizada' => 'nullable|image|max:1024',
    ];

    public function mount (Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario;
        $this->categoria = $vacante->categoria;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse( $vacante-> ultimo_dia) ->format('Y-m-d');  
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;


    }

    public function editarVacante()
    {
        $datos = $this->validate();

        //Si se modifica la imagen

        if ($this->imagen_actualizada) {
            $imagen = $this->imagen_actualizada->store('public/vacantes') ;
            $datos['imagen'] = str_replace('public/vacantes/','', $imagen);


        }



        //Encontrar la vacante a editar

        $vacante = Vacante::find($this->vacante_id);

        //Asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario = $datos['salario'];
        $vacante->categoria = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen; //Si se ha modificado la imagen, guarda el valor nuevo, si no, se queda con el valor antiguo.


        

        //Guardar la vacante

        $vacante->save();
        session()->flash('mensaje','La vacante se actualizó correctamente');

        //Redireccionar
        return redirect()->route('vacantes.index');

        
    }
       



    public function render()
    {
        return view('livewire.editar-vacante');
    }
}
