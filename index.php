<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <div class="container">
        <form id="adding">
            <label for="title">Dodawanie</label>
            <input type="text" name="title" id="title" placeholder="Title">
            <button>Wyślij</button>
        </form>
    </div>
    <hr>
    <div class="container" id="out">

    </div>
</main>
</body>
</html>