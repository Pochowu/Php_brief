<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de Produits</title>
</head>
<style>
    
    body {
    display: flex;
    flex-direction: column;
    justify-content: center;     
    align-items: center;          
    height: 100vh;
    margin: 0;
    padding: 20px;
    font-family: Arial, sans-serif;
    text-align: center;
    color: black;              
    background-color: #f0f0f0;   
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
        color: rgb(3, 40, 43);
        text-decoration: none;
        font-weight: bold;
    }

    a:hover{
        text-decoration: underline;
        background-color: goldenrod;
    }

    .form-container {
        background: #fff;
        max-width: 600px;
        margin: 50px auto;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
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
                <a href="{{route('auth.registration')}}">
                    Inscription
                </a>
            </li>
            <li>
                <a href="{{route('auth.login')}}">
                    Connexion
                </a>
            </li>
            <li>
                <a href="'{{route('profiles.profile')}}">
                    Profils
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    Catégories
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}">
                    Produits
                </a>
            </li>
        </ul>
    </nav>

    @yield('content')
</body>
</html>