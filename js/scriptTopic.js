function getTopicById(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        console.log(data[0]);
        topicView(data[0]);
        });

    f.catch(function(data) { 
    });
}
function getCommentbyTopic(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=comments/'+id);
    f.then(response => response.json()).then(data => 
        {
            console.log(data);
            //affichage commentView();
        });

    f.catch(function(data) { 
    });
}
function topicView(topic) {
    var topicView = document.getElementById("topicView");
    topicView.style.display = "flex";
    topicView.style.flexDirection = "colum";



    topicDiv = document.createElement("span");
    topicDiv.innerHTML+='<div  id="" class="topic"> titre : '+topic.titre+'</div>';
    topicDiv.style.margin = "1em";
    topicDiv.style.padding = "1em";
    topicDiv.style.backgroundColor = "#a9cad6";
    topicDiv.style.boxShadow ="1px 1px 12px #555";
    topicDiv.style.fontWeight = "bold";
    topicDiv.style.fontSize="larger";


    content = document.createElement("span");
    content.innerHTML+='<div  id="content" class="content"> contenu : '+topic.message+'</div>';
    content.style.textOverflow ="ellipsis";
    content.style.fontWeight = "normal";
    content.style.fontSize="large";

    topicDiv.appendChild(content)
    topicView.appendChild(topicDiv);
}
function commentVIew(data) {
    
}

window.onload=function(){
    const urlParams = new URLSearchParams(window.location.search);
    let topic = urlParams.get('topic');
    getTopicById(topic);
    getCommentbyTopic(topic);
};