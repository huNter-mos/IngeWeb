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
    topics.style.display = "flex";
    topics.style.flexWrap="wrap";

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
    var title = document.getElementById("postTitle").value;
    var content = document.getElementById("postContent").value;
    var errorPost = 0;
    title == "" ? errorPost = 1 : errorPost = 0;
    content == "" ? errorPost = 2 : errorPost = 0;
    if(id != "x" && errorPost == 0){
        while (content.indexOf("\n") > -1) content = content.replace("\n","<br>");
        var date = toDate();
        var categorie = 1;
        var req = 'http://bean.example.com/api/index.php?url=newTopic&titre='+title+'&content='+content+'&date='+date+'&categorie='+categorie+'&userId='+id;
        console.log(req);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", req, true);
        xhttp.send(null);
        window.location.reload(true);
    }else{
        console.log(errorPost);
        if(errorPost == 1 || errorPost == 2){
            alert("your post is missing content");
        }else{
            alert("you need to create an account");
        }
    }
}
function userForm() {
    var nickname = document.getElementById("nicknameUser").value;
    var nom = document.getElementById("nomUser").value;
    var prenom = document.getElementById("prenomUser").value;
    var email = document.getElementById("emailUser").value;
    var password = document.getElementById("passwordUser").value;
    var confirm = document.getElementById("passwordConfirm").value;

    var errorPost = 0;
    nickname == "" ? errorPost = 1 : errorPost = 0;
    nom == "" ? errorPost = 2 : errorPost = 0;
    prenom == "" ? errorPost = 3 : errorPost = 0;
    email == "" ? errorPost = 4 : errorPost = 0;
    password == confirm ? errorPost = 0 : errorPost = 5;

    if(errorPost == 0){
        var date = toDate();
        var categorie = 1;
        var req = 'http://bean.example.com/api/index.php?url=newUser&nickname='+nickname+'&nom='+nom+'&prenom='+prenom+'&email='+email+'&password='+password+'&date_inscription='+date;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", req, true);
        xhttp.send(null);
        window.location.reload(true);
    }else{
        alert("your need to fill everything");
        console.log(errorPost);
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