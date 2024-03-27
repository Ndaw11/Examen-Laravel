<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Projet Laravel')</title>
    <!-- Ajoutez vos liens CSS, scripts, etc. ici -->
</head>
<body>

    <header>
        <!-- Ajoutez le contenu de l'en-tête ici -->
        <h1>Mon Projet Laravel</h1>
    </header>

    <nav>
        <!-- Ajoutez la navigation ici -->
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/about">À propos</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <main>
        <!-- Section principale qui sera remplie par les vues spécifiques -->
        @yield('content')
    </main>

    <footer>
        <!-- Ajoutez le contenu du pied de page ici -->
        @include('ExamenLaravel copy\resources\views\layouts\sections\footer\footer.blade.php')
    </footer>

    <!-- Ajoutez vos scripts JavaScript ici -->

</body>
</html>
