<?php
// include "conn.php";
namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController{

// REMINDER, CHECK "Language/en" TO SWAP REGULAR WARNINGS!


    public function index() {
        helper("form");
        $userModel = new UserModel();

        // Get filter parameters
        $name = $this->request->getVar('whName');
        $email = $this->request->getVar('whEmail');

        // Apply filters
        $query = $userModel;
        if (!empty($name)) {
            $query = $query->like('name', $name);
        }
        if (!empty($email)) {
            $query = $query->like('email', $email);
        }

        // Set up pagination
        $data = [
            'title' => 'Gestión de Usuarios',
            'name' => $name,
            'email' => $email
        ];

        // Get paginated results
        $perPage = 10; // Number of items per page
        $data['users'] = $query->paginate($perPage);
        $data['pager'] = $userModel->pager;

        return view('users', $data);
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
                "email" => 'required|valid_email|is_unique[userbase.email]',
                "password"=>'required|min_length[3]|max_length[50]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                //Shows errors with the validation
                $data['validation'] = $validation;
            } else {
                $userData=[
                    'name'=>$this->request->getPost('name'),
                    'email'=>$this->request->getPost('email'),
                    'password'=>$this->request->getPost('password'),
                    'role'=>$this->request->getPost('role')
                ];
                
                if(isset($id)){
                    // Update current user
                    $userModel->update($id,$userData);
                    $message='Usuario actualizado correctamente.';
                }else{
                    // Create a new user
                    $userModel->save($userData);
                    $message='Usuario creado correctamente.';
                }
                
                // Reroute to the list with a new success message
                return redirect()->to('/users')->with('success',$message);
            }
        }
        
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
        // $sql="UPDATE use rb ase SET deleted_at=null WHERE id=$id";
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

    public function metronic()
    {
        return view("/index.php");
    }
}