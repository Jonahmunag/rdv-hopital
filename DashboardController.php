<?php
require_once '../core/Controller.php';
require_once '../app/models/RendezVous.php';

class DashboardController extends Controller {

    private $model;

    public function __construct() {
        $this->model = new RendezVous();
    }

    public function index() {

        $total = $this->model->countAll();
        $today = $this->model->todayCount();
        $recent = $this->model->lastRdv();

        $this->view('dashboard/index', [
            'total' => $total,
            'today' => $today,
            'recent' => $recent
        ]);
    }
}