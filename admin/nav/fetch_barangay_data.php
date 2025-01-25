<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'system_scholarship';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$query = "
    SELECT b.barangay, COUNT(r.regid) AS total_registrations
    FROM tblloc_barangay b
    LEFT JOIN tblregistrations r ON b.brgyid = r.brgyid
    WHERE b.brgyid < 5
    GROUP BY b.barangay
";

$result = $conn->query($query);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'barangay' => $row['barangay'],
            'total_registrations' => $row['total_registrations']
        ];
    }
}

echo json_encode($data);

$conn->close();
?>
