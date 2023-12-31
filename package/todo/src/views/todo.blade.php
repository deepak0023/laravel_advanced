<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>
<body>
    <h1>TODO</h1>
    <p>Welcom {{ config('todo.todo_name') }}</p>
    <form action="{{ route('todo') }}" method="POST">
        <input name="todo_name" />
        <br>
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>
