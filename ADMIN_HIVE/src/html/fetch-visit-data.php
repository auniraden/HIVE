<?php
    include('config.php');
    $sql = "SELECT DATE_FORMAT(VisitDate, '%Y-%m-%d') AS Visit_Date,
            COUNT(*) AS GuestVisitCount FROM guest_visit WHERE
            VisitDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 29 DAY) AND
            DATE_SUB(CURRENT_DATE(), INTERVAL -1 DAY) GROUP BY Visit_Date;";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    do {
        $visitCountByDate[] = array(
            "visitDate" => $row["Visit_Date"],
            "visitCount" => $row["GuestVisitCount"],
        );
    }while ($row = mysqli_fetch_assoc($result));

    echo json_encode($visitCountByDate);
    exit;
?>