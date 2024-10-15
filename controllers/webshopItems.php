<?php
require '../database/database.php';

$sql = "SELECT * FROM termekek";
$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-sm-12 col-md-6 col-lg-4 mb-5">
        <div class="card" style="margin-top: 20px; padding: 5px;">
            <div id="'.$row["id"].'" class="carousel slide" style="padding: 10px">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../public/img/'.$row["picture1"].'" class="d-block w-100 mySize" alt="1">
                  </div>
                  <div class="carousel-item">
                    <img src="../public/img/'.$row["picture2"].'" class="d-block w-100 mySize" alt="2">
                  </div>
                  <div class="carousel-item">
                    <img src="../public/img/'.$row["picture3"].'" class="d-block w-100 mySize" alt="3">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#'.$row["id"].'" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#'.$row["id"].'" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                <li class="list-group-item active" aria-current="true">'.$row["name"].'</li>
                    <li class="list-group-item"><b>Anyaga: </b>'.$row["material"].'</li>
                    <li class="list-group-item"><b>Merete (cm): </b>'.$row["size"].'</li>
                    <li class="list-group-item"><b>Ara: </b>'.$row["price"].'</li>
                    <li class="list-group-item"><b>Mennyiseg: </b>'.$row["count"].'</li>
                </ul>
              <a href="#" class="btn btn-primary" style="margin-top: 10px;" onclick="Buy(`'.$row["name"].'`,'.$row["price"].')">Buy it</a>
            </div>
        </div>
    </div>';
    }
}