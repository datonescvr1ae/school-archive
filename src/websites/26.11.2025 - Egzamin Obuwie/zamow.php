<!DOCTYPE html>
<html lang="pl">
    <?php $conn = mysqli_connect("localhost", "root", "", "obuwie") ?>

    <head>
        <meta charset="utf-8">

        <title>Obuwie</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1>Obuwie meskie</h1>
        </header>

        <main>
            <h2>Zamowienie</h2>

            <?php
                $model = $_POST["model"];
                $pary = $_POST["pary"];
                $rozmiar = $_POST["rozmiar"];

                $query = "SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku FROM buty INNER JOIN produkt ON buty.model = produkt.model WHERE buty.model = '" . $model . "'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<img src='" . $row["nazwa_pliku"] . "' alt='but meski'>";
                    echo "<h2>" . $row["nazwa"] . "</h2>";

                    $wartosc = $pary * $row["cena"];

                    echo "<p>Cena za " . $pary . " par: " . $wartosc . " zl</p>";
                    echo "<p>Szczegoly produktu: " . $row["kolor"] . ", " . $row["material"] . "</p>";
                    echo "<p>Rozmiar: " . $rozmiar . "</p>";
                }
            ?>

            <a href="index.php">Strona glowna</a>
        </main>

        <footer>
            <p>Autor strony: Mateusz Cieslinski</p>
        </footer>
    </body>

    <?php mysqli_close($conn) ?>
</html>
