<?php
class controllerShip
{
    public function getAllShip()
    {
        $ports = shipModel::getall();
        return $ports;
    }
    public function addShip()
    {
        if (isset($_POST['addship'])) {
            $data = array(
                'shipName' => $_POST['shipName'],
                'rooms' => $_POST['rooms'],
                'places' => $_POST['places'],

            );
            // $result=shipModel::add($data);

            $result = shipModel::add($data);
            if ($result === 'ok') {
                header('Location:dashboard');
            } else {
                echo $result;
            }
        }
    }
    public function deleteship()
    {
        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
            $DET = shipModel::delete($data);
            if ($DET === 'ok') {
                header('Location:dashboard');
            } else {
                echo $DET;
            }
        }
    }
}
$ship = new  controllerShip;
$ship->addShip();
$ships = $ship->getAllShip();
$ship->deleteship();
