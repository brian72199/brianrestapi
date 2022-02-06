<?php  
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once 'config/Database.php';
    include_once 'models/Actor.php';

    $database = new Database();
    $db = $database->connect();

    $actor = new Actor($db);

    $result = $actor->get_all();

    $num = $result->rowCount();

    if ($num > 0) {
        $actors_arr = array();
        $actors_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $actor_item = array(
                'actor_id' => $actor_id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'ratings' => $ratings,
                'last_update' => $last_update
            );

            array_push($actors_arr['data'], $actor_item);
        }
        
        echo json_encode($actors_arr);

    } else {
        echo json_encode(
            array('message' => 'No Actors Found')
        );
    }