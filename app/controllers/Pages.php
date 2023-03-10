<?php
  class Pages extends Controller {
    private $croisierModel;
    private $iténairaireModel;
    private $navireModel;
    private $portModel;
    
    public function __construct(){
      $this->croisierModel = $this->model('croisier');
      $this->iténairaireModel = $this->model('iténairaire');
      $this->portModel = $this->model('Port');
      $this->navireModel = $this->model('navire');
    }

    
    public function index(){
      $this->view('pages/index');
    }

    public function about(){
      $this->view('pages/about');
    }
        public function cruis(){
          if(isset($_POST['submit'])){
            if(empty( $_POST['port']) AND empty( $_POST['date']) AND empty($_POST['navire'])){
              $Navire = $this->navireModel->getNavire();
              $port = $this->portModel->getPorts();
    
              $croisier = $this->croisierModel->getCroisier();
            //   foreach ($croisier as $key => $cr) {
            //     $croisier[$key]->iténairaire = $this->iténairaireModel->getiténairaire($croisier[$key]->id);
            // }
            $data = [
              'port' => $port,
              'Navure' => $Navire,
              'croisier' => $croisier,
    
          ];
          $this->view('pages/cruis',$data);
        }
          else{
            $filtre=[
              'port'=> $_POST['port'],
              'date'=> $_POST['date'],
              'navire'=> $_POST['navire'],
            ];
            $croisier = $this->croisierModel->getCroisierbyfiltre($filtre);
            $Navire = $this->navireModel->getNavire();
          $port = $this->portModel->getPorts();

          $data = [
            'port' => $port,
            'Navure' => $Navire,
            'croisier' => $croisier,
  
        ];
        $this->view('pages/cruis',$data);}
          }
          else{
          $Navire = $this->navireModel->getNavire();
          $port = $this->portModel->getPorts();

          $croisier = $this->croisierModel->getCroisier();
        //   foreach ($croisier as $key => $cr) {
        //     $croisier[$key]->iténairaire = $this->iténairaireModel->getiténairaire($croisier[$key]->id);
        // }
        $data = [
          'port' => $port,
          'Navure' => $Navire,
          'croisier' => $croisier,

      ];
      $this->view('pages/cruis',$data);
    }
    }     public function contactUs(){
      $this->view('pages/contactUs');
    }
    public function dashboard(){
      if(isLoggedIn() && $_SESSION['is-admin']==1){
       $this->view('dashboard/index');
      }elseif(isLoggedIn() && !$_SESSION['is-admin']==1){
        $this->view('pages/404');
      }
      else{
        redirect('users/login');
      }
      
    }
    public function reserve(){
      if(isLoggedIn() && $_SESSION['is-admin']==0){
       $this->view('reserve/index');
      }elseif(isLoggedIn()){
        $this->view('pages/404');
      }
      else{
        redirect('users/login');
      }
      
    }
  }