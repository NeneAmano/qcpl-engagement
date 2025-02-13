<?php
// Include necessary files and initialize database connection
require_once('../core/init.php');

// Fetch data from the database
$sql_select = "SELECT queue_details.qd_id,CONCAT(client.f_name, ' ' , client.l_name) AS client,queue_details.queue_number, queue_details.client_id, queue_details.service,queue_details.`status`,queue_details.entry_check,queue_details.created_at,queue_details.updated_at
FROM queue_details
JOIN client ON queue_details.client_id = client.client_id
 WHERE DATE(queue_details.created_at) = CURDATE() AND queue_details.status = 1 AND queue_details.entry_check = 1
 GROUP BY queue_details.qd_id ;";

$result = mysqli_query($conn, $sql_select);

$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

echo json_encode($data);

