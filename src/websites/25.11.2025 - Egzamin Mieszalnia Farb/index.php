<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">

        <link rel="icon" href="fav.png">

        <title>Mieszalnia farb</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <img src="baner.png" alt="Mieszalnia farb">
        </header>

        <form method="post">
            <label for="date-from">Data odbioru do:</label> <input type="date" name="date-from">
            <label for="date-until">do:</label> <input type="date" name="date-until">

            <input type="submit" name="search" value="Wyszukaj">
        </form>

        <main>
            <table>
                <tr>
                    <th>Nr zamowienia</th>
                    <th>Nazwisko</th>
                    <th>Imie</th>
                    <th>Kolor</th>
                    <th>Pojemnosc [ml]</th>
                    <th>Data odbioru</th>
                </tr>

                <?php
                    if (isset($_POST["search"])) {
                        $conn = mysqli_connect("localhost", "root", "", "mieszalnia");

                        if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                        $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM zamowienia INNER JOIN klienci ON zamowienia.id_klienta = klienci.id ORDER BY data_odbioru ASC";

                        if (isset($_POST["date-from"]) && !empty($_POST["date-from"]) && isset($_POST["date-until"]) && !empty($_POST["date-until"])) {
                            $dateFrom = $_POST["date-from"];
                            $dateUntil = $_POST["date-until"];

                            $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM zamowienia INNER JOIN klienci ON zamowienia.id_klienta = klienci.id WHERE data_odbioru BETWEEN '" . $dateFrom . "' AND '" . $dateUntil . "' ORDER BY data_odbioru ASC";
                        }

                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";

                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwisko"] . "</td>";
                            echo "<td>" . $row["imie"] . "</td>";
                            echo "<td style='background-color: #" . $row["kod_koloru"] . "'>" . $row["kod_koloru"] . "</td>";
                            echo "<td>" . $row["pojemnosc"] . "</td>";
                            echo "<td>" . $row["data_odbioru"] . "</td>";

                            echo "</tr>";
                        }

                        mysqli_close($conn);
                    }
                ?>
            </table>
        </main>

        <footer>
            <h3>Egzamin INF.03</h3>
            <p>Autor: Mateusz Cieslinski</p>
        </footer>
    </body>
</html>
