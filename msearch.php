<?php
//setup query condition via GET
if (isset($_GET["fname"])) $fname= trim($_GET["fname"]) ;
else $fname = "";

$db = new mysqli("10.1.3.40","57102010282","57102010282","57102010282");
$sql="SELECT * FROM menu
WHERE Name LIKE '%".$fname."%'" ;

//query using the sql statement
$result = $db->query($sql);
//if there is a result
if ($result) {
  $numrows = $result->num_rows; //get the number of rows in the result
  $arrayresult = array();
  while ($row=$result->fetch_assoc()) 
  {
	  //form a result for each row
	$arrayrow = array("Name" => $row['Name'],
					"By" => $row['By'],
					"Ingredient" => $row['Ingredient'],
					"Direction" => $row['Direction'],
					"Type" => $row['Type'],
					);
	$arrayresult[] = $arrayrow; //add the result to the result array
  }
  $arrayjson = array("success" => true,
   "num" => $numrows,
   "results" => $arrayresult
  );
}
//if error, form an error JSON message
else {
	$arrayjson = array("success" => false,
	"message" => "Failed to query: " . $db->error
	);
 }
if ($result) $result->close();
if ($db) $db->close();
//encide the JSON message
echo json_encode($arrayjson); 
?>
