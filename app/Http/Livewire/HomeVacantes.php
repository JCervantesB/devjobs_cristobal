<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['terminosBusqueda' =>'buscar' ];

    public function buscar($termino, $categoria, $salario){
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {

        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })->when($this->termino, function ($query) {
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })->when($this->categoria, function ($query) {
            $query->where('categoria', $this->categoria);
        })->when($this->salario, function ($query) {
            $query->where('salario', $this->salario);
        })
            ->paginate(3);

        return view('livewire.home-vacantes' , [
            'vacantes' => $vacantes

        ]);
    }
}
