<html>
<head>
    <link rel="stylesheet" href="storage/css/app.css" />
    <title>
        Site Api Weather
    </title>
</head>

<body>
<h1>Bienvenue sur notre site api weather</h1>

<div style="text-align: center">
    <p>Indiquer votre ville: </p>
    <form action="{{ route('weather-data.search') }}">
        <input type="text" name="search"/>
        <button>CHERCHER</button>
    </form>
</div>
<footer>
    <p>JAKOBOWSKI Aymeric 2B</p>
    <p>LAGADEC Quentin 2B</p>
</footer>
</body>
</html>
