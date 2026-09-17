<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>AutoSerwis - Panel Obsługi Zgłoszeń</h1>
    </header>
    <div id="container">
        <section id="left">
            <h2>Nowe zgłoszenie</h2>
            <form action="" method="POST">
                <div><input type="text" id="imie" name="imie"></input></div>
                <div><label for="imie">Imię</label></div>
                <div><input type="text" id="nazwisko" name="nazwisko"></input></div>
                <div><label for="nazwisko">nazwisko</label></div>
                <div><input type="text" id="numer" name="numer"></div>
                <div><label for="numer">Numer rejestracyjny pojazdu</label></div>
                <div><select name="usluga"></div>
                <?php
                $connection = mysqli_connect("localhost", "root", "", "warsztat");

                if (mysqli_connect_errno()) {
                    echo (mysqli_connect_error());
                }

                $query = "SELECT id, nazwa, cena FROM `uslugi`";

                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['nazwa']} {$row['cena']} zł</option>";
                }
                ?>
                </select>
                <textarea name="Uwagi">Uwagi i opis usterki</textarea>
                <button type="submit">Dodaj zgłoszenie</button>
                <?php
                if (
    isset($_POST['imie']) && 
    isset($_POST['nazwisko']) && 
    isset($_POST['numer']) && 
    isset($_POST['usluga']) && 
    isset($_POST['Uwagi'])
) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $nr_rejestr = $_POST['numer'];
    $usluga = $_POST['usluga'];
    $opis = $_POST['Uwagi'];

    $query1 = "INSERT INTO `zgloszenia` (`klient`, `nr_rejestracyjny`, `uslugi_id`, `opis`) 
               VALUES ('$imie $nazwisko', '$nr_rejestr', '$usluga', '$opis')";

    if (mysqli_query($connection, $query1)) {
        echo "Zgłoszenie zostało pomyślnie dodane";
    }
}
                ?>
            </form>
        </section>
        <section id="right">
            <h2>Ostatnie naprawy</h2>
            <table id="tableright">
                <tr>
                    <th>Klient</th>
                    <th>Rejestracja</th>
                    <th>Usługa</th>
                    <th>Cena</th>
                    <th>Opis usterki</th>
                </tr>
                <?php
                $connection = mysqli_connect("localhost", "root", "", "warsztat");

                if (mysqli_connect_errno()) {
                    echo (mysqli_connect_errno());
                }

                $query2 = "SELECT zgloszenia.klient, zgloszenia.nr_rejestracyjny, uslugi.nazwa, uslugi.cena, zgloszenia.opis FROM zgloszenia JOIN uslugi ON zgloszenia.uslugi_id = uslugi.id ORDER BY zgloszenia.id DESC;";
                $result = mysqli_query($connection, $query2);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>{$row['klient']}</td>
                    <td>{$row['nr_rejestracyjny']}</td>  
                    <td>{$row['nazwa']}</td>  
                    <td>{$row['cena']}</td>  
                    <td>{$row['opis']}</td>  
                    </tr>";
                }
                mysqli_close($connection);
                ?>
            </table>
        </section>
    </div>
    <footer>
        <p>Arsenii Siverskyi</p>
    </footer>
</body>

</html>
