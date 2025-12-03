<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>

<h1>Edit Student</h1>

<form method="POST" action="/students/{{ $student->id }}/edit">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $student->name }}" required><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" value="{{ $student->age }}" required><br><br>

    <label>Major:</label><br>
    <input type="text" name="major" value="{{ $student->major }}" required><br><br>

    <button type="submit">Update Student</button>
</form>

</body>
</html>

