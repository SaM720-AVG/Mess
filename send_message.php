<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : 'Anonyme';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Charger les messages existants
    $messages = [];
    if (file_exists('messages.json')) {
        $messages = json_decode(file_get_contents('messages.json'), true);
    }

    // Ajouter le nouveau message
    $messages[] = ['username' => $username, 'message' => $message];

    // Enregistrer les messages
    file_put_contents('messages.json', json_encode($messages));
}
?>
