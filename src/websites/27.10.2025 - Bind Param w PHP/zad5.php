<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Dodaj nowe zamowienie</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form method="post">
            <label for="imie">Imie:</label>
            <input type="text" name="imie" required /> <br>

            <label for="nazwisko">Nazwisko:</label>
            <input type="text" name="nazwisko" required /> <br>

            <label for="data-zamow">Data zamowienia:</label>
            <?php
                echo "<input type='date' name='data-zamow' max='" . date("Y-m-d", time()) . "' /> <br>";
            ?>

            <label for="status">Status:</label>
            <select name="status">
                <option value="nowe">Nowe</option>
                <option value="w_trakcie">W trakcie</option>
                <option value="zrealizowane">Zrealizowane</option>
            </select> <br>

            <input type="submit" name="wyslij" value="Wyslij" />
        </form>

        <?php
            if (!isset($_POST["wyslij"])) return;

            foreach (array("imie", "nazwisko", "status") as $key) {
                if (!isset($_POST[$key]) || empty($_POST[$key])) { echo "Wypelnij wszystkie pola!"; return; }
            }

            $dataZamow = $_POST["data-zamow"];
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $status = $_POST["status"];

            $fullName = $imie . " " . $nazwisko;

            if (!$dataZamow) $dataZamow = date("Y-m-d", time());

            $conn = mysqli_connect("localhost", "root", "", "sklep");

            $stmt = mysqli_prepare($conn, "INSERT INTO zamowienia VALUES(NULL, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $dataZamow, $fullName, $status);

            mysqli_stmt_execute($stmt);

            mysqli_close($stmt);
            mysqli_close($conn);
        ?>
    </body>
</html>
