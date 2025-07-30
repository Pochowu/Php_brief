<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de Produits</title>
</head>
<style>
    body{
        text-align: center;
        align-content: center
        position: relative;
        background-color: #273E47;
        color: white;
        padding: 20px;
        margin: 0;
        font-family: Arial, sans-serif;
        justify-content: center;
    }

    nav ul{
        display: flex;
        gap: 20px;
        list-style-type: none;
        padding: 15px 25px;
        justify-content: center;
        gap: 55px;
        border: 0.5px solid white;
        background-color: #03B5AA;
        border-radius: 25px 15px 25px 15px;
        margin: 0 200px;
    }

    a{
        color: rgb(255, 255, 255);
        text-decoration: none;
        font-weight: bold;
    }

    a:hover{
        text-decoration: underline;
        background-color: goldenrod;
    }

    input, textarea{
        width: 30%;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input:focus, textarea:focus, button:focus{
        border-color: #03B5AA;
        outline: none;
    }

    button{
        background-color: #03B5AA;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<body>
    <nav>
        <ul>
            <li>
                <a href="{{route('home')}}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    Catégories
                </a>
            </li>
        </ul>
    </nav>

    @yield('content')
</body>
</html>