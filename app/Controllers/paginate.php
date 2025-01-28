<?php

use App\Controllers\BaseController;
use App\Models\UserModel;
class Paginate extends  BaseController{
    public function index(){
        $userModel=new UserModel();
        $name=$this->request->getVar('name'); //Obtener el término de búsqueda desde el dominio
        // Aplicar filtro si se introduce un nombre
        if($name){
            $query=$userModel->like('name',$name);
        }
        
        // Configuración
        $perPage=10; //Número de elementos por página
        $data['users']=$query->paginate($perPage);
        $data['pager']=$userModel->pager;
        $data['name']=$name;
        return view("user_listView2",$data);
    }
}