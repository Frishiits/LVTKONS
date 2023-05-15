<?php
include("database.php");
// Establish database connection

// Get current day and time
$data = $_POST['date'];



// Build the SQL query to fetch data from the database
$sql = "SELECT s.vards AS skolotaja_vards, s.uzvards AS skolotaja_uzvards, 
sn.vards AS skolnieka_vards, sn.uzvards AS skolnieka_uzvards,
k.kabinets , k.sākums, k.beigas, k.iela as iela, k.laiks as datums
FROM Konsultācija k
JOIN skolotajs s ON k.skolotajs_id_fk = s.skolotajs_id
JOIN pieteikums p ON k.konsultācija_id = p.id_konsultacijas
JOIN skolnieks sn ON p.id_skolnieks = sn.skolnieks_id
WHERE k.laiks = '".$data."'
";

// Execute the SQL query and retrieve the data
try{
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
  echo "<table><tr><th>Iela</th><th>Kabinets</th><th>Vārds</th><th>Uzvārds</th></tr>";
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>".$row["iela"]."</td><td>".$row["kabinets"]."</td><td>".$row["skolnieka_vards"]."</td><td>".$row["skolnieka_uzvards"]."</td></tr>";
  }
  
  echo "</table>";
} else {
  echo "Nav atrasts neviens pieteikums konsultācijai.";
}
} catch(PDOException $e) {
echo "Kļūda: " . $e->getMessage();
}

?>
