<?php
class filter extends Controller{
    private $portModel;
    private $navireModel;
    private $chambreModel;
    private $croisierModel;
    public function __construct()
    {
        $this->portModel = $this->model('Port');
        $this->navireModel = $this->model('navire');
        $this->chambreModel = $this->model('chambre');
        $this->croisierModel = $this->model('croisier');
        
    }
    public function data(){
        
    }
} 
