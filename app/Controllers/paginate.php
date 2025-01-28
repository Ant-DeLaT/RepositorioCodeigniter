<?php

use App\Controllers\BaseController;
use App\Models\UserModel;
class Paginate extends  BaseController{
    public function index(){
        $userModel=new UserModel();
        $perPage=10; //Número de elementos por página
        $data['users']=$userModel->paginate($perPage);
        $data['pager']=$userModel->pager;
        return view("user_listView2",$data);
    }
}