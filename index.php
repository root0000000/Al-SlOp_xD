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
    <section id="left">
        <h2>Nowe zgłoszenie</h2>
        <form action="" method="POST">
            <label name="imie" for="name"></label>
            <label name="nazwisko" for="surname"></label>
            <label name="numer_reg" for="nr"></label>
            <select name="uslugi" id="lista"></select>
            <textarea name="uwagi" id="uwag"></textarea>
            <button type="submit">Dodaj zgłoszenie</button>
        </form>
    </section>
    <section id="right">
        <h2>Ostatnie naprawy</h2>
        <table></table>
    </section>
    <footer>
        <p>Arsenii Siverskyi</p>
    </footer>
</body>

</html>