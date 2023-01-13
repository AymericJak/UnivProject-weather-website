<head>
    <link rel="stylesheet" href="storage/css/app.css" />
    <title>
        Site Api Weather
    </title>
</head>
<h1>Bienvenue sur notre site api weather </h1>
<p>Indiquer votre ville: </p>
<form action="{{ route('weather-data.search') }}">
    <input type="text" name="search"/>
    <button>Chercher</button>
</form>
<footer>
    <p>Aymeric Jakobowski 2B<br>
        Quentin Lagadec 2B</p>
</footer>
