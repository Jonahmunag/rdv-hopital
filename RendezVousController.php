<?php
require_once '../core/Controller.php';
require_once '../app/models/RendezVous.php';

class RendezVousController extends Controller {

    private $model;

    public function __construct() {
        $this->model = new RendezVous();
    }

    public function index() {

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $rdvs = $this->model->search($_GET['search']);
    } else {
        $rdvs = $this->model->getAll();
    }

    $this->view('rdv/index', ['rdvs' => $rdvs]);
}

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['nom']) && !empty($_POST['medecin'])) {
                $this->model->create(
                    $_POST['nom'],
                    $_POST['medecin'],
                    $_POST['date'],
                    $_POST['heure']
                );
            }

            header("Location: index.php?msg=Ajout réussi");
            exit;
        }

        $this->view('rdv/create');
    }

    public function delete($id) {

        if ($id && is_numeric($id)) {
            $this->model->delete($id);
            var_dump($id); die();
        }

        header("Location: index.php?msg=Supprimé");
        exit;
    }

    public function edit($id) {

        if (!$id) {
            die("ID invalide");
            var_dump($id); die();
        }

        $rdv = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->model->update(
                $id,
                $_POST['nom'],
                $_POST['medecin'],
                $_POST['date'],
                $_POST['heure']
            );

            header("Location: index.php?msg=Modifié");
            exit;
        }

        $this->view('rdv/edit', ['rdv' => $rdv]);
    }
}