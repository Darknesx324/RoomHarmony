<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/1597.png">
        <link rel="stylesheet" href="../css/admin.css" />
    </head>

    <body>
        <div class="navbar">
            <div class="logo">
            <a href="#"><img src="../images/assets/1597.png" alt="" width="80px" /></a>
            </div>
            <nav class="the rest">
                <ul id="MenuItems">
                    <li><a href="#" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="../controller/LogoutController.php?SignOut=true" title="sign_out"><i class="fa fa-sign-out"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>

            </nav>

        </div>
        <div class="row1">
            <h1 style="font-size: 40px;text-align: center;font-weight: bold;">Bienvenido <?php echo $_SESSION['name']; ?></h1>
        </div>
        <div class="row2">
            <div class="col1">
                <p style="font-size: 30px;">Aqui puedes añadir<br> Nuevos niveles academicos!</p>
            </div>
            <div class="col1">
                <a href="addNewWholeLevel.php" class="btn">Añadir niveles</a>
            </div>
        </div>
        <div class="row2">
            <div class="col2">
                <p>Aqui puedes añadir <br> Nuevas asignaturas a distintos niveles</p>
                <a href="subject_insertion_form.php" class="btn">Añade nueva asignatura</a>
            </div>
            <div class="col2">
                <img src="../images/subjects.jpg" alt="img">
            </div>
        </div>
        <div class="row2">
            <div class="col3">
                <img src="../images/professor.jpg" alt="img">
            </div>
            <div class="col3">
                <p>Aqui puedes añadir a los profesores que necesiten espacios academicos</p>
                <a href="professor_insertion_form.php" class="btn3">Añadir profesor</a>
            </div>
            <div class="row" align="center">
                <form action="professorInDept.php" method="POST">
                    <label style="font-weight: bold;font-size:30px;" for="search">Buscar profesor por departamento</label>
                    <select style="width:50%" id="search" name="search">
                        <option value="null" selected>Seleccionar departamento</option>
                        <?php
                        include '../include/DatabaseClass.php';
                        $db = new database();
                        $sql = "SELECT * FROM department";
                        $result = $db->selectQuery($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <option value="null">Null</option>
                        <?php } ?>
                    </select>
                    <button class="btn" style="width:15%;" type="submit" name="submit">Buscar</button>
                </form>
            </div>
            <div class="row2">
                <div class="col2">
                    <p>Qué profesor enseñará qué materia, dónde y cuándo.</p>
                    <a href="assign_course.php" class="btn">Assignar cursos</a>
                </div>
                <div class="col2">
                    <img src="../images/course1.jpg" alt="img">
                </div>
            </div>

            <a href="registered_students_table.php" class="btn">Ver todos los estudiantes</a>

        </div>
        <footer>
            <p style="color:white;">Copyright &copy; 2025, Harry Henao</p>
        </footer>
    </body>

    </html>

<?php
} else {
    header("location:../index.php");
}
?>