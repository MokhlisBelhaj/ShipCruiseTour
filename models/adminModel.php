<?php

class adminModel {
  public function login($email, $password){
    $admin = DB::connect()->prepare("SELECT * FROM admin WHERE `email` = `:username` and `password`= `:password`");
    $admin->bindParam(':username',$username);
    $admin->bindParam(':password',$password);
    $return=$admin->execute();
    if($return){
      
    }
    
}
}