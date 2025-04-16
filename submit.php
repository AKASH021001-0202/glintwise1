



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formId = $_POST['formId'] ?? '';

    // Common fields (always needed)
    $data = [
        "firstName" => $_POST['firstName'] ?? '',
        "lastName" => $_POST['lastName'] ?? '',
        "phone" => $_POST['phone'] ?? '',
        "email" => $_POST['email'] ?? '',
        "address" => $_POST['address'] ?? '',
        "city" => $_POST['city'] ?? '',
        "postcode" => $_POST['postcode'] ?? ''
    ];

    // Add vehicleName and vehicleModel only for form1 and form2
    if ($formId === "form1" || $formId === "form2") {
        $data["vehicleName"] = $_POST['vehicleName'] ?? '';
        $data["vehicleModel"] = $_POST['vehicleModel'] ?? '';
    }

    if ($formId === "form3") {
        // Bike data remains as arrays
        $data["bikeType"] = $_POST['bikeType'] ?? [];
        $data["bikeModel"] = $_POST['bikeModel'] ?? [];
        $data["bikeNumber"] = $_POST['bikeNumber'] ?? [];

        // Car data remains as arrays
        $data["carType"] = $_POST['carType'] ?? [];
        $data["carModel"] = $_POST['carModel'] ?? [];
        $data["carNumber"] = $_POST['carNumber'] ?? [];

        // Counts
        $data["bikeCount"] = $_POST['bikeCount'] ?? 0;
        $data["carCount"] = $_POST['carCount'] ?? 0;
    }

    $jsonData = json_encode($data);

    // Assign URLs based on form ID

    $urls = [
        "form1" => "https://script.google.com/macros/s/AKfycbyA7SmfrAOZgv-cKTk5KorDmOh50jRt3NermpqW1iUmMnVioNJFALm0khacJodR8byx/exec", // car wash
        "form2" => "https://script.google.com/macros/s/AKfycbyOlLj5EUqMvAhjCoL7ZG3UuXDnbAunv9QcFqahxmcMTmDKPHqtg3HZsHi8ll6muRCq/exec", //bike wash
        "form3" => "https://script.google.com/macros/s/AKfycbz7ewoDd7cNqEu0aMaAV4ewEBNcmOedD5HmOP3QLXCOEQCeozBlOrPfKaOJPmMb1mrSvw/exec" //other wash

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
