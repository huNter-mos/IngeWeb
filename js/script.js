function getTopics(){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=topics');
    f.then(response => response.json()).then(data => {
        data.forEach(element => {
            topics(element);
        });
        });

    f.catch(function(data) { 
    });
}

function getTopicById(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        });

    f.catch(function(data) { 
    });
}

function getCommentbyTopic(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=comments/'+id);
    f.then(response => response.json()).then(data => 
        {
        });

    f.catch(function(data) { 
    });
}

function topics(topic){
    console.log(topic);
    var topics = document.getElementById("topics");
    nouveauTexte = document.createElement("span");
    nouveauTexte.innerHTML+='<div class="topic"> date :' + topic.date_creation +' <br> titre : '+topic.titre+' <br> contenu : '+topic.message+' </div>';
    topics.appendChild(nouveauTexte);
}

window.onload=function(){
        getTopics();
        getTopicById(1);
        getCommentbyTopic(1);
  };