Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
}

    function toTable(obj) {
        var refTable = document.getElementById("myTab");
        var nouvelleLigne = refTable.insertRow(0);
    
        var nom = nouvelleLigne.insertCell(0);
        nouveauTexte = document.createTextNode(obj.name)
        nom.appendChild(nouveauTexte);
    
        var tribu = nouvelleLigne.insertCell(1);
        if(obj.tribe != null){
            nouveauTexte = document.createTextNode(obj.tribe)
            tribu.appendChild(nouveauTexte);
        }

        var boutton = nouvelleLigne.insertCell(2);
        nouveauTexte = document.createElement("span");
        nouveauTexte.innerHTML= '<button id=' + obj.id +' onclick="onclickinfo(' + obj.id +')"> Plus d\'info </button>';
        boutton.appendChild(nouveauTexte);



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

