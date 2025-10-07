<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "testbd";

// Connexion à la base
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erreur de connexion : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];

// Insertion dans la base
$sql = "INSERT INTO users (nom, email) VALUES ('$nom', '$email')";
if ($conn->query($sql) === TRUE) {
  echo "<h3>✅ Enregistrement réussi !</h3>";
} else {
  echo "Erreur : " . $conn->error;
}

// Affichage des données de la table
$result = $conn->query("SELECT * FROM users");
echo "<h2>Liste des utilisateurs :</h2>";
echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Email</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['id']}</td><td>{$row['nom']}</td><td>{$row['email']}</td></tr>";
}

echo "</table>";

$conn->close();
?>