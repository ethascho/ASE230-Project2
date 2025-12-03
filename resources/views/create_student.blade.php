<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
</head>
<body>

<h1>Add Student</h1>

<form method="POST" action="/students/create">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" required><br><br>

    <label>Major:</label><br>
    <input type="text" name="major" required><br><br>

    <button type="submit">Add Student</button>
</form>

</body>
</html>
