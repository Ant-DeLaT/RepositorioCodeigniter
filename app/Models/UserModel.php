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
    public function findByName(string $name){
        return $this->where('name',$name)->first();
    }
    public function findByPassword(string $pasw){
        return $this->where('password',$pasw)->first();
    }
    public function findByCreation(string $created){
        return $this->where('creation_at',$created)->first();
    }
    public function findByDeletion(string $delete){
        return $this->where('deleted_at',$delete)->first();
    }
}