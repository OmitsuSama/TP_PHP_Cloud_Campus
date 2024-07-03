<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module de Commentaire</title>
    <style>
        /* Amélioration de la mise en forme */
        .comment-section {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .comment {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .comment img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
        }
        .comment h4 {
            margin: 0;
            font-size: 1.2em;
        }
        .comment p {
            margin: 0;
            font-size: 1em;
        }
        .comment time {
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="comment-section">
        <h2>Laissez un commentaire</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="pseudo">Pseudo:</label><br>
            <input type="text" id="pseudo" name="pseudo" required><br><br>
            <label for="avatar">Avatar:</label><br>
            <input type="file" id="avatar" name="avatar" accept="image/*"><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>
            <input type="submit" name="submit" value="Envoyer">
        </form>
        <h2>Commentaires</h2>
        <?php include 'comments.php'; ?>
    </div>
</body>
</html>
