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
$result = $pdo->query($sql);

if (mysqli_num_rows($result) > 0) {
  // Output the data in JSON format
 
  $html = '';
  while($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>'. $row['age'] . '</td>';
  $html .= '<td>' . $row['location'] . '</td>';
  $html .= '</tr>';
  }
  
  echo json_encode($data);
} else {
  echo "0 results";
}

?>
