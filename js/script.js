Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
}

    function toTopic(topic,comment) {
        var topics = document.getElementById("Topics");
        nouveauTexte = document.createElement("span");
        nouveauTexte.innerHTML+='<div> date :' + topic.date +' <br> titre : '+topic.titre+' <br> contenu : '+comment[1]+' </div>';
        topics.appendChild(nouveauTexte);
    }

function onclickinfo(id) {
    getcharacterById(id);
}

function characterdata(data,id) {
    document.getElementById(id).innerHTML=data.name +'  </br> agility :'+data.agility+' </br> strength :'+data.strength+' </br> intelligence :'+data.intelligence+' </br> class :'+data.class;
}

function getPersonnage(){
    const f = fetch('http://bean.example.com/api/characters');
    f.then(response => response.json()).then(data => 
        {
            console.log(data);
            data.forEach((element) => {
                toTable(element);
            });
        });

    f.catch(function(data) { 
    });
}
function getcharacterById(id){
    const f = fetch('http://bean.example.com/api/character/'+id);
    f.then(response => response.json()).then(data => 
        {
            characterdata(data[0],id);
        });

    f.catch(function(data) { 
    });
}

