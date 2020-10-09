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


function topics(topic){
    var topics = document.getElementById("topics");
    topics.style.display = "flex"


    topicDiv = document.createElement("span");
    topicDiv.innerHTML+='<div  id="topic" class="topic"> '+topic.titre+'</div>';
    topicDiv.style.margin = "1em";
    topicDiv.style.padding = "1em";
    topicDiv.style.overflow = "hidden";
    topicDiv.style.backgroundColor = "#a9cad6";
    topicDiv.style.boxShadow ="1px 1px 12px #555";
    topicDiv.style.maxWidth = "15vw";
    topicDiv.style.maxHeight = "20vh";
    topicDiv.style.fontWeight = "bold";
    topicDiv.style.fontSize="large";
    topicDiv.style.textAlign="center"
    topicDiv.addEventListener('click',function () {
        window.location.assign('topic.html?topic='+topic.id);
    })


    content = document.createElement("span");
    content.innerHTML+='<div  id="content" class="content">'+topic.message+'</div>';
    content.style.textOverflow ="ellipsis";
    content.style.fontWeight = "normal";
    content.style.fontSize="medium";


    topicDiv.appendChild(content)
    topics.appendChild(topicDiv);
}

window.onload=function(){
        getTopics();
  };