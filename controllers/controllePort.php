<?php
include "./models/portModel";
class contollePort{
    public function getAllPort(){
        $ports= portModel::getall();
        return $ports;
    }
    public function addPort(){
        if(isset($_POST['addPort'])){
            $data=array(
                'portName'=>$_POST['portName'],
                'country'=>$_POST['country'],
            );
            // $result=portModel::add($data);
            
            $result=portModel::add($data);
            if($result==='ok'){
                header('Location:dashboard');
            }else{
                echo $result;
            }

        }
    }
    public function deletePort(){
        if(isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $DET= portModel::delete($data);
        if($DET==='ok'){
            header('Location:dashboard');
        }else{
            echo $DET;
        }
    }
    }
  



}

$port= new  contollePort();
$port->addPort();
 $Ports=$port->getAllPort(); 
 $port->deletePort();
