<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Http\Controllers\EtudiantController;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['prenom','nom','classe','email'];
}
