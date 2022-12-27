<?php
class adminController {
  
    public function login() {
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $log = new adminModel;
        $user = $log->login($username, $password);
        if ($user) {
            // Login successful: set session variable and redirect to protected page
            $_SESSION['logged_in'] = true;
            header('Location: dashbo');
            exit;
        } else {
            // Login unsuccessful: display error message
             echo 'Invalid username or password';        }
      }
      
    }
  }
  