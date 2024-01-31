<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;

    // Generate certificate number (you can modify this logic)
    $certificateNumber = getCertificateNumber();

    // Save data to the certificate log file
    $certificateLog = fopen("certificate_log.txt", "a");
    fwrite($certificateLog, "Certificate Number: {$certificateNumber}\n");
    fwrite($certificateLog, "Certificate Date: {$data['log_certdate']}\n");
    fwrite($certificateLog, "E-Waste Picked on: {$data['log_datedEWastePickedOn']}\n");
    fwrite($certificateLog, "Description Company Name: {$data['log_DescCompanyName']}\n");
    fwrite($certificateLog, "Company Name: {$data['log_companyName']}\n");
    fwrite($certificateLog, "Company Address: {$data['log_companyAddress']}\n");
    fwrite($certificateLog, "Amount of E waste Picked: {$data['log_amountOfEWaste']}\n");
    fwrite($certificateLog, "Invoice: {$data['log_InvoiceNoBOENo']}\n");
    fwrite($certificateLog, "Timestamp: " . date('Y-m-d H:i:s') . "\n");
    fwrite($certificateLog, "------------------------\n");
    fclose($certificateLog);

    // Save the current certificate number to the counter file
    file_put_contents("counter.txt", $certificateNumber);

    echo "Data saved successfully!";
}

function getCertificateNumber() {
    // Get the previous certificate number from the counter file
    $prevCertificateNumber = intval(file_get_contents("counter.txt"));

    // Increment and return the new certificate number
    return ++$prevCertificateNumber;
}
?>
