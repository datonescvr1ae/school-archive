<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">

        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body class="flex-column">
        <header>
            <h2>Swiatowe rozgrywki pilkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </header>

        <section class="blok-mecze flex-row">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "egzamin");

                if (mysqli_connect_errno()) echo mysqli_connect_error();

                $query = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<section class='blok-info'>";

                    echo "<h3>" . $row["zespol1"] . " - " . $row["zespol2"] . "</h3>";
                    echo "<h4>" . $row["wynik"] . "</h4>";
                    echo "<p>w dniu: " . $row["data_rozgrywki"] . "</p>";

                    echo "</section>";
                }

                mysqli_close($conn);
            ?>
        </section>

        <main>
            <h2>Reprezentacja Polski</h2>
        </main>

        <aside class="flex-row">
            <section class="blok-lewy">
                <p>Podaj pozycje zawodnikow (1-bramkarze, 2-obroncy, 3-pomocnicy, 4-napastnicy)</p>
                <form method="post">
                    <input type="number" name="pozycja" />
                    <input type="submit" name="sprawdz" value="Sprawdz" />
                </form>

                <ul>
                    <?php
                        if (isset($_POST["sprawdz"])) {
                            if (!isset($_POST["pozycja"]) || empty($_POST["pozycja"])) { echo "Pole pozycja puste!"; return; }

                            $conn = mysqli_connect("localhost", "root", "", "egzamin");
                            $pozycja = $_POST["pozycja"];

                            if (mysqli_connect_errno()) echo mysqli_connect_error();

                            $query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li><p>" . $row["imie"] . " " . $row["nazwisko"] . "</p></li>";
                            }

                            mysqli_close($conn);
                        }
                    ?>
                </ul>
            </section>

            <section class="blok-prawy">
                <img src="zad1.png" alt="pilkarz">
                <p>Autor: Mateusz Cieslinski</p>
            </section>
        </aside>
    </body>
</html>
