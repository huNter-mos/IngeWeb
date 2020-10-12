function getTopicById(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        topicView(data[0]);
        });

    f.catch(function(data) { 
    });
}
function getCommentbyTopic(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=comments/'+id);
    f.then(response => response.json()).then(data => 
        {
            data.forEach(element => {
                console.log("test",element);
                getUserById(element.fk_user);
                comment(element,2);
            });
        });

    f.catch(function(data) { 
    });
}
function getUserById(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=user/'+id);
    f.then(response => response.json()).then(data => {
        console.log(data);
        comment(data[0],1);
        });
    f.catch(function(data) { 
    });
}
function topicView(topic) {
    var topicView = document.getElementById("topicView");
    topicView.style.display = "flex";
    topicView.style.flexDirection = "colum";



    topicDiv = document.createElement("span");
    topicDiv.innerHTML+='<div  id="" class="topic"> '+topic.titre+'</div>';
    topicDiv.style.margin = "1em";
    topicDiv.style.padding = "1em";
    topicDiv.style.backgroundColor = "#a9cad6";
    topicDiv.style.boxShadow ="1px 1px 12px #555";
    topicDiv.style.fontWeight = "bold";
    topicDiv.style.fontSize="larger";


    content = document.createElement("span");
    content.innerHTML+='<div  id="content" class="content"> '+topic.message+'</div>';
    content.style.textOverflow ="ellipsis";
    content.style.fontWeight = "normal";
    content.style.fontSize="large";

    topicDiv.appendChild(content)
    topicView.appendChild(topicDiv);
}
function comment(comment,part){
    var commentView = document.getElementById("commentView");
    commentView.style.display = "flex";
    commentView.style.flexDirection = "colum";
    commentView.style.marginLeft = "1em";
    commentView.style.marginRight = "10em";
    commentView.style.padding = "1em";
    commentView.style.backgroundColor = "#a9cad6";
    commentView.style.boxShadow ="1px 1px 12px #555";
    commentView.style.fontWeight = "bold";
    commentView.style.backgroundColor = "#f1faee";

    if(part===1){

        commentProfileHead = document.createElement("span");
        commentProfileHead.innerHTML += '<div class="comment"> par '+comment.nickname+'</div>';
        commentProfileHead.style.justifyContent="flex-end";
        commentView.appendChild(commentProfileHead);

    }
    if(part===2){



        commentHead = document.createElement("span");
        commentHead.innerHTML+='<div class="comment"> '+comment.date_creation+' </div>';
        commentHead.style.backgroundColor = "#f1faee";
        commentHead.style.fontWeight = "normal";


        commentContent = document.createElement("span");
        commentContent.innerHTML+='<div  id="content" class="content">'+comment.message+'</div>';
        commentContent.style.backgroundColor = "#f1faee";



        commentHead.appendChild(commentContent)
        commentView.appendChild(commentHead);
    }
}


window.onload=function(){
    const urlParams = new URLSearchParams(window.location.search);
    let topic = urlParams.get('topic');
    getTopicById(topic);
    getCommentbyTopic(topic);
};