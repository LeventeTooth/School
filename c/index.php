<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>C#-feladatok 4.5-4.11</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <!-- 4.6 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" name="n" placeholder="">
                        <label for="n">Hany oldalu a sokszog?</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    if (isset($_GET["n"])) {
                        $n = $_GET["n"];
                        $oneSide = ($n - 2) * ($n - 2) * 6;
                        $twoSide = ($n - 2) * 12;
                        $threeSzide = 8;
                        $nullSide = ($n - 2) * ($n - 2) * ($n - 2);
                        echo "1 oldal: " . $oneSide . "<br>" . "2 oldal: " . $twoSide . "<br>" . "3 oldal: " . $threeSzide . "<br>" . "0 oldal: " . $nullSide;
                    }
                    ?>
                </form>
                <!-- 4.7 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" name="number1" placeholder="">
                        <label for="number1">szam</label>
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" name="number2" placeholder="">
                        <label for="umber2">szam</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    if (isset($_GET["number1"]) && isset($_GET["number2"])) {
                        $n1 = $_GET["number1"];
                        $n2 = $_GET["number2"];
                        if ($n1 == $n2)
                            echo "ugyan akkorak, adj meg ujra szamokat";
                        else if ($n1 > $n2)
                            echo $n1 - $n2;
                        else
                            echo $n2 - $n1;
                    }
                    ?>
                </form>
                <!-- 4.8 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="class" placeholder="">
                        <label for="class">Osztaly</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    $dictionary = ["1" => "Buko Istvan", "2" => "Legalabb gorbul", "3" => "Ezzel mar mehetsz kozmunkara", "4" => "4ea az nem is rosz", "5" => "EEz jo"];
                    if (isset($_GET["class"])) {
                        $inp = $_GET["class"];
                        if (isset($dictionary[$inp])) {
                            echo "" . $dictionary[$inp] . "";
                        } else
                            echo "nincsen ilyen osztaly";
                    }
                    ?>
                </form>
                <!-- 4.9 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="numbers" placeholder="">
                        <label for="numbers">szamok</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    if (isset($_GET["numbers"])) {
                        $inp = explode(" ", $_GET["numbers"]);
                        $min = $inp[0];
                        $max = $inp[0];
                        if (count($inp) == 3) {
                            foreach ($inp as $v) {
                                if ($v < $min) {
                                    $min = $v;
                                }
                                if ($v > $max) {
                                    $max = $v;
                                }
                            }
                            echo "legnagyobb: " . $max . "<br>" . "legkisebb: " . $min;
                        } else
                            echo "Tobb szam van mint 3";
                    }
                    ?>
                </form>
                <!-- 4.10 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="numbers3" placeholder="">
                        <label for="numbers3">szamok</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    if (isset($_GET["numbers3"])) {
                        $inp = explode(" ", $_GET["numbers3"]);
                        $makealbe = true;
                        if (count($inp) == 3) {
                            if ($inp[0] + $inp[1] < $inp[2])
                                $makealbe = false;
                            if ($inp[1] + $inp[2] < $inp[0])
                                $makealbe = false;
                            if ($inp[0] + $inp[2] < $inp[1])
                                $makealbe = false;
                            if ($makealbe)
                                echo "Szerkesztheto";
                            else
                                echo "Nem szerkesztheto";
                        } else
                            echo "Tul sok a szam";
                    }
                    ?>
                </form>
                <!-- 4.11 -->
                <form method="GET" class="mt-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="numbers4" placeholder="">
                        <label for="numbers4">szamok</label>
                    </div>
                    <button class="btn btn-primary">Kuld</button>
                    <br>
                    <?php
                    if (isset($_GET["numbers4"])) {
                        $inp = explode(" ", $_GET["numbers4"]);
                        $sameNumbercount = 0;
                        for ($i = 0; $i < count($inp); $i++) {
                            $na = $inp[$i];
                            for ($j = 0; $j < count($inp); $j++) {
                                if ($na == $inp[$j]) {
                                    $sameNumbercount += 1;
                                    break;
                                    /* meglehetne csinalni brake nelkul is csak igy is mukodik */
                                }
                            }
                        }

                        if ($sameNumbercount == 3)
                            echo "Egyenlo oldalu 3szog";
                        if ($sameNumbercount == 2)
                            echo "Egyenlo szaru 3szog";
                        else
                            echo "Altalanos 3szog";
                    }
                    ?>
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</body>

</html>