<?php
class contolleCruise{
    public function getAllCruise(){
        $Navires= CruiseModel::getall();
        return $Navires;
    }
    public function addCruise(){
        if(isset($_POST['addNavire'])){
            $data=array(
                
            );
            
            $result=CruiseModel::add($data);
            if($result==='ok'){
                header('Location:dashboard');
            }else{
                echo $result;
            }

        }
    }
    public function deleteCruise(){
        if(isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        $DET= CruiseModel::delete($data);
        if($DET==='ok'){
            header('Location:dashboard');
        }else{
            echo $DET;
        }
    }
    }
  



}

$Cruise= new  contolleCruise();
$Cruise->addCruise();
 $Cruises=$Cruise->getAllCruise(); 
 $Cruise->deleteCruise();
