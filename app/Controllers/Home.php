<?php

namespace App\Controllers;

// use CodeIgniter\Security\CheckPhpIni;

class Home extends BaseController
{
    public function index(): string
    {
        // return CheckPhpIni::run(false);
        // return view('welcome_message');
        // Llamada a la vista 
        return view('homeView');
    }
    public function getUsers()  {
        $userModel=new \App\Models\UserModel();
        // Usa el modelo para crear una variable que se pueda usar
        $users= $userModel->findAll(); //Obtiene todos los registros
        return view('user_listView',['users'=> $users]); 
    }
}
