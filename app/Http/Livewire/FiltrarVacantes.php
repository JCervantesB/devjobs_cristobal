<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    public function leerDatosFormulario()
    {
       $this->emit('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
       //dd($this->termino, $this->categoria, $this->salario);
    }
    public function render()
    {
        $vacantes = Vacante::all();
        return view('livewire.filtrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
