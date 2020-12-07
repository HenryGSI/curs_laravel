<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //por defecto si el modelo se llama 'Project', eloquent buscara la base de datos 'projects'
    //protected $table = 'projects';

    //para poder añadirlas masivamente
    //protected $fillable = ['title', 'url', 'description'];

    protected $guarded = [];



    /*
     Con Route Model Bind si queremos buscar por nombre en lugar de por $id tendriamos que modificar la funcion
     getRouteKeyName de la classe Model

    */

    public function getRouteKeyName(){

        return 'url';
    }
}
