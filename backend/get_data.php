<?php
include("database.php");
// Establish database connection

// Get current day and time
$day = date('N'); // Returns 1 (Monday) through 7 (Sunday)
$time = date('H:i:s');


// Build the SQL query to fetch data from the database
$sql = "SELECT s.vards AS skolotaja_vards, s.uzvards AS skolotaja_uzvards, 
sn.vards AS skolnieka_vards, sn.uzvards AS skolnieka_uzvards,
k.kabinets, k.sākums, k.beigas
FROM Konsultācija k
JOIN skolotajs s ON k.skolotajs_id_fk = s.skolotajs_id
JOIN pieteikums p ON k.konsultācija_id = p.id_konsultacijas
JOIN skolnieks sn ON p.id_skolnieks = sn.skolnieks_id
WHERE k.laiks = CURRENT_DATE();
";

// Execute the SQL query and retrieve the data
try{
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
  echo "<table><tr><th>Konsultācija ID</th><th>Iela</th><th>Kabinets</th><th>Laiks</th><th>Sākums</th><th>Beigas</th><th>Skolotāja vārds</th><th>Skolotāja uzvārds</th><th>Skolotāja epasts</th></tr>";
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>".$row["konsultācija_id"]."</td><td>".$row["iela"]."</td><td>".$row["kabinets"]."</td><td>".$row["laiks"]."</td><td>".$row["sākums"]."</td><td>".$row["beigas"]."</td><td>".$row["vards"]."</td><td>".$row["uzvards"]."</td><td>".$row["epasts"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "Nav atrasta neviena konsultācija.";
}
} catch(PDOException $e) {
echo "Kļūda: " . $e->getMessage();
}

?>
