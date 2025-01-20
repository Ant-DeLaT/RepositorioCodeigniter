<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
    protected $table='users';
    // Nombre tabla
    protected $primaryKey='id';
    // Clave primaria
    protected $allowedFields=['name',"email"];
    // Campos permitidos para insetar/actualizar
}