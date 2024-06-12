<?php
function jsonToCsv($jsonFilePath, $csvFilePath) {
    $jsonData = file_get_contents($jsonFilePath); // Read the JSON file
    $dataArray = json_decode($jsonData, true);// Decode JSON data into a PHP array
    $csvFile = fopen($csvFilePath, 'w');  // Open a new CSV file for writing
    if (!empty($dataArray)) {
        $header = array_keys($dataArray[0]);   // Write the header row (if needed)
        fputcsv($csvFile, $header);
    }
    // Loop through the PHP array and write each row to the CSV file
    foreach ($dataArray as $row) {
        fputcsv($csvFile, $row);
    }
    fclose($csvFile);
}
$jsonFilePath = 'data.json'; // Path to the JSON file
$csvFilePath = 'data.csv';   // Path to the CSV file

jsonToCsv($jsonFilePath, $csvFilePath);
echo "Conversion completed successfully.";
?>
