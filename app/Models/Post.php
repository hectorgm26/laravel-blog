<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'articles';

    protected $fillable = ['title', 'body']; // Esto permite que Eloquent pueda asignar masivamente los campos title y body al crear o actualizar un registro. Es una forma de proteger los campos que se pueden asignar masivamente, evitando la asignacion masiva de campos no deseados.
    
    // De esta forma, articles sera el nombre de la tabla a que el ORM se intentara conectar. Si no se especifica, Eloquent asumira que la tabla es el nombre del modelo en plural (en este caso, posts).
}
