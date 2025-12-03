<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <meta charset="UTF-8" />
</head>
<body>
    <p><a href="/students/create">Add a new student</a></p>

    <h1>Students List</h1>

    <div id="students-container">
        Loading students...
    </div>

    <script type="module">
        async function loadStudents() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/students');

                const data = await response.json();

                const container = document.getElementById('students-container');

                if (data.data.length === 0) {
                    container.innerHTML = "<p>No students found.</p>";
                    return;
                }

                let html = "<ul>";
                data.data.forEach(student => {
                    html += `
                        <li>
                            ${student.name} - Age: ${student.age} - Major: ${student.major}
                            | <a href="/students/${student.id}/edit">Edit</a>
                            | <a href="/students/${student.id}/delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </li>
                    `;
                });
                html += "</ul>";

                container.innerHTML = html;

            } catch (error) {
                document.getElementById('students-container').innerHTML =
                    "<p>Error loading students.</p>";
            }
        }

        loadStudents();
    </script>

</body>
</html>
