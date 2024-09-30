let citys = {
    'Chichago':'latitude=41.883228&longitude=-87.632401',
    'Budapest':'latitude=47.497913&longitude=19.040236',
    'London':'latitude=51.507351&longitude=-0.127758',
    'Moszkva':'latitude=55.755825&longitude=37.617298',
    'NewYork':'latitude=40.712776&longitude=-74.005974',
    'Szentendre':'latitude=47.673470&longitude=19.072540',
    'SanFrancisco':'latitude=46.523819&longitude=-80.912651',
    'Madrid':'latitude=40.416775&longitude=-3.703790',
    'Parizs':'latitude=48.856613&longitude=2.352222',
    'Tokio':'latitude=39.758602&longitude=-104.997437'
}

function runTemp(event, a){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function (){
        console.log(JSON.parse(this.responseText));
        let time = JSON.parse(this.responseText).current.time
        document.getElementById("homerseklet").innerHTML+=`<p>Jelnleg ${JSON.parse(this.responseText).current.temperature_2m} fok van ${event.target.textContent}, es ${normalTime(time)} az ido</p>`
        //Nem tudom megadni az ottani idot, mert a weather api nem adja azt vissza (vagy csak en nem vettem eszre)
        document.getElementById('button').style.display='block'
    }
    xhttp.open("GET", `https://api.open-meteo.com/v1/forecast?${a}&current=temperature_2m`)
    xhttp.send()
}
function normalTime(a){
    let newTime=''
    for(let i = 0; i<a.length; i++){
        if(a[i]=='T'){
            newTime+=" "
        }
        else{
            newTime+=a[i]
        }
    }
    return newTime
}
function Clear(){
    document.getElementById('homerseklet').innerHTML=""
    document.getElementById('button').style.display='none'

}
// cer console.error()
// fre array.forEach(currentItem => {})
// nfn const add = (params) => {}
// clg console.log()
// prom return new Promise((resolve, reject) => {});
// thenc .then((res) => {}).catch((err) => {});
// ccl console.clear()
// clt  console.table()