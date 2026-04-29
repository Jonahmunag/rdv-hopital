<?php
require_once '../core/Model.php';

class RendezVous extends Model {

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM rendezvous");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nom, $medecin, $date, $heure) {
        $sql = "INSERT INTO rendezvous (nom_patient, medecin, date_rdv, heure_rdv)
                VALUES (?, ?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nom, $medecin, $date, $heure]);
    }

    public function delete($id) {
        $sql = "DELETE FROM rendezvous WHERE id = ?";
        return $this->pdo->prepare($sql)->execute([$id]);
    }

    public function search($nom) {
    $sql = "SELECT * FROM rendezvous WHERE nom_patient LIKE ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(["%$nom%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function find($id) {
        $sql = "SELECT * FROM rendezvous WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nom, $medecin, $date, $heure) {
        $sql = "UPDATE rendezvous 
                SET nom_patient = ?, medecin = ?, date_rdv = ?, heure_rdv = ?
                WHERE id = ?";
        return $this->pdo->prepare($sql)->execute([$nom, $medecin, $date, $heure, $id]);
    }

    public function statsParJour() {
    $sql = "SELECT date_rdv, COUNT(*) as total 
            FROM rendezvous 
            GROUP BY date_rdv";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function statsParMedecin() {
    $sql = "SELECT medecin, COUNT(*) as total 
            FROM rendezvous 
            GROUP BY medecin";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function statsParHeure() {
    $sql = "SELECT HOUR(heure_rdv) as heure, COUNT(*) as total 
            FROM rendezvous 
            GROUP BY heure";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
 }
}