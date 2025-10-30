<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">

        <title>Pokoje</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body class="flex-column">
        <section class="baner1">
            <h2>WYNAJEM POKOI</h2>
        </section>

        <nav class="flex-row">
            <section class="menu1">
                <a href="index.html">POKOJE</a>
            </section>

            <section class="menu2">
                <a href="cennik.php">CENNIK</a>
            </section>

            <section class="menu3">
                <a href="kalkulator.html">KALKULATOR</a>
            </section>
        </nav>

        <section class="baner2"></section>

        <main class="flex-row">
            <section class="blok-lewy"></section>

            <section class="blok-srodkowy">
                <h1>Cennik</h1>
                
                <table>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "wynajem");

                        if (mysqli_connect_errno()) echo mysqli_connect_error();

                        $query = "SELECT * FROM pokoje";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";

                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwa"] . "</td>";
                            echo "<td>" . $row["cena"] . "</td>";

                            echo "</tr>";
                        }

                        mysqli_close($conn);
                    ?>
                </table>
            </section>

            <section class="blok-prawy"></section>
        </main>

        <footer>
            <p>Strone opracowal: Mateusz Cieslinski</p>
        </footer>
    </body>
</html>

