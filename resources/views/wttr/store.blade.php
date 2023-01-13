<html>
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
        <th>Nom de la ville</th>
        <th>Température</th>
        <th>Pression</th>
        <th>Humidité</th>
    </tr>
    <tr>
        <td>{{ $donnees["city"] }}</td>
        <td>{{ $donnees["temperature"] }}°C</td>
        <td>{{ $donnees["pression"] }} Pa</td>
        <td>{{ $donnees["humidite"] }}%</td>
    </tr>
</table>
<div style="margin-top: 5rem; text-align: center">
    <p>{{$message}}</p>
    @if(array_key_exists("updated_at", $donnees))
        <p>Date des données : {{ $donnees["updated_at"] }}</p>
    @endif

    Vous pouvez de nouveau faire une requête :
    <a href="{{route("index")}}">
        <button>Retour</button>
    </a>
</div>

<footer>
    <p>JAKOBOWSKI Aymeric 2B</p>
    <p>LAGADEC Quentin 2B</p>
</footer>

</body>
</html>
