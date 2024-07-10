<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Login extends BaseController
{
    public function LoginPage()
    {
        return view('login');
    }

    public function autenticazione()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new CustomerModel();
        $utente = $model->where('email', $email)->first();

        if ($utente) {
            $pass = $utente['password'];
            $autenticazionePassword = password_verify($password, $pass);

            if ($autenticazionePassword) {
                $session_data = [
                    'id' => $utente['id'],
                    'company_name' => $utente['company_name'],
                    'email' => $utente['email'],
                    'first_name' => $utente['first_name'],
                    'surname' => $utente['surname'],
                    'logged_in' => TRUE
                ];
                $session->set($session_data);

                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Password non è corretta.');
                $session->setFlashdata('type', 'danger');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email non esiste.');
            $session->setFlashdata('type', 'danger');
            return redirect()->to('/login');
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

}
