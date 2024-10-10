<?php require_once 'header.php' ?>
<!-- content -->
<div class="container mt-5">
    <div class="backColor">

        <form method="GET">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="" required>
                <label for="floatingInput">Hős neve</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="hp" placeholder="" value="1000" required>
                <label for="floatingInput">Hős életereje </label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="armor" placeholder="" value="20"
                    required>
                <label for="floatingInput">Hős pancelja</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="damage" placeholder="" required>
                <label for="floatingInput">Ellenfél sebzése</label>
            </div>
            <button class="btn btn-danger" name="submit" type="submit">Harc</button>
    
            <?php
            if (isset($_GET['damage']) && isset($_GET["hp"])) {
                $DMG = rand(1, 10) * $_GET["damage"];
                $takenDMG = $DMG-$_GET["armor"];
                if($takenDMG<=0){
                    echo "A pajzs megfogat a sebzést";
                }
                elseif($_GET["hp"]-$takenDMG >=0){
                    echo "Ennyit sebzést kapott a karakterunk " . $takenDMG;
                }
                else{
                    echo "A karakterunk meghalt, tul nagy szebest kapott (sebszes: " . $takenDMG . ")";
                }
            }
            ?>
        </form>
    </div>
</div>
<!-- end contetnt --div.container>
<?php require_once 'footer.php' ?>