<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">

        <title>PIEKARNIA</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class="flex-column">
        <img src="wypieki.png" alt="Produkty naszej piekarni">

        <nav>
            <a href="kw1.png">KWERENDA1</a>
            <a href="kw2.png">KWERENDA2</a>
            <a href="kw3.png">KWERENDA3</a>
            <a href="kw4.png">KWERENDA4</a>
        </nav>

        <header>
            <h1>WITAMY</h1>
            <h4>NA STRONIE PIEKARNI</h4>

            <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
        </header>

        <main>
            <h4>Wybierz rodzaj wypiekow:</h4>

            <form method="post">
                <select name="rodzaj">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "piekarnia");

                        if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                        $query = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option>" . $row["Rodzaj"] . "</option>";
                        }

                        mysqli_close($conn);
                    ?>
                </select>
                <input type="submit" name="wybierz" value="Wybierz" />
            </form>

            <table>
                <tr>
                    <th>Rodzaj</th>
                    <th>Nazwa</th>
                    <th>Gramatura</th>
                    <th>Cena</th>
                </tr>

                <?php
                    if (isset($_POST["wybierz"])) {
                        if (!isset($_POST["rodzaj"]) || empty($_POST["rodzaj"])) { return; }

                        $conn = mysqli_connect("localhost", "root", "", "piekarnia");

                        if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                        $rodzaj = $_POST["rodzaj"];

                        $query = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";

                            echo "<td>" . $row["Rodzaj"] . "</td>";
                            echo "<td>" . $row["Nazwa"] . "</td>";
                            echo "<td>" . $row["Gramatura"] . "</td>";
                            echo "<td>" . $row["Cena"] . "</td>";

                            echo "</tr>";
                        }

                        mysqli_close($conn);
                    }
                ?>
            </table>
        </main>

        <footer>
            <p>AUTOR Mateusz Cieslinski</p>
            <p>Data: 06.11.2025</p>
        </footer>
    </body>
</html>
