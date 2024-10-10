<?php require_once 'header.php' ?>

<?php
require_once '../database/database.php';
if (isset($_GET['klan'])) {

    $query = "SELECT * FROM torpek WHERE klan = '" . $_GET['klan'] . "'";
    $result = mysqli_query($connection, $query);
} else {

    $query = "SELECT * FROM torpek";
    $result = mysqli_query($connection, $query);
}
/* var_dump($result); */
$query = "SELECT * FROM `torpek` GROUP BY klan";
$no1Feladat = mysqli_query($connection, $query);



?>



<h1>Törpék listálya</h1>

<form method="GET">
    <div class="row">
        <div class="col-6">
            <select name="klan" id="klan">
                <option value="" disabled selected>Valassz egy klnat</option>
                <?php
                $value;
                while ($row = mysqli_fetch_assoc(result: $no1Feladat)) {
                    echo "<option value='" . $row["klan"] . "'>" . $row["klan"] . "</option>";
                }
                ?>
            </select>
            <input type="radio" id="ferfi" name="fav_language" value="ferfi">
            <label for="ferfi">ferfi</label>
            <input type="radio" id="no" name="fav_language" value="no">
            <label for="no">no</label><br>
            <?php
            if (isset($_GET["fav_language"])) {
                $checked = $_GET["fav_language"];
                if ($checked == "ferfi") { 
                    $query = "SELECT * FROM torpek WHERE nem = 'F'";
                    $result = mysqli_query($connection, $query);
                } else if ($checked == "no") {
                    $query = "SELECT * FROM torpek WHERE nem = 'N'";
                    $result = mysqli_query($connection, $query);
                }
            }
            ?>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary">Szűrés</button>
        </div>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Clan</th>
            <th scope="col">Sex</th>
            <th scope="col">Height</th>
            <th scope="col">weight</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            /* var_dump($row ); */
            $nem = $row["nem"] == 'F' ? 'Férfi' : 'Nő';
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["nev"] . '</td>';
            echo '<td>' . $row["klan"] . '</td>';
            echo '<td>' . $nem . '</td>';
            echo '<td>' . $row["magassag"] . '</td>';
            echo '<td>' . $row["suly"] . '</td>';
            echo '</tr>';
        }
        ?>








    </tbody>
</table>


<?php require_once 'footer.php' ?>