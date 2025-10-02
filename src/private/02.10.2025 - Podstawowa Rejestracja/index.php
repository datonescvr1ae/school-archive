<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <form method="POST">
            <table>
                <tr>
                    <td>Nazwa uzytkownika:</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td>Haslo:</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="email" name="email" /></td>
                </tr>
            </table> <br />
            <button type="submit" name="rejestruj">Zarejestruj</button>
        </form>

        <?php
              if (isset($_POST["rejestruj"])) {
                     $username = $_POST["username"];
                     $password = $_POST["password"];
                     $email = $_POST["email"];

                     if ($username != "" && $password != "" && $email != "") {
                            $conn = mysqli_connect("localhost", "root", "", "example");

                            $hashpass = password_hash($password, PASSWORD_DEFAULT);

                            $query = "INSERT INTO users VALUES(NULL, '$username', '$hashpass', '$email');";
                            mysqli_query($conn, $query);

                            mysqli_close($conn);
                     }
              }
        ?>
    </body>
</html>
