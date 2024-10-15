
let products = [
    { "product": "Dino", "img1": "PE1.png", "img2": "PE2.png", "img3": "PE3.png", "time": "1 ora 7 perc", "material": "PLA", "size": "2.8x10x7.4", "price": 500, "id": "1"},
  ]

  function Add(){
    alert("aa")
    document.getElementById('content').innerHTML=`    <div class="container" >
    <div class="row" id="row"></div>
  </div>`
    products.forEach(a => {
      FuckIt["a"+a.id]=0
        let s = `            
          <div class="col-sm-12 col-md-4 col-lg-3">
          <div class="card" style="margin-top: 20px; padding: 5px;">
              <div id="${a.id}" class="carousel slide" style="padding: 10px">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="./img/${a.img1}" class="d-block w-100" alt="1">
                    </div>
                    <div class="carousel-item">
                      <img src="./img/${a.img2}" class="d-block w-100" alt="2">
                    </div>
                    <div class="carousel-item">
                      <img src="./img/${a.img3}" class="d-block w-100" alt="3">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#${a.id}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#${a.id}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
              </div>
              <div class="card-body">
                  <ul class="list-group">
                  <li class="list-group-item active" aria-current="true">${a.product}</li>
                      <li class="list-group-item"><b>Nyomtatsai ido: </b>${a.time}</li>
                      <li class="list-group-item"><b>Anyaga: </b>${a.material}</li>
                      <li class="list-group-item"><b>Merete (cm): </b>${a.size}</li>
                      <li class="list-group-item"><b>Ara: </b>${a.price}</li>
                  </ul>
                <a href="#" class="btn btn-primary" style="margin-top: 10px;" onclick="Buy(${a.id})">Buy it</a>
              </div>
          </div>
      </div>`
      document.getElementById('row').innerHTML+=s
    });
  }