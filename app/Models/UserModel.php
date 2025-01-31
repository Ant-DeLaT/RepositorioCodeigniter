<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
    protected $table='userbase';
    // TABLE NAME, CHANGE IF TABLE CHANGED
    protected $primaryKey='id';
    // Primary key 
    protected $useTimestamps=true;
    // We allow the use of time (date + currentTime)
    protected $allowedFields=['name',"email","password","created_at","deleted_at"];
    // Fields to update/create to
    /**
    *   Método personalizado para encontrar un usuario por correo electrónico.
    *   @param string $email El correo que se desea buscar
    *   @param array|null Retorna un array con los datos del usuario si lo encuentra, o null si no existe.
    */
    public function findByEmail(string $email){
        return $this->where('email',$email)->first();
    }
}