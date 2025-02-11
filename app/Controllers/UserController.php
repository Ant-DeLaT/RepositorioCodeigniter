<?php
// include "conn.php";
namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController{
    /**
     * @return [type]
     */
    public function index() {
        $userModel=new UserModel();
        $name=$this->request->getVar('name');//Búsqueda desde formulario
        // Aplicar filtro (query) con un nombre introducido
        if($name){
            $query=$userModel->like('name',$name);
        }else{
            $query=$userModel->like("name");
        }
        // $perPage=10;
        $perPage=3; //New perPage number: 3 elements for page
        // $data['users']=$userModel->findAll(); //Finds all users
        $data['users']=$query->paginate($perPage);
        $data['pager']=$userModel->pager;//Adds paginate (pager) to the view
        $data["name"]=$name; //Keeps the search term inside the view
        return view('dashboard_View',$data);
    }
    /**
     * @param mixed $id=null
     * 
     * @return [type]
     */
    public function saveUser($id=null){
        $userModel=new UserModel();
        helper(['form',"url"]); // Adds a helper file into a directory; 
        // this one helps to manage both forms (get,post) and urls from different pages
        
        $data['user']=$id? $userModel->find($id):null;
        
        if($this->request->getMethod()=="POST"){

            //Validation rules
            $validation= \Config\Services::validation();
            $validation->setRules([
                "name"=>'required|min_length[3]|max_length[50]',
                "email"=>'required|valid|is_unique[users.email]',
                "password"=>'required|min_length[3]|max_length[50]',
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                //Shows errors with the validation
                $data['validation']=$validation;
            }else{
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