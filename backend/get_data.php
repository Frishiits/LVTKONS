<?php
include("database.php");
// Establish database connection

// Get the day and time parameters from the AJAX request
$day = $_GET['day'];
$time = $_GET['time'];

// Build the SQL query to fetch data from the database
$sql = "SELECT k.konsultācija_id, p.prieksmets, s.vards AS skolotaja_vards, s.uzvards AS skolotaja_uzvards, k.kabinets, k.sākums, k.beigas, COUNT(pi.pieteikums_id) AS dalībnieku_skaits
        FROM Konsultācija k
        JOIN prieksmets p ON k.prieksmets_id = p.prieksmets_id
        JOIN skolotajs s ON k.skolotajs_id = s.skolotajs_id
        LEFT JOIN pieteikums pi ON k.konsultācija_id = pi.id_konsultacijas
        WHERE DAYOFWEEK(k.laiks) = $day AND TIME(k.sākums) <= '$time' AND TIME(k.beigas) > '$time'
        GROUP BY k.konsultācija_id, p.prieksmets, s.vards, s.uzvards, k.kabinets, k.sākums, k.beigas
        ORDER BY k.sākums ASC";

// Execute the SQL query and retrieve the data
$result = $pdo->query($sql);

if (mysqli_num_rows($result) > 0) {
  // Output the data in JSON format
  $data = array();
  while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  echo json_encode($data);
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
