<?php
require_once './app/models/Task.php';

echo $bonjour;

class TaskController {
    private $taskModel;

    public function __construct() {
        // Connexion à la base de données
        $dsn = 'mysql:host=localhost;dbname=todolist';
        $username = 'root';
        $password = '';
        $this->db = new PDO($dsn, $username, $password);
        $this->taskModel = new Task($this->db);
    }

    // Afficher toutes les tâches et gérer les actions utilisateur
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ajout de la tâche
            if (!empty($_POST['task_name'])) {
                $this->taskModel->addTask($_POST['task_name']);
            }
        }

        // Récupérer les tâches
        $tasks = $this->taskModel->getAllTasks();

        // Charger la vue
        require_once './app/views/taskList.php';
    }

    // Supprimer une tâche
    public function delete($taskId) {
        $this->taskModel->deleteTask($taskId);
        header('Location: index.php');
    }
}
?>
