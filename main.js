let locations = {
    "bp" : "latitude=47.497913&longitude=19.040236",
    "ch" : "latitude=41.878113&longitude=-87.629799",
    "sze" : "latitude=47.673470&longitude=19.072540"
}

function runTemp(event, a){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function (){
        //console.log(JSON.parse(this.responseText).current.temperature_2m);
        document.getElementById("homerseklet").innerHTML=`Jelnleg ${JSON.parse(this.responseText).current.temperature_2m} fok van ${event.target.textContent}-en (-ban)`
    }
    xhttp.open("GET", `https://api.open-meteo.com/v1/forecast?${a}&current=temperature_2m`)
    xhttp.send()
}