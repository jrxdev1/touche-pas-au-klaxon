<?php

require_once __DIR__ . '/../../app/Models/User.php';

class AuthController {

    public function loginForm() 
    {
        require __DIR__ . '/../Views/login.php';
    }

    public function login()
    {
        session_start();

        $email = $_POST ['email'] ?? '';
        $password = $_POST ['password'] ?? '';
    
        $userModel = new User();
        $user = $userModel->findByEmail($email); //du fichier User.php

        if($user && password_verify($password, $user ['password'])) {
            //On mémorise que 'user' est $user qui correspond au mail car on a écrit : $user = $userModel->findByEmail($email);
            $_SESSION['user'] = $user;

            //header('Location: /touche_pas_au_klaxon/public/');
            var_dump($_SESSION);
            echo "Connexion réussie";
            exit;
        } else {
            $error = "Email ou mot de passe incorrect";
            require __DIR__ . '/../Views/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        //header('Location: /touche_pas_au_klaxon/public/');
        echo "Déconnexion réussie";
        exit;
    }
}
?>