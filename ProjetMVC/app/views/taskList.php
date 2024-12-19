<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Tâches</title>
</head>
<body>
    <h1>Liste des tâches</h1>
    
    <!-- Formulaire pour ajouter une tâche -->
    <form action="index.php" method="post">
        <input type="text" name="task_name" placeholder="Nom de la tâche" required>
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des tâches -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['name']); ?>
                <a href="index.php?action=delete&id=<?php echo $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
