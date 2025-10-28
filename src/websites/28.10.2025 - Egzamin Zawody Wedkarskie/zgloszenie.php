<?php
    if (isset($_POST["dodaj"])) {
        foreach (array("lowisko", "data-zawod", "sedzia") as $key) {
            if (!isset($_POST[$key]) || empty($_POST[$key])) { echo "Wypelnij wszystkie pola!"; return; }
        }

        $conn = mysqli_connect("localhost", "root", "", "wedkarstwo");

        if (mysqli_connect_errno()) echo die(mysqli_connect_error());

        $lowisko = (int)$_POST["lowisko"];
        $dataZawod = $_POST["data-zawod"];
        $sedzia = $_POST["sedzia"];

        $stmt = mysqli_prepare($conn, "INSERT INTO zawody_wedkarskie VALUES(NULL, 0, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iss", $lowisko, $dataZawod, $sedzia);

        mysqli_execute($stmt);

        mysqli_close($conn);
        header("Location: zawody.html");
    }
?>
