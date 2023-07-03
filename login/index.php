<?php
$_SESSION['pagina'] = 'login';
require_once("../assets/includes/header.php");

if (isset($_SESSION["error"])) { //Error feedback van login
  if ($_SESSION["error"] != 0) {
    echo "<script>
    window.alert($_SESSION[error]);
    </script>";
    $_SESSION["error"] = "0";
  }
}

if (isset($_SESSION['docent'])):
  echo $_SESSION['docent']; ?>
  <script>location.replace("../docent/index.php") </script>.
<?php endif; ?>

<main id="main">

  <section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
    style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">

      <div class="login-block">
        <div class="container mlogin">
          <div id="login">
            <h1>Docent en admin login</h1>
            <form action="" id="loginform" method="post" name="loginform">
              <p>
                <label for="user_login">
                  <input class="input form-control" name="user" placeholder="Username" size="32" type="text" value=""
                    required>
                </label>
              </p>
              <p>
                <label for="user_pass">
                  <input class="input form-control" name="pw" placeholder="Password" size="32" type="password" value=""
                    required>
                </label>
              </p>

              <div class="text-center">
                <button id="login" name="submit" type="submit">Log In!</button>
              </div>


            </form>
          </div>


          </form>
        </div>
      </div>

    </section>
  </section>


  <?php
  require_once("../assets/includes/footer.php");
  ?>