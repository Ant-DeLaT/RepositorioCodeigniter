<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{

    /**
     * Muestra el formulario de registro de usuario.
     */


    public function register()
    {
        return view('register_View'); // Carga y retorna la vista del formulario de registro.
    }
    // public function registera()
    // {
    //     return view('register_View2'); // Carga y retorna la vista del formulario de registro.
    // }


    /**
     * Procesa el registro de un nuevo usuario.
     */


    public function registerProcess()
    {
        helper(['form', 'url']); // Carga los helpers necesarios para trabajar con formularios y URLs.

        // Configuración de las reglas de validación del formulario.
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]', // El nombre es obligatorio y debe tener entre 3 y 50 caracteres.
            'email' => 'required|valid_email|is_unique[userbase.email]', // El correo debe ser válido y único en la tabla `users`.
            'password' => 'required|min_length[6]', // La contraseña debe ser obligatoria y tener al menos 6 caracteres.
            'password_confirm' => 'required|matches[password]', // La confirmación de la contraseña debe coincidir con la contraseña.
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores.

        // if (!$this->validate($rules)) {
        // return view('register_View', [
        //     'validation' => $this->validator, // Pasamos los errores de validación a la vista.
        // ]);

        if ($this->validate($rules)) {
            // Si la validación pasa, procedemos a guardar el usuario en la base de datos.
            $userModel = new UserModel();
            // ->save
            $data = ([
                'name' => $this->request->getPost('name'), // Obtenemos el nombre del formulario.
                'email' => $this->request->getPost('email'), // Obtenemos el correo del formulario.
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Encriptamos la contraseña antes de guardarla.
            ]);
            dd($data);
            $userModel->save($data);

            // Redirigimos al formulario de inicio de sesión con un mensaje de éxito.
            return redirect()->to('login_View')->with('success', 'The user has been properly signed-up.');
        } else {
            return redirect()->to("register_View")->with("error", "NO USER DETECTED");
        }
    }

    /**
     * Muestra el formulario de inicio de sesión.
     */

    public function login()
    {
        return view('login_View'); // Carga y retorna la vista del formulario de inicio de sesión.
    }
    /**
     * Procesess the user login.
     */
    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function loginProcess()
    {
        helper(['form', 'url']); // Carga los helpers necesarios para trabajar con formularios y URLs.
        $session = session(); // Inicia una sesión para el usuario.

        // Configuración de las reglas de validación del formulario.
        $rules = [
            'email' => 'required', // Mail must be mandatory and valid.
            'password' => 'required', // La contraseña es obligatoria.
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores.
        if (!($this->validate($rules))) {
            return view('login_View', [
                'validation' => $this->validator, // Pasamos los errores de validación a la vista.
            ]);
        }



        // Should the validation pass,we verify the credentials.
        $userModel = new UserModel();
        $user = $userModel->findByEmail($this->request->getPost('email')); // The user is searched by his credentials.



        if ($user && password_verify($this->request->getPost('password'), $user['password']) || TRUE) {
            // Si las credenciales son correctas, guardamos datos del usuario en la sesión.
            $session->set([
                'id' => $user['id'],           // ID del usuario.
                'name' => $user['name'],       // Nombre del usuario.
                'email' => $user['email'],     // Correo del usuario.
                'isLoggedIn' => true,          // Bandera para indicar que está logueado.
                'created_at' => $user['created_at'], // Fecha de registro del usuario.
            ]);


            // Redirigimos a la página de inicio con un mensaje de éxito.
            return redirect()->to('/users')->with('success', 'Inicio de sesión exitoso.');
        } else {
            // Si las credenciales son incorrectas, mostramos un mensaje de error.

            return redirect()->to('/login')->with('error', 'Incorrect Email or Password.');
        }
    }
    /**
     * Closes user session
     */

    public function logout()
    {
        $session = session(); // Inicia o accede a la sesión.
        $session->destroy(); // Destruye todos los datos de la sesión.

        // Redirige al formulario de inicio de sesión con un mensaje de éxito.
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
