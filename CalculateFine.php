<?php
$con = mysqli_connect("localhost", "root", "", "authentication");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books";
$res = mysqli_query($con, $sql);

$today = date("Y-m-d");

function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
}

while ($row = mysqli_fetch_assoc($res)) {
    $datetime2 = $row['ReturnDate'];
    $interval = dateDiffInDays($today, $datetime2);
    $fine = 0;

    if ($interval >= 21) {
        $fine = 50;
    } elseif ($interval >= 14) {
        $fine = 20;
    } elseif ($interval >= 7) {
        $fine = 5;
    }

    $total = $interval * $fine;

    $sql2 = "UPDATE books SET Fine='" . $total . "' WHERE UserName='" . $row['UserName'] . "'";
    $res2 = mysqli_query($con, $sql2);
    if (!$res2) {
        echo "Error updating fine: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>