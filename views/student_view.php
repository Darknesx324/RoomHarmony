<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/1597.png" />
        <link rel="stylesheet" href="../css/admin.css" />
    </head>

    <body>

        <!-- NAVBAR -->
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="../images/assets/1597.png" alt="Logo Universidad" width="80px" /></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="#" title="Inicio"><i class="fas fa-home"></i></a></li>
                    <li><a href="../controller/LogoutController.php?SignOut=true" title="Cerrar sesión"><i class="fa fa-sign-out"></i></a></li>
                    <li><a href="#" title="Contáctanos"><i class="fas fa-phone"></i></a></li>
                    <li><a href="#" title="Acerca de"><i class="fas fa-info"></i></a></li>
                </ul>
            </nav>
        </div>

        <h1 class="text-center mt-4 fw-bold">Bienvenido, <?php echo $_SESSION['name']; ?></h1>

        <!-- Sección de Cursos -->
        <div class="row2">
            <div class="col2">
                <p>¡Aquí puedes ver<br>todos tus cursos registrados!</p>
                <a href="viewCourses.php" class="btn">Ver Cursos</a>
            </div>
            <div class="col2">
                <img src="../images/subjects.jpg" alt="Cursos Registrados">
            </div>
        </div>

        <!-- Sección de Registro -->
        <div class="row2">
            <div class="col2">
                <img src="../images/register.jpg" alt="Registro de Cursos">
            </div>
            <div class="col2">
                <h1>Registro</h1>
                <p class="fs-5 fw-bold">Ayudando a los estudiantes con el proceso de registro.</p>
                <p class="fs-5">La Oficina del Registro Universitario está aquí para apoyarte en el proceso de inscripción.<br>
                    Para registrar un curso, presiona el botón <strong>Agregar Cursos</strong>.
                </p>
                <a href="enroll.php" class="btn">Agregar Cursos</a>
            </div>
        </div>

        <!-- Sección de Horario -->
        <div class="row2">
            <div class="col2">
                <p>Universidad <b>Horario de Clases</b><br>
                    Para obtener información sobre cómo leer el horario, consulta la leyenda del mismo.<br>
                    Para ver el horario de clases, presiona el botón <strong>Ver Horario de Clases</strong>.
                </p>
                <a href="viewtimetable.php" class="btn">Ver Horario de Clases</a>
            </div>
            <div class="col2">
                <img src="../images/project-manager-with-time-schedule-as-background-vector-21939720.jpg" alt="Horario de Clases">
            </div>
        </div>

        <!-- Sección de Notas -->
        <div class="row2">
            <div class="col3">
                <img src="../images/png-transparent-computer-icons-grading-in-education-test-school-quiz-text-logo-university.png" alt="Notas">
            </div>
            <div class="col3">
                <p>Ver los cursos calificados</p>
                <a href="transcript.php" class="btn3">Ver Notas</a>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2025 Harry Henao</p>
        </footer>

    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>
