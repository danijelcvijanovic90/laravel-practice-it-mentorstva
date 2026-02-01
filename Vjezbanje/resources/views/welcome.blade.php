<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($scores as $score)

        <p>{{ $score->school_class}}  {{ $score->teacher }} : {{ $score->score }}</p>
        
    @endforeach
</body>
</html>