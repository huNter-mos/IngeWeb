function getTopics(){
    const f = fetch('http://bean.example.com/api/index.php?url=topics');
    f.then(response => response.json()).then(data => {
        data.forEach(element => {
            topics(element);
        });
        });

    f.catch(function(data) { 
    });
}

function getTopicById(id){
    const f = fetch('http://bean.example.com/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        });

    f.catch(function(data) { 
    });
}


function topics(topic){
    var topics = document.getElementById("topics");
    if(topics != null)
    topics.style.display = "flex"

    topicDiv = document.createElement("span");
    topicDiv.innerHTML+='<div  id="topic" class="topicMain"> '+topic.titre+'<div  id="content" class="contentMainTopic">'+topic.message+'</div></div>';

    topicDiv.addEventListener('click',function () {
        window.location.assign('topic.php?topic='+topic.id);
    })


    topics.appendChild(topicDiv);
}

function toDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear(); 

    today = yyyy + '-' + mm + '-' + dd;
    return today
}
function topicForm(id) {
    if(id != "x"){
        var title = document.getElementById("postTitle").value;
        var content = document.getElementById("postContent").value;
        var date = toDate();
        var categorie = 1;
        var req = 'http://bean.example.com/api/index.php?url=newTopic&titre='+title+'&content='+content+'&date='+date+'&categorie='+categorie+'&userId='+id;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", req, true);
        xhttp.send(null);
    }else{
        console.log("baise tes morts");
    }

}
function openForm() {
    document.getElementById("myForm").style.display = "block";
}
  
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

window.onload=function(){
        getTopics();
  };