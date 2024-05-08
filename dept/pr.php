<!-- <?php
include '../config.php';

// Execute SQL query
$sql = "SELECT s.amount, s.date, s.request FROM s_requests s
        JOIN users u ON u.staff_id = u.staff_id";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    // Display data in HTML table
    echo "<table border='1'>";
    echo "<tr>
           <th>Amount</th>
           <th>Date</th>
           <th>Request</th>
           <th>Name</th>
           <th>Staff ID</th>
           </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['request'] . "</td>";
        // echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['staff_id'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Free result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query failed
    echo "Error: " . mysqli_error($link);
}

// Close MySQL connection
mysqli_close($link);
?> -->
