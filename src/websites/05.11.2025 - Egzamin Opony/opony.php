<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">

        <title>OPONY</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body class="flex-column">
        <?php
            header("refresh: 10");
        ?>

        <main class="flex-row">
            <section class="blok-boczny">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "opony");

                    if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                    $query = "SELECT * FROM opony ORDER BY cena ASC LIMIT 10";
                    $result = mysqli_query($conn, $query);

                    $sezonLookup = array("letnia"=>"lato", "zimowa"=>"zima", "uniwersalna"=>"uniwer");

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<section class='opona'>";

                        echo "<img src='" . $sezonLookup[$row["sezon"]] . ".png' alt='gdzie jest obrazek?'>";
                        echo "<h4>Opona: " . $row["producent"] . " " . $row["model"] . "</h4>";
                        echo "<h3> Cena: " . $row["cena"] . "</h3>";

                        echo "</section>";
                    }

                    mysqli_close($conn);
                ?>

                <p><a href="https://opona.pl/">wiecej ofert</a></p>
            </section>

            <section class="sekcje flex-column">
                <section class="sekcja-1">
                    <img src="opona.png" alt="Opona">
                    <h2>Opona dnia</h2>

                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "opony");

                        if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                        $query = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<h2>" . $row["producent"] . " model " . $row["model"] . "</h2>";
                            echo "<h2> Sezon: " . $row["sezon"] . "</h2>";
                            echo "<h2> Tylko " . $row["cena"] . " zl!</h2>";
                        }

                        mysqli_close($conn);
                    ?>
                </section>

                <section class="sekcja-2">
                    <h2>Najnowsze zamowienie</h2>

                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "opony");

                        if (mysqli_connect_errno()) { echo mysqli_connect_error(); }

                        $query = "SELECT id_zam, ilosc, model, cena FROM zamowienie INNER JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<h2>" . $row["id_zam"] . " " . $row["ilosc"] . " sztuki modelu " . $row["model"] . "</h2>";
                            echo "<h2> Wartosc zamowienia " . $row["ilosc"] * $row["cena"] . " zl</h2>";
                        }

                        mysqli_close($conn);
                    ?>
                </section>
            </section>
        </main>

        <footer>
            <p>Strone wykonal: Mateusz Cieslinski</p>
        </footer>
    </body>
</html>
