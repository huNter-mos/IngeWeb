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


window.onload=function(){
    const urlParams = new URLSearchParams(window.location.search);
    let topic = urlParams.get('topic');
    getTopicById(topic);
    getCommentbyTopic(topic);
};