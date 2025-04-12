



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formId = $_POST['formId'] ?? '';

    $data = [
        "firstName" => $_POST['firstName'],
        "lastName" => $_POST['lastName'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "address" => $_POST['address'],
        "city" => $_POST['city'],
        "postcode" => $_POST['postcode'],
        "vehicleName" => $_POST['vehicleName'],
        "vehicleModel" => $_POST['vehicleModel']
    ];

    $jsonData = json_encode($data);

    // Assign URLs based on form ID
    $urls = [
        "form1" => "https://script.google.com/macros/s/AKfycbyA7SmfrAOZgv-cKTk5KorDmOh50jRt3NermpqW1iUmMnVioNJFALm0khacJodR8byx/exec", // car wash
        "form2" => "https://script.google.com/macros/s/AKfycbyOlLj5EUqMvAhjCoL7ZG3UuXDnbAunv9QcFqahxmcMTmDKPHqtg3HZsHi8ll6muRCq/exec" //bike wash
    ]; 

    $targetUrl = $urls[$formId] ?? null;

    if (!$targetUrl) {
        echo "Invalid form ID.";
        exit;
    }

    $ch = curl_init($targetUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "Form submitted successfully!";
}
?>
