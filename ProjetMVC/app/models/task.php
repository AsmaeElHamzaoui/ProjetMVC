<?php
class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Ajouter une tâche
    public function addTask($taskName) {
        $stmt = $this->db->prepare("INSERT INTO tasks (name) VALUES (:name)");
        $stmt->bindParam(':name', $taskName);
        $stmt->execute();
    }

    // Obtenir toutes les tâches
    public function getAllTasks() {
        $stmt = $this->db->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Supprimer une tâche
    public function deleteTask($taskId) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $taskId);
        $stmt->execute();
    }
}
?>
