<!DOCTYPE html>
<html lang="pl-PL">
    <?php $conn = mysqli_connect("localhost", "root", "", "motory"); ?>

    <head>
        <meta charset="UTF-8">

        <title>Motocykle</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body>
        <img src="motor.png" alt="motocykl">

        <header>
            <h1>Motocykle - moja pasja</h1>
        </header>

        <main class="flex-row">
            <section class="left-block">
                <h2>Gdzie pojechac?</h2>
                <dl>
                    <?php
                        $query = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<dt>";
                            echo $row["nazwa"] . ", rozpoczyna sie w " . $row["poczatek"] . ", ";
                            echo "<a href='" . $row["zrodlo"] . ".jpg'>zobacz zdjecie</a>";
                            echo "</dt>";

                            echo "<dd>" . $row["opis"] . "</dd>";
                        }
                    ?>
                </dl>
            </section>

            <section class="right-block">
                <section class="top-block">
                    <h2>Co kupic?</h2>
                    <ol>
                        <li>Honda CBR125R</li>
                        <li>Yamaha YBR125</li>
                        <li>Honda VFR800i</li>
                        <li>Honda CBR1100XX</li>
                        <li>BMW R1200GS LC</li>
                    </ol>
                </section>

                <section class="bottom-block">
                    <h2>Statystki</h2>

                    <p>Wpisanych wycieczek:
                        <?php
                            $query = "SELECT COUNT(*) AS 'liczba' FROM wycieczki";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row["liczba"];
                            }
                        ?>
                    </p>

                    <p>Uzytkownikow forum: 200</p>
                    <p>Przeslanych zdjec: 1300</p>
                </section>
            </section>
        </main>

        <footer>
            <p>Strone wykonal: Mateusz Cieslinski</p>
        </footer>
    </body>

    <?php mysqli_close($conn); ?>
</html>
