<?php
class reserve extends Controller
{
    private $portModel;
    private $navireModel;
    private $chambreModel;
    private $croisierModel;
    private $iténairaireModel;
    private $reserveModel;
    public function __construct()
    {
        $this->portModel = $this->model('Port');
        $this->navireModel = $this->model('navire');
        $this->chambreModel = $this->model('chambre');
        $this->croisierModel = $this->model('croisier');
        $this->iténairaireModel = $this->model('iténairaire');
        $this->reserveModel = $this->model('Res');
    }
    public function index($id)
    {
        if (!isset($_POST['id'])) {
            $port = $this->portModel->getPorts();
            $croisier = $this->croisierModel->getCroisierById($id);
            // var_dump($croisier);
            // die();
            $chambre1 = $this->chambreModel->get_chambertyp1($id);
            $chambre2 = $this->chambreModel->get_chambertyp2($id);
            $chambre3 = $this->chambreModel->get_chambertyp3($id);
            foreach ($croisier as $key => $cr) {
                $croisier[$key]->iténairaire = $this->iténairaireModel->getiténairaire($croisier[$key]->id);
            }
            $Navire = $this->navireModel->getNavire();

            $data = [
                'port' => $port,
                'Navire' => $Navire,
                'croisier' => $croisier,
                'chambre1' => $chambre1,
                'chambre2' => $chambre2,
                'chambre3' => $chambre3,

            ];

            $this->view('reserve/index', $data);
        }
    }
    public function reserveCR()
    {
        $data = array(
            'id' => $_POST['id'],
            'user_id' => $_POST['user_id'],
            'date_depart' => $_POST['date_depart'],
            'itenairaire' => $_POST['itenairaire'],
            'chambreType' => $_POST['chambreType'],
            'chambre' => $_POST['chambre'],
            'prix' => $_POST['prix'],
        );
        $result = $this->reserveModel->reservation($data);
        if ($result === 'ok') {
            redirect('reserve/myreservation');
        } else {
            echo $result;
        }
    }
    public function annulation()
    {
        if (isset($_POST['annule'])) {
            $currentDate = date_create(date('y-m-d'));
            $cruiseDate = date_create($_POST['date']);
            if (isset($_POST['id']) && isset($_POST['date'])) {
                $ob = date_diff($cruiseDate, $currentDate);
                // die(var_dump($ob));
                if ($ob->y == 0 && $ob->m == 0 && $ob->d <= 2) {
                    $_SESSION['res_mess'] = "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vous ne pouvez pas annuler cette réservation car la date de départ est dans moins de 2 jours.',
                      })               
                    </script>";
                    redirect('reserve/myreservation');
                } else {
                    $id=$_POST['id'];
                    $result = $this->reserveModel->deletereserve($id);
                    if($result='ok'){
                    redirect('reserve/myreservation');
                }
                else{
                    echo $result;
                }
            }
            }
        }
    }
    public function myreservation()
    {
        $id = $_SESSION['user_id'];
        if (isset($_SESSION['res_mess'])) {
            echo "<div style='display : none'>jj</div>";
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo $_SESSION['res_mess'];
            unset($_SESSION['res_mess']);
        }

        $reservation = $this->reserveModel->getreservation($id);
        $this->view('reserve/myreservation', $reservation);
    }
}
