<?php
class Dashboard extends Controller
{
    private $portModel;
    private $navireModel;
    private $chambreModel;
    private $croisierModel;
    private $iténairaireModel;

    public function __construct()
    {
        $this->portModel = $this->model('Port');
        $this->navireModel = $this->model('navire');
        $this->chambreModel = $this->model('chambre');
        $this->croisierModel = $this->model('croisier');
        $this->iténairaireModel = $this->model('iténairaire');
        
    }
    public function index()
    {

        $port = $this->portModel->getPorts();
        $croisier = $this->croisierModel->getCroisier();

        foreach ($croisier as $key => $cr) {
            $croisier[$key]->iténairaire = $this->iténairaireModel->getiténairaire($croisier[$key]->id);
        }

        // echo '<pre>';
        // var_dump($croisier);
        // die();
        $Navire = $this->navireModel->getNavire();

        $data = [
            'port' => $port,
            'Navure' => $Navire,
            'croisier' => $croisier,

        ];

        $this->view('dashboard/index', $data);
    }
    public function addPort()
    {
        if (isset($_POST['addPort'])) {
            $data = array(
                'portName' => $_POST['portName'],
                'country' => $_POST['country'],
            );
            $result = $this->portModel->add($data);
            if ($result === 'ok') {
                header('Location:dashboard/index');
            } else {
                echo $result;
            }
        }
    }
    public function deleteport()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $result = $this->portModel->deletePort($id);
        }
        if ($result === 'ok') {
            header('Location:dashboard/index');
        } else {
            echo $result;
        }
    }
    public function deletenavire()
    {
        if (isset($_POST['deleteN'])) {
            $id = $_POST['id'];
            $result = $this->navireModel->deleteNavire($id);
        }
        if ($result === 'ok') {
            header('Location:dashboard/index');
        } else {
            echo $result;
        }
    }
    public function addnavire()
    {
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $NAV = $_POST['shipName'];
            $navire = $this->navireModel->addNavire($NAV);
            if ($navire = 'ok') {
                $ship = $_POST['shipName'];
                for ($i = 0; $i < count($_POST['chambreNum']); $i++) {
                    // Validate the form inputs
                    $data = array(
                        'chambreNum' => $_POST['chambreNum'][$i],
                        'chambreType' => $_POST['chambreType'][$i],

                    );

                    $res = $this->chambreModel->addChambre($data, $ship);
                }
                if ($res === 'ok') {
                    header('Location:dashboard/index');
                } else {
                    echo $res;
                }
            } else {
                echo $navire;
            }
        }
    }

    public function addcroisier()
    {
        
        $datta = array(
            'CruiseName' => $_POST['CruiseName'],
            'Price' => $_POST['Price'],
            'Image' => $_POST['Image'],
            'NightsNumber' => $_POST['NightsNumber'],
            'StartingDate' => $_POST['StartingDate'],
            'navireId' => $_POST['navireId'],
            'portID' => $_POST['portID'],

        );

        $Cr = $this->croisierModel->addCroisier($datta);
        if ($Cr = 'ok') {
            echo count($_POST['iténairairePortNum']);
            // echo "<pre>";
            // var_dump($_POST['iténairairePortNum']);
            // echo "</pre>";
            
            $CruiseName = $_POST['CruiseName'];
            for ($i = 0; $i < count($_POST['iténairairePortNum']); $i++) {
                // Validate the form inputs
                $data = array(
                    'iténairairePortNum' => $_POST['iténairairePortNum'][$i],
                    'iténairairePort' => $_POST['iténairairePort'][$i],
                    
                );
                $res = $this->iténairaireModel->addIténairaire($data, $CruiseName);
            }
            if ($res === 'ok') {
                header('Location:dashboard/index');
            } else {
                echo $res;
            }
        } else {
            echo $Cr;
        }
    }
    public function deleteCroisier(){
        if (isset($_POST['deleteC'])) {
            $id = $_POST['id'];
            $result = $this->croisierModel->deletecroisier($id);
        }
        if ($result === 'ok') {
            header('Location:dashboard/index');
        } else {
            echo $result;
        }
    }
}