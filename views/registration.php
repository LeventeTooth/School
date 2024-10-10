<?php require_once 'header.php'; ?>
<!-- Main Content Div után-->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registration</h4>
                <p class="card-text text-danger">Input fields with * shall be filled or else you shall not pass!</p>
                <hr class="mb-3">
                <form method="POST" onsubmit="formValidate();" id="registerForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Name</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                            placeholder="" required <?php echo isset($_GET["username"]) ? 'value="'.$_GET["username"].'"' : ''; ?> 
                            style="<?php echo isset($_GET["error"]) && $_GET["error"] == "userExist" ? "border-color: red" : "" ?>"
                            />
                        <small id="helpId" class="form-text text-muted">
                            <?php echo isset($_GET["error"]) && $_GET["error"] == "userExist"  ? "A felhasználónév már foglalt" : "Used to log in to the system." ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>

                        <div id="passwordContainer">
                            <input type="password" class="form-control" name="password" id="password"
                                aria-describedby="helpId" placeholder="" required onkeyup="validate(this)" />
                            <i class="fa-solid fa-eye" id="eye-icon" onclick="showContent('password', this)"></i>
                        </div>

                        <ul id="pwreq">
                            <li><small id="help_8" class="form-text text-muted">Min. 8 characters. </small></li>
                            <li><small id="help_C" class="form-text text-muted">Min. 1 capital character.</small></li>
                            <li><small id="help_N" class="form-text text-muted">Min. 1 noncapital character.</small>
                            </li>
                            <li><small id="help_S" class="form-text text-muted">Min. 1 special character.</small></li>
                            <li><small id="help_No" class="form-text text-muted">Min. 1 number.</small></li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="passwordConfirm" class="form-label">Password Confirm</label>
                        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                            aria-describedby="helpId" placeholder="" required />
                        <small id="helpId" class="form-text text-muted">Please confirm your password.</small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                            placeholder="" required />
                        <small id="helpId" class="form-text text-muted">E-mail address to verify your
                            registration.</small>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" name="submit" id="submit" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<script>


    let showContent = (id, eye) => {
        let input = document.getElementById(id);
        let hidden = input.getAttribute("type");

        if (hidden == "password") {
            input.setAttribute("type", "text");
            eye.setAttribute("class", "fa-solid fa-eye-slash");
        }
        else {
            input.setAttribute("type", "password");
            eye.setAttribute("class", "fa-solid fa-eye");
        }
    }

    let validate = (input) => {

        let password = input.value;
        let help_8 = document.getElementById("help_8");
        let help_C = document.getElementById("help_C");
        let help_N = document.getElementById("help_N");
        let help_S = document.getElementById("help_S");
        let help_No = document.getElementById("help_No");

        console.log(password.length);

        /* Nyolc karakter */
        if ((password.length) >= 8) {
            help_8.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_8.classList.add("text-success");   /* Zöldre vált */
            help_8.classList.add("fw-bold"); /* Félkövér lesz */
            help_8.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck") == null) {
                help_8.innerHTML += '<i class="fa-regular fa-circle-check text-success" id="successCheck"></i>';
            }
        }
        else if ((password.length) < 8 && password.length > 0) {
            help_8.setAttribute("class", "form-text text-muted");
            help_8.classList.add("text-danger"); /* Pirosra vált */
            help_8.classList.add("fw-bold");
            help_8.classList.remove("text-muted");

            /* Elvenni a pipát ha van */
            if (document.getElementById("successCheck") != null) {
                document.getElementById("successCheck").remove();
            }
        }
        else {
            help_8.setAttribute("class", "form-text text-muted");

            /* Elvenni a pipát ha van (mert ha egybe törli az egészet, akkor a piros nem biztos, hogy megvalósul.) */
            if (document.getElementById("successCheck") != null) {
                document.getElementById("successCheck").remove();
            }
        }

        /* Min 1 capital */
        let pattern = /[A-Z]/;
        if (pattern.test(password)) {
            help_C.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_C.classList.add("text-success");   /* Zöldre vált */
            help_C.classList.add("fw-bold"); /* Félkövér lesz */
            help_C.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_C") == null) {
                help_C.innerHTML += '<i class="fa-regular fa-circle-check text-success" id="successCheck_C"></i>';
            }
        }
        else if (password.length > 0) {
            help_C.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_C.classList.add("text-danger");   /* Zöldre vált */
            help_C.classList.add("fw-bold"); /* Félkövér lesz */
            help_C.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_C") != null) {
                document.getElementById("successCheck_C").remove();
            }
        }
        else {
            help_C.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_C") != null) {
                document.getElementById("successCheck_C").remove();
            }
        }


        /* Min 1 non capital */
        pattern = /[a-z]/;
        if (pattern.test(password)) {
            help_N.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_N.classList.add("text-success");   /* Zöldre vált */
            help_N.classList.add("fw-bold"); /* Félkövér lesz */
            help_N.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_N") == null) {
                help_N.innerHTML += '<i class="fa-regular fa-circle-check text-success" id="successCheck_N"></i>';
            }
        }
        else if (password.length > 0) {
            help_N.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_N.classList.add("text-danger");   /* Zöldre vált */
            help_N.classList.add("fw-bold"); /* Félkövér lesz */
            help_N.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_N") != null) {
                document.getElementById("successCheck_N").remove();
            }
        }
        else {
            help_N.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_N") != null) {
                document.getElementById("successCheck_N").remove();
            }
        }


        /* Min 1 Special */
        pattern = /[!%&@#]/;
        if (pattern.test(password)) {
            help_S.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_S.classList.add("text-success");   /* Zöldre vált */
            help_S.classList.add("fw-bold"); /* Félkövér lesz */
            help_S.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_S") == null) {
                help_S.innerHTML += '<i class="fa-regular fa-circle-check text-success" id="successCheck_S"></i>';
            }
        }
        else if (password.length > 0) {
            help_S.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_S.classList.add("text-danger");   /* Zöldre vált */
            help_S.classList.add("fw-bold"); /* Félkövér lesz */
            help_S.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_S") != null) {
                document.getElementById("successCheck_S").remove();
            }
        }
        else {
            help_S.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_S") != null) {
                document.getElementById("successCheck_S").remove();
            }
        }

        /* Min 1 Number */
        pattern = /[0-9]/;
        if (pattern.test(password)) {
            help_No.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_No.classList.add("text-success");   /* Zöldre vált */
            help_No.classList.add("fw-bold"); /* Félkövér lesz */
            help_No.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_No") == null) {
                help_No.innerHTML += '<i class="fa-regular fa-circle-check text-success" id="successCheck_No"></i>';
            }
        }
        else if (password.length > 0) {
            help_No.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            help_No.classList.add("text-danger");   /* Zöldre vált */
            help_No.classList.add("fw-bold"); /* Félkövér lesz */
            help_No.classList.remove("text-muted"); /* Kiszedjük a szürke nézetet */

            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_No") != null) {
                document.getElementById("successCheck_No").remove();
            }
        }
        else {
            help_No.setAttribute("class", "form-text text-muted"); /* Eredeti állapot */
            /* Hozzáadni egy pipát a végéhez */
            if (document.getElementById("successCheck_No") != null) {
                document.getElementById("successCheck_No").remove();
            }
        }

    }

    let formValidate = () => {

        let hasError = false;

        password = document.getElementById("password");
        passwordConfirm = document.getElementById("passwordConfirm");

        console.log(password);
        console.log(passwordConfirm.value);
        
        
        if (password.value != passwordConfirm.value) {
            password.setAttribute("style", "border-color: red !important;");
            passwordConfirm.setAttribute("style", "border-color: red !important;");

            let span = document.createElement("span");
            span.innerHTML = "A két jelszó nem egyezik. <br>";
            span.setAttribute("class", "form-text text-muted");
            passwordConfirm.after(span);
            hasError = true;
        }

        if (hasError) {
            event.preventDefault();
            console.log("Form prevented from submitting");
        }
        else {
            let form = document.getElementById("registerForm");
            form.setAttribute("action", "../controllers/register.php");
            form.submit();
        }
    }
</script>
<!-- END Main Content Div lezárás előtt-->
<?php require_once 'footer.php'; ?>