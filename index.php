<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <!-- 3.3 feladat -->
        <div class="row">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="" name="fokInput"
                        required>
                    <label for="cFok">C fok</label>
                </div>
                <button class="btn btn-primary">Kuld</button>
                <?php
                /* 3.3 megoldas */
                $fok;
                $farenheit;
                if (isset($_GET["fokInput"])) {
                    $fok = $_GET["fokInput"];
                    $farenheit = $fok * 1.8;
                    /* 3.3 kiiras */
                    echo "A " . $fok . " ennyi farenheit: " . $farenheit . "";
                }
                ?>
            </form>
        </div>
        <!-- 3.4 feladat -->
        <div class="row">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput1" placeholder="" name="testTomeg"
                        required>
                    <label for="testTomeg">Test tomeg</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput2" placeholder="" name="testMagassag"
                        required>
                    <label for="testMagassag">Test magassag (cm)</label>
                </div>
                <button class="btn btn-primary">Kuld</button>
                <?php
                /* 3.4 megolas */
                $testTomeg;
                $testMagassag;
                if (isset($_GET["testTomeg"]) && isset($_GET["testMagassag"])) {
                    $testTomeg = $_GET["testTomeg"];
                    $testMagassag = $_GET["testMagassag"];
                    $testTomegIndex = $testTomeg / (($testMagassag / 100) ** 2);
                    /* 3.4 kiiras */
                    switch ($testTomegIndex) {
                        case ($testTomegIndex < 18.5):
                            echo 'Sovány vagy, a bmi-d: ' . $testTomegIndex;
                            break;
                        case ($testTomegIndex < 24):
                            echo 'Normál testalkatú vagy, a bmi-d: ' . $testTomegIndex;
                            break;
                        case ($testTomegIndex < 35):
                            echo 'Túlsúlyos vagy (1. szint), a bmi-d: ' . $testTomegIndex;
                            break;
                        case ($testTomegIndex < 40):
                            echo 'Túlsúlyos vagy (2. szint), a bmi-d: ' . $testTomegIndex;
                            break;
                        case ($testTomegIndex > 40):
                            echo 'Túlsúlyos vagy (3. szint), a bmi-d: ' . $testTomegIndex;
                            break;
                    }
                }
                ?>
            </form>
        </div>
        <!-- 3.5 feladat -->
        <div class="row">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="" name="isIce" required>
                    <label for="cFok">C fok</label>
                </div>
                <button class="btn btn-primary">Kuld</button>
                <!-- 3.5 megoldas -->
                <?php
                $isIce;
                if (isset($_GET['isIce'])) {
                    $isIce = $_GET['isIce'];
                    /* 3.5 kiiras */
                    switch ($isIce) {
                        case ($isIce < 0):
                            echo 'Szilárd';
                            break;
                        case ($isIce > 0 && $isIce < 100):
                            echo 'Folyékony';
                            break;
                        case ($isIce > 100):
                            echo 'Gőz';
                            break;
                    }
                }
                ?>
            </form>
        </div>
        <!-- 3.6 -->
        <div class="row">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="string" class="form-control" id="floatingInput1" placeholder="" name="elsoKordi"
                        required>
                    <label for="testTomeg">első kordináta</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="string" class="form-control" id="floatingInput2" placeholder="" name="masodikKordi"
                        required>
                    <label for="testMagassag">második kordináta</label>
                </div>
                <button class="btn btn-primary">Kuld</button>
                <?php
                $x;
                $y;
                $tavolsag;
                /* 3.6 megoldas */
                if(isset($_GET['elsoKordi']) && isset($_GET['masodikKordi'])){
                    $x = explode($_GET['elsoKordi'], ";");
                    $y = explode($_GET['masodikKordi'], ";");
                    $tavolsag = ((((int)$x[0]-(int)$x[1])**2)+(((int)$y[0]-(int)$y[1])**2))**0.5;
                    /* 3.6 kiiras */
                    echo 'A két pont közti táv: ' . $tavolsag;
                }
                ?>
            </form>
        </div>
                <!-- 3.7 feladat -->
                <div class="row">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="" name="pont" required>
                    <label for="cFok">Pontszam</label>
                </div>
                <button class="btn btn-primary">Kuld</button>
                <!-- 3.7 megoldas -->
                <?php
                $pont;
                if (isset($_GET['pont'])) {
                    $pont = $_GET['pont'];
                    /* 3.7 kiiras */
                    switch ($pont) {
                        case ($pont>100 || $pont< 0):
                            echo 'nem jo a szam';
                            break;
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>