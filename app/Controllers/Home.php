<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    public function index(): string|RedirectResponse
    {
        $session = session();

        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login first');
        }

        // Get user data from session
        $data = [
            'title' => 'Home',
            'user' => [
                'name' => $session->get('user_name'),
                'email' => $session->get('user_email'),
                'created_at' => $session->get('user_created_at')
            ]
        ];

        return view('index', $data);
    }

    public function create()
    {
        helper(['form']); //Carga un helper de formularios
        if ($this->request->getMethod() == 'POST') {
            $rules = [
                // PUEDE QUE SEAN COMILLAS SIMPLES
                "name" => 'required|min_length[3]|max_length[100]',
                // users TABLE OF USERS, CHANGE IF NEEDED
                "email" => 'required|valid_email|is_unique[users.email]'

            ];
            $messages = [
                "name" => [
                    'required' => 'El campo Nombre es obligatorio',
                    'min_length[3]' => 'El campo Nombre debe tener al menos 3 caracteres',
                    'max_length[100]' => 'El Nombre no debe ser superior a 100 caracteres.'
                ],
                "email" => [
                    'required' => 'El campo Correo Electrónico es obligatorio.',
                    'valid' => 'El correo electrónico no tiene un formato obligatorio',
                    // users TABLE OF USERS, CHANGE IF NEEDED
                    'is_unique[users.email]' => 'El correo electrónico ya está registrado'
                ]
            ];
            if (!$this->validate($rules, $messages)) {
                // Si las validaciones fallan, devuelve los errores
                return view('create_userView', [
                    'validation' => $this->validator
                ]);
            } else {
                // Si las validaciones pasan, guarda los datos
                $userModel = new \App\Models\UserModel();
                $userModel->save([
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email')
                ]);
                return redirect()->to('home');
                // redirige a la página principal
            }
        }
        return view('create_userView');
    }
    public function getUsers()
    {
        $userModel = new \App\Models\UserModel();
        // Usa el modelo para crear una variable que se pueda usar
        $users = $userModel->findAll(); //Obtiene todos los registros
        return view('user_listView', ['users' => $users]);
    }
}
