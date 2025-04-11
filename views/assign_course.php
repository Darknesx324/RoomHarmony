<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profesor - Curso</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../images/assets/1597.png">
    <link rel="stylesheet" href="../css/fourpages.css" />
  </head>

  <body>
    <div class="navbar">
      <div class="logo">
      <a href="#"><img src="../images/assets/1597.png" alt="" width="80px" /></a>
      </div>
      <nav class="the rest">
        <ul id="MenuItems">
          <li>
            <a href="admin_view.php" title="return"><i class="fa fa-arrow-left"></i></a>
          </li>
          <li>
            <a href="#" title="home"><i class="fas fa-home"></i></a>
          </li>
          <li>
            <a href="" title="contact us"><i class="fas fa-phone"></i></a>
          </li>
          <li>
            <a href="" title="about us"><i class="fas fa-info"></i></a>
          </li>
        </ul>
      </nav>
    </div>
    <h1>Assignacion de Cursos</h1><br>
    <div class="container">
      <form action="../controller/assignCourses.php" method="POST">
        <!--SELECT1-->
        <label for="subject">Asignatura</label>
        <select id="subject" name="subject">
          <option value="" disabled selected hidden>Seleccionar Asignatura</option>
          <?php
          include '../include/DatabaseClass.php';

          $db = new database();
          $query = "SELECT * FROM course";
          $result = $db->selectQuery($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <option value="<?php echo $row["code"]; ?>"><?php echo $row["name"]; ?></option>
            <?php } ?>
          <?php } else { ?>
            <option value="null">Null</option>
          <?php } ?>
        </select>
        <!--/SELECT-->
        <br />
        <!--SELECT2-->
        <label for="profname">Profesor</label>
        <select id="profname" name="profname">
          <option value="" disabled selected hidden>Seleccionar Profesor</option>
          <?php
          $query = "SELECT * FROM professor";
          $result = $db->selectQuery($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $name = $row["firstname"] . " " . $row["lastname"];
          ?>
              <option value="<?php echo $row["national_id"]; ?>"><?php echo $name; ?></option>
            <?php } ?>
          <?php } else { ?>
            <option value="null">Null</option>
          <?php }
          $db->close(); ?>
        </select>
        <!--/SELECT-->
        <br />
        <!--SELECT3-->
        <label for="room">SALA</label>
        <select id="hall" name="hall">
          <option value="" disabled selected hidden>Selecciona SALA</option>
          <?php
          $x = 1;
          while ($x != 11) {
          ?>
            <option value="<?php echo "SALA " . $x; ?>"><?php echo "SALA " . $x; ?></option>
          <?php $x++;
          } ?>
        </select>
        <!--/SELECT-->
        <br />
        <!--SELECT4-->
        <label for="day">Dia</label>
        <select id="day" name="day">
          <option value="" disabled selected hidden>Selecionar Dia</option>
          <option value="Saturday">Sabado</option>
          <option value="Sunday">Viernes</option>
          <option value="Monday">Lunes</option>
          <option value="Tuesday">Martes</option>
          <option value="Wednesday">Miercoes</option>
          <option value="Thursday">Jueves</option>
        </select>
        <!--/SELECT-->
        <br />
        <div>
          <label for="time">Tiempo</label>
          <select id="time" name="time">
            <option value="" disabled selected hidden>Selecciones Horario</option>
            <?php
            $time = array("08:00:00", "10:00:00", "12:00:00", "14:00:00", "16:00:00");
            $size = count($time);
            for ($i = 0; $i < $size; $i++) {
            ?>
              <option value="<?php echo $time[$i]; ?>"><?php echo $time[$i]; ?></option>
            <?php } ?>
          </select>
          <p style="color: red;">'Los cursos requieres 2 horas minimo.'</p>
        </div>
        <button class="btn btn-success" style="width: 100%;" type="submit" value="Submit">Asignar</button>
      </form>
    </div>
    <!-- Modal -->
    <div class="modal" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            if (isset($_GET["message"])) {
              include '../models/functions.php';
              $msg = val($_GET["message"]);
              echo $msg;
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../css/bootstrap-4.6.1/js/bootstrap.min.js"></script>


    <?php if (isset($msg)) {
      $url = strtok($_SERVER['REQUEST_URI'], '?');
    ?>
      <script>
        console.log("yes");
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
        myModal.show()

        // remove query string
        window.history.pushState({}, '', '<?php echo $url; ?>');
      </script>
    <?php } ?>
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