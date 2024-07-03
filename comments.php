<?php
if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    $avatar = 'default.jpg'; // Image par défaut

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $pseudo)) {
        die('Pseudo invalide. Utilisez uniquement des lettres, des chiffres et des underscores.');
    }

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['avatar']['type'], $allowed)) {
            $avatar = uniqid() . '_' . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $avatar);
        } else {
            die('Type de fichier non supporté.');
        }
    }

    $date = date('d/m/Y H:i:s');
    $data = "$pseudo|$avatar|$message|$date\n";

    $file = fopen('comments.txt', 'a');
    fwrite($file, $data);
    fclose($file);
}

$comments = file('comments.txt');
$comments = array_reverse($comments); 

echo '<p>Il y a ' . count($comments) . ' commentaires.</p>';

foreach ($comments as $comment) {
    list($pseudo, $avatar, $message, $date) = explode('|', trim($comment));
    echo '<div class="comment">';
    echo '<img src="uploads/' . htmlspecialchars($avatar) . '" alt="Avatar">';
    echo '<h4>' . htmlspecialchars($pseudo) . '</h4>';
    echo '<time>' . htmlspecialchars($date) . '</time>';
    echo '<p>' . htmlspecialchars($message) . '</p>';
    echo '</div>';
}
?>
