<!--
Hlavny view do sekcie head sa includnu vsetky importy, ktore su v includes/head
do main sa includuju vsetky views
-->

<!DOCTYPE html>
<html lang="sk_SK" class="container-fluid px-0">
<head>
    @include('includes.head')
</head>
<body class="container-fluid px-0">
    <header class="w-100 top-bottom shadow p-3 mb-5">
        <a class="text-decoration-none" href="/">
            <h1 class="text-center text-dark-emphasis">Ticketportal</h1>
        </a>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>