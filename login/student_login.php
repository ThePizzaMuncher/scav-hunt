<?php
require_once("../assets/includes/header.php");
require_once("../assets/includes/conn.php");
?>


<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
    style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">
        <div class="login-block">
            <div class="container mlogin">
                <div class="login">
                    <h1>Student login</h1>
                    <form action="../assets/php/student_login_verw.php" id="loginform" method="post" name="loginform">
                        <p>
                            <label for="user_login">
                                <input class="input form-control" name="code" placeholder="Code" size="32" type="text"
                                    value="" required>
                            </label>
                        </p>
                        <p>
                            <label for="user_pass">
                                <input class="input form-control" name="naam" placeholder="Naam" size="32" type="text"
                                    value="" required>
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
if (isset($_SESSION["stl_fb"]) && $_SESSION["stl_fb"] != "0") { //Feedback van login actie
    echo "<script defer>
    setTimeout(() => {
        window.alert('" . $_SESSION["stl_fb"] . "');
    }, 200);
    </script>";
    $_SESSION["stl_fb"] = "0";
}
require_once("../assets/includes/footer.php");
?>