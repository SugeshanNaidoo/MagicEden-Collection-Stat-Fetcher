<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-mainnet.magiceden.dev/v2/collections/okay_bears/stats",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // Decode JSON response
  $data = json_decode($response, true);

  // Check if data is valid
  if ($data) {
    // Start building the table
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Value</th></tr>";

    // Iterate through the data and display in the table
    foreach ($data as $key => $value) {
      echo "<tr><td>$key</td><td>$value</td></tr>";
    }

    echo "</table>";
  } else {
    echo "Invalid JSON response.";
  }
}
?>
