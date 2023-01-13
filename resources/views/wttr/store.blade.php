<head>
    <link rel="stylesheet" href="storage/css/app.css"/>
    <title>
        Site Api Weather
    </title>
</head>
<body>
<header>
    <nav>
        <h1>Bienvenue sur notre site api weather</h1>
    </nav>
</header>

<table>
    <tr>
        <td>Nom de la ville</td>
        <td>Température</td>
        <td>Pression</td>
        <td>Humidité</td>
    </tr>
    <tr>
        <td>{{ $donnees["city"] }}</td>
        <td>{{ $donnees["temperature"] }}°C</td>
        <td>{{ $donnees["pression"] }} Pa</td>
        <td>{{ $donnees["humidite"] }}%</td>
    </tr>
</table>

<p>Vous pouvez de nouveau faire une requête</p>
<a href="{{route("index")}}">
    <button>Retour</button>
</a>

<footer>
    <p>Aymeric Jakobowski 2B</p>
    <p>Quentin Lagadec 2B</p>
</footer>

</body>
</html>
