<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function checkAuth()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Haz login primero');
        }
        return true;
    }

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
            // dd($data);
            $userModel->save($data);

            // Redirigimos al formulario de inicio de sesión con un mensaje de éxito.
            return redirect()->to('login')->with('success', 'Registration successful. Please login.');
        } else {
            return view('register', [
                'validation' => $this->validator
            ]);
        }
    }

    /**
     * Muestra el formulario de inicio de sesión.
     */

    public function login()
    {
        $data = [
            'title' => 'Iniciar sesión'
        ];
        return view('login', $data); // Carga y retorna la vista del formulario de inicio de sesión.
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

        // Configuración de las reglas de validación del formulario.
        $rules = [
            'email' => 'required', // Mail must be mandatory and valid.
            'password' => 'required', // La contraseña es obligatoria.
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores.
        if (!($this->validate($rules))) {
            return view('login', [
                'validation' => $this->validator, // Pasamos los errores de validación a la vista.
            ]);
        }

        // Should the validation pass,we verify the credentials.
        $userModel = new UserModel();
        $user = $userModel->findByEmail($this->request->getPost('email')); // The user is searched by his credentials.



        if (!$user || !password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->to('/login')->with('error', 'Email o contraseña incorrectos.');
        }

        // Store complete user object in session
        $this->session->set('user', $user);
        $this->session->set('isLoggedIn', true);

        // Redirigimos a la página de inicio con un mensaje de éxito.
        return redirect()->to('/')->with('success', 'Se ha iniciado la sesión.');
    }
    /**
     * Closes user session
     */

    public function logout()
    {
        $this->session->destroy(); // Destruye todos los datos de la sesión.

        // Redirige al formulario de inicio de sesión con un mensaje de éxito.
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
