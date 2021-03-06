<?php
/**
 * Point d'entrée unique de notre application
 * C'est ce script PHP qui décide quel autre script PHP sera appelé en fonction
 */
require_once 'api.php';

// Ici la liste de vos APIs et de leurs scripts associés
$apis = [
    "topics" => "apis/topics.php",
    "topic/(\d+)" => "apis/topic.php",
    "comments/(\d+)" => "apis/comment.php",
    "user/(\d+)" => "apis/user.php",
    "connect" => "apis/connect.php",
    "mail" => "apis/mail.php",
    "newTopic" => "apis/newTopic.php",
    "newComment" => "apis/newComment.php",
    "newUser" => "apis/newUser.php"
];

//Pour créer La base de données decomenter le code suivant :
//create();

/**
 * VOUS NE DEVRIREZ PAS AVOIR À MODIFIER LE CODE PLUS BAS
 */
// En l'absence d'API clairement demandée : 404
if(empty($_GET['url'])) {
    display404();
} else {
    $include_script = "";
    $matches = [];
    foreach ($apis as $url_model => $script) {
        // On recherche parmis les modèles lequel correspond à l'URL fournie
        if (preg_match('%^'.$url_model.'(/.*)?$%i', $_GET['url'], $matches) ) {
            $include_script = $script;
            $params = $matches;
            array_shift($params); // retirer le premier élément, inutile
        }
    }
    if (empty($include_script)) {
        display404();
    } else {
        $_GET['api_params'] = $params;
        require_once $include_script;
    }
}

function display404() {
    http_response_code(404);
    header('Content-Type: application/json');
    $response = [
        "error" => "Ressource not found"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}

function display405() {
    http_response_code(404);
    header('Content-Type: application/json');
    $response = [
        "error" => "Method not allowed"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}

function startsWith( $haystack, $needle ) {
     $length = strlen( $needle );
     return substr( $haystack, 0, $length ) === $needle;
}
