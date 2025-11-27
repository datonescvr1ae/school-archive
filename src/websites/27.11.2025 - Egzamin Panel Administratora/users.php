<!DOCTYPE html>
<html lang="pl-PL">
    <?php $conn = mysqli_connect("localhost", "root", "", "dane4"); ?>

    <head>
        <meta charset="UTF-8">

        <title>Panel administratora</title>
        <link rel="stylesheet" href="styl4.css">
    </head>

    <body class="flex-column">
        <header>
            <h3>Portal Spolecznosciowy - panel administratora</h3>
        </header>

        <main class="flex-row">
            <section class="blok-lewy">
                <h4>Uzytkownicy</h4>

                <?php
                    $query = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $wiek = date("Y") - $row["rok_urodzenia"];

                        echo "<br>" . $row["id"] . ". " . $row["imie"] . " " . $row["nazwisko"] . ", " . $wiek . " lat";
                    }
                ?>

                <br><a href="settings.html">Inne ustawienia</a>
            </section>

            <section class="blok-prawy">
                <h4>Podaj id uzytkownika</h4>
                <form method="post">
                    <input type="number" name="id">
                    <input type="submit" value="ZOBACZ" name="check">
                </form>

                <hr>

                <?php
                    if (isset($_POST["check"])) {
                        $id = $_POST["id"];

                        $query = "SELECT osoby.id, imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = " . $id;
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<h2>" . $row["id"] . ". " . $row["imie"] . " " . $row["nazwisko"] . "<br><br>";
                            echo "<img src='" . $row["zdjecie"] . "' alt='" . $row["id"] . "'>";
                            
                            echo "<p>Rok urodzenia: " . $row["rok_urodzenia"] . "</p>";
                            echo "<p>Opis: " . $row["opis"] . "</p>";
                            echo "<p>Hobby: ". $row["nazwa"] . "</p>";
                        }
                    }
                ?>
            </section>
        </main>

        <footer>Strone wykonal: Mateusz Cieslinski</footer>
    </body>

    <?php mysqli_close($conn); ?>
</html>
