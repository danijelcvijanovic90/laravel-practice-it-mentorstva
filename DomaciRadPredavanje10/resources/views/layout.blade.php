<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("tittle")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body class="d-flex flex-column min-vh-100">

<main class="flex-grow-1">
    @include("navigation")
    @yield("content")
</main>
@include("footer")
</body>
</html>
