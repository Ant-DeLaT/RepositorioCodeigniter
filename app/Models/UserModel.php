<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
    protected $table='users';
    // Nombre tabla
    protected $primaryKey='id';
    // Clave primaria 
    protected $useTimestamps=true;
    // Habilitamos el uso de las marcas de tiempo automáticas (created_at, updated_at)
    protected $allowedFields=['name',"email","password","created_at"];
    // Campos permitidos para insetar/actualizar
    /**
    *   Método personalizado para encontrar un usuario por correo electrónico.
    *   @param string $email El correo que se desea buscar
    *   @param array|null Retorna un array con los datos del usuario si lo encuentra, o null si no existe.
    */
    public function findByEmail(string $email){
        return $this->where('email',$email)->first();
    }
}