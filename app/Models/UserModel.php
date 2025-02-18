<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
    protected $table='userbase';
    // TABLE NAME, CHANGE IF TABLE CHANGED
    protected $primaryKey='id';
    // Primary key 
    protected $useAutoIncrement = true;
    protected $useSoftDeletes=true;
    protected $allowedFields=['name',"email","password","created_at","deleted_at"];
    protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;
    // We allow the use of time (date + currentTime)
    protected $useTimestamps=false;
    
    // Validation 
    protected $skipValidation       = false;
    // VALIDATION RULES DROOL, "valid" is not valid... ETC
    // protected $validationRules      = ["'name'.length()>4",'"email".length()>8','"email".contains(@)'];
    // protected $validationMessages   = ["You need to set a longer name","You need a longer email length","Email needs to have an @"];
    protected $allowCallbacks = true;

    // Fields to update/create to
    /**
    *   Método personalizado para encontrar un usuario por correo electrónico.
    *   @param string $email El correo que se desea buscar
    *   @param array|null Retorna un array con los datos del usuario si lo encuentra, o null si no existe.
     */
    public function showAll(){
        return $this->withDeleted()->findAll();
    }
    public function findByEmail(string $email){
        return $this->where('email',$email)->first();
    }
    // public function findByName(string $name){
    //     return $this->where('name',$name)->findAll();
    // }
    // public function findByPassword(string $pasw){
    //     return $this->where('password',$pasw)->findAll();
    // }
    // public function findByCreation(string $created){
    //     return $this->where('creation_at',$created)->findAll();
    // }
    // public function findByDeletion(string $delete){
    //     return $this->where('deleted_at',$delete)->findAll();
    // }
    // public function findByDeletion(){
    //     return $this->onlyDeleted()->findAll();
    // }
}