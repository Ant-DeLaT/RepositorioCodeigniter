<?php
namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController{
    public function index() {
        $userModel=new UserModel();
        $name=$this->request->getVar('name');//Búsqueda desde formulario
        // Aplicar filtro (query) con un nombre introducido
        if($name){
            $query=$userModel->like('name',$name);
        }
        // $perPage=10;
        $perPage=3; //NUEVO NUMERO DE PAGINA: 3 elementos/pagina
        // $data['users']=$userModel->findAll(); //Obtener todos los usuarios
        $data['users']=$query->paginate($perPage);
        $data['pager']=$userModel->pager;// Pasar el objeto del paginador a la vista
        return view('user_listView2',$data);
    }
    public function saveUser($id=null){
        $userModel=new UserModel();
        helper(['form',"url"]);
        $data['user']=$id? $userModel->find($id):null;
        
        if($this->request->getMethod()=="POST"){

            //Reglas de validación
            $validation= \Config\Services::validation();
            $validation->setRules([
                "name"=>'required|min_length[3]|max_length[50]',
                "email"=>'required|valid|is_unique[users.email]'
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                //Mostrar errores de validacion
                $data['validation']=$validation;
            }else{
                $userData=[
                    'name'=>$this->request->getPost('name'),
                    'email'=>$this->request->getPost('email')
                ];
                if($id){
                    // Actualizar usuario existente
                    $userModel->update($id,$userData);
                    $message='Usuario actualizado correctamente.';
                }else{
                    // Crear nuevo usuario
                    $userModel->save($userData);
                    $message='Usuario creado correctamente.';
                }
                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/users')->with('success',$message);
                }
            }
        return view('user_formView',$data);
    }
    public function delete($id)  {
        $userModel=new UserModel();
        $userModel->delete($id); //Eliminar usuario
        return redirect()->to('/users')->with('success','Usuario eliminado correctamente');
    }
}