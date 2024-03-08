<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id']; // Asegúrate de incluir todos los campos asignables

    
    public function comentarios()
    {
        return $this->hasMany(Comentario::class); // Asume que tienes un modelo Comentario
    }

    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class); // Asume que tienes un modelo Categoria
    }
}
