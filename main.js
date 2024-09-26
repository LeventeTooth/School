let locations = {
    "bp" : "latitude=47.497913&longitude=19.040236",
    "ch" : "latitude=41.878113&longitude=-87.629799",
    "sze" : "latitude=47.673470&longitude=19.072540"
}

function runTemp(event, a){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function (){
        //console.log(JSON.parse(this.responseText).current.temperature_2m);
        document.getElementById("homerseklet").innerHTML=`Jelnleg ${JSON.parse(this.responseText).current.temperature_2m} fok van ${event.target.textContent}-en (-ban).`
    }
    xhttp.open("GET", `https://api.open-meteo.com/v1/forecast?${a}&current=temperature_2m`)
    xhttp.send()
    sevenDaysAgo(a)
}
function sevenDaysAgo(a){
    const xhttp = new XMLHttpRequest()
    xhttp.onload = function (){
        let times = JSON.parse(this.responseText).hourly.time
        let temps = JSON.parse(this.responseText).hourly.temperature_2m
        //console.log(times);
        times.forEach(function callback(value, index) {
            if(value=="2024-09-19T12:00"){
                document.getElementById("homerseklet").innerHTML+=`${temps[index]} fok volt 1 hete 12:00-kor`
            }
            //console.log(`${index}: ${value}`);
          });
    }
    xhttp.open("GET", `https://api.open-meteo.com/v1/forecast?${a}&past_days=10&hourly=temperature_2m`)
    xhttp.send()
}


// cer console.error()
// fre array.forEach(currentItem => {})
// nfn const add = (params) => {}
// clg console.log()
// prom return new Promise((resolve, reject) => {});
// thenc .then((res) => {}).catch((err) => {});
// ccl console.clear()
// clt  console.table()