function getTopicById(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=topic/'+id);
    f.then(response => response.json()).then(data => {
        console.log(data);
        });

    f.catch(function(data) { 
    });
}
function getCommentbyTopic(id){
    const f = fetch('http://bean.example.com/IngeWeb/api/index.php?url=comments/'+id);
    f.then(response => response.json()).then(data => 
        {
            console.log(data);
        });

    f.catch(function(data) { 
    });
}

window.onload=function(){
    getTopicById(1);
    getCommentbyTopic(1);
};