<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification du mot de passe</title>
</head>
<body>
    <h2>Vous pouvez vérifier ici un mot de passe haché</h2>
    <form method="POST">
        <label for="password">Mot de passe en clair :</label><br>
        <input type="text" name="password" id="password" required><br><br>

        <label for="hash">Hash à vérifier :</label><br>
        <input type="text" name="hash" id="hash" required><br><br>

        <input type="submit" value="Vérifier">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        $hash = $_POST['hash'];

        if (password_verify($password, $hash)) {
            echo "<p style='color:green;'>✅ Le mot de passe est correct.</p>";
        } else {
            echo "<p style='color:red;'>❌ Le mot de passe ne correspond pas au hash.</p>";
        }
    }   //! $password_hash = password_hash($password, PASSWORD_DEFAULT);
    ?>
</body>
</html>