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
            <form action="zamow.php" method="post">
                <label for="model">Model:</label> <select name="model" class="kontrolki">
                    <?php
                        $query = "SELECT model FROM produkt";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option>" . $row["model"] . "</option>";
                        }
                    ?>
                </select>

                <label for="rozmiar">Rozmiar:</label> <select name="rozmiar" class="kontrolki">
                    <option>40</option>
                    <option>41</option>
                    <option>42</option>
                    <option>43</option>
                </select>

                <label for="pary">Liczba par:</label> <input type="number" name="pary" class="kontrolki">
                <input type="submit" name="zamow" value="Zamow" class="kontrolki">
            </form>

            <?php
                $query = "SELECT buty.model, nazwa, cena, nazwa_pliku FROM buty INNER JOIN produkt ON buty.model = produkt.model";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<section class='buty'>";

                    echo "<img src='" . $row["nazwa_pliku"] . "' alt='but meski'>";
                    echo "<h2>" . $row["nazwa"] . "</h2>";
                    echo "<h5>Model: " . $row["model"] . "</h5>";
                    echo "<h4>Cena: " . $row["cena"] . "</h4>";

                    echo "</section>";
                }
            ?>
        </main>

        <footer>
            <p>Autor strony: Mateusz Cieslinski</p>
        </footer>
    </body>

    <?php mysqli_close($conn) ?>
</html>
