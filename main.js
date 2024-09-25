let locations = {
    "bp" : "latitude=19.040236&longitude=47.497913",
    "sze" : "latitude=47.673470&longitude=19.072540"
}

function click(){
    alert('aa')
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function (){
        document.getElementById('aaaa').innerHTML=JSON.parse(this.responseText).current.temperature_2m+" Fok van "+a+'n'
        //console.log(JSON.parse(this.responseText).current.temperature_2m);
    }
    xhttp.open("GET", `https://api.open-meteo.com/v1/forecast?${a}&current=temperature_2m`)
    xhttp.send()
}