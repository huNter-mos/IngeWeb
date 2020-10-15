function getTopicById(id){
    const f = fetch('http://bean.example.com/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        data.forEach(element => {
            var user;
            const com = fetch('http://bean.example.com/api/index.php?url=user/'+element.fk_user);
            com.then(responsecom => responsecom.json()).then(datacom => {
                user = datacom[0];
                topicView(data[0],user);
                });
            com.catch(function(datacom) { 
            });
        });

        });

    f.catch(function(data) { 
    });
}

function getCommentbyTopic(id){
    const f = fetch('http://bean.example.com/api/index.php?url=comments/'+id);
    f.then(response => response.json()).then(data => 
        {
            data.forEach(element => {
                var user;
                const com = fetch('http://bean.example.com/api/index.php?url=user/'+element.fk_user);
                com.then(responsecom => responsecom.json()).then(datacom => {
                    user = datacom[0];
                    comment(element,user);
                    });
                com.catch(function(datacom) { 
                });
            });
        });

    f.catch(function(data) { 
    });
}


function topicView(topic,user) {
    var topicView = document.getElementById("topicView");

    topicDiv = document.createElement("span");
    topicDiv.innerHTML+='<div class="topicWrap"><div class="topicCreator"> '+user.nickname+' <br> '+topic.date_creation+' </div><div  id="" class="topic"> '+topic.titre+'<div  id="content" class="topicContent"> '+topic.message+'</div></div><div  id="" class="topic"></div>';

    topicView.appendChild(topicDiv);
}

function comment(comment,user){
    var commentView = document.getElementById("commentView");

        commentHead = document.createElement("span");
        commentHead.innerHTML+='<div class="commentStyle"><div class="comment"> '+user.nickname+' <br> '+comment.date_creation+' </div><div  id="commentContent" class="commentContent">'+comment.message+'</div></div>';

        commentView.appendChild(commentHead);
    
}
function toDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear(); 

    today = yyyy + '-' + mm + '-' + dd;
    return today
}
function commentForm(id) {
    const urlParams = new URLSearchParams(window.location.search);
    let topic = urlParams.get('topic');
    var commentContent = document.getElementById("NewCommentContent").value;
    console.log(commentContent);
    var errorComment = 0;
    commentContent == "" ? errorComment = 1 : errorComment = 0;
    console.log(errorComment);
    if(id != "x" && errorComment !=1){
        while (commentContent.indexOf("\n") > -1) commentContent = commentContent.replace("\n","<br>");
        var date = toDate();
        var req = 'http://bean.example.com/api/index.php?url=newComment&message='+commentContent+'&date='+date+'&topicID='+topic+'&userId='+id;
        console.log(req);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", req, true);
        xhttp.send(null);
        window.location.reload(true);
    }else{
        if(errorComment == 1){
            alert("your post is missing content");
        }else{
            alert("youneed to create an account");
        }
    }

}
function openForm() {
    document.getElementById("myForm").style.display = "block";
}
  
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}


window.onload=function(){
    const urlParams = new URLSearchParams(window.location.search);
    let topic = urlParams.get('topic');
    getTopicById(topic);
    getCommentbyTopic(topic);
};