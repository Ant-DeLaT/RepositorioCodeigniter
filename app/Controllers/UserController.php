<?php
// include "conn.php";
namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController{

// REMINDER, CHECK "Language/en" TO SWAP REGULAR WARNINGS!


    public function index() {
        helper("form");
        $query=new UserModel();$userModel=new UserModel();
        // The request getVar uses "name" not "id"
        $name=$this->request->getVar('whName');//Búsqueda desde formulario
        $email=$this->request->getVar('whEmail');
        $password=$this->request->getVar('whPassword');
        $email=$this->request->getVar('whEmail');
        // Aplicar filtro (query) con un nombre introducido
        if(!empty($name)){
            $query=$query->like('name',$name);
        }
        if(!empty($email)){
            $query=$query->like("email",$email);
        }
        if(!empty($password)){
            $query=$query->like("password",$password);
        }
       
        // if($email){
        //     $query2=$userModel->like('email',$email);
        // }else{
        //     $query2=$userModel->like("email");
        // }
            // $recover=[$query->get(),$query2->get()];
            // $result=$query->get();

        // $perPage=10;
        $perPage=3; //New perPage number: 3 elements for page
        // $data['users']=$userModel->findAll(); //Finds all users
        // ,$query2->get(),$query->paginate($perPage)
        $data['users']=$query->paginate($perPage);
        $data['pager']=$query->pager;//Adds paginate (pager) to the view
        $data["name"]=$name; //Keeps the search term inside the view
        $data["email"]=$email;
        return view('dashboard_View',$data);
    }
    public function saveUser($id=null){
        $userModel=new UserModel(); //Creates a new instance of "UserModel"
//  GO THROUGH USER MODEL, NEEDS TO BE REDONE, CHECK VALIDATIONS

        helper(['form',"url"]); // Adds a helper file into a directory; 
        // this one helps to manage both forms (get,post) and urls from different pages
        
        $data['user']=$id? $userModel->find($id):null;
        
        if($this->request->getMethod()=="POST"){

            //Validation rules
            $validation= \Config\Services::validation();
            $validation->setRules([
                "name"=>'required|min_length[3]|max_length[50]',
                // BE CAREFUL, EMAIL REQUIRES TABLE 
                "email"=>'required|valid|is_unique[userbase.email]',
                "password"=>'required|min_length[3]|max_length[50]',
            ]);
            // if Removed verifications, program works
            // if (!$validation->withRequest($this->request)->run()) {
                //Shows errors with the validation
            //     $data['$validation']=$validation;
            // }else{
                $userData=[
                    'name'=>$this->request->getPost('name'),
                    'email'=>$this->request->getPost('email'),
                    'password'=>$this->request->getPost('password'),
                    'role'=>$this->request->getPost('role')
                ];
                if(isset($id)){
                    // Actualizar usuario existente
                    // Update current user
                    $userModel->update($id,$userData);
                    // $userModel->save($userData,$id);
                    $message='Usuario actualizado correctamente.';
                }else{
                    // Create a new user
                    $userModel->save($userData);
                    $message='Usuario creado correctamente.';
                }
                // Redirigir al listado con un mensaje de éxito
                // Reroute to the list with a new success message
                return redirect()->to('/users')->with('success',$message);
                }
            // }
        return view('user_formView',$data);
    }
    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function delete($id)  {
        $userModel=new UserModel();
        $userModel->where('id',$id)->delete(); //Eliminar usuario
        // $userData=[
        //     'deleted_at'=>$this->request->getPost("current_timestamp()")
        // ];
        // $userModel->update($id,$userData["deleted_at"]);
        return redirect()->to('/users')->with('success','Usuario eliminado correctamente');
    }
    public function restore($id)  {
        $userModel=new UserModel();
        $userModel->where('id',$id)->update( ["deleted_at"=>null]); //Eliminar usuario
        // $sql="UPDATE userbase SET deleted_at=null WHERE id=$id";
        // if($conn->query($sql)===TRUE){
        //     log_message("info","user restored");
        // }else{
        //     log_message("debug","user not restored");
        // }
        // $userData=[
        //     'deleted_at'=>$this->request->getPost("current_timestamp()")
        // ];
        // $userModel->update($id,$userData["deleted_at"]);
        return redirect()->to('/users')->with('success','Usuario eliminado correctamente');
    }

}