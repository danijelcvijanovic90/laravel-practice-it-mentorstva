<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add new score</h1>
    @if( $errors->any() )
    <p>{{ $errors->first() }}</p>
    @endif
    <form action="/add-new-score" method="POST">
        {{ csrf_field() }}
        <input required type="text" name='school_class' placeholder="Enter a school class">
        <input required type="number" name='score' placeholder="Enter score">
        <input required type="text" name='teacher' placeholder="Teachers name">
        <button type="submit">Send form</button>
    </form>
</body>
</html>