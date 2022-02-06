<?php  
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';
    include_once 'models/Actor.php';

    $database = new Database();
    $db = $database->connect();

    $actor = new Actor($db);

    $data = json_decode(file_get_contents("php://input"));

    $actor->actor_id = $data->actor_id;
    $actor->firstname = $data->firstname;
    $actor->lastname = $data->lastname;
    $actor->ratings = $data->ratings;
    $actor->last_update = $data->last_update;

    if($actor->update_actor()) {
        echo json_encode(
            array('status' => 'Ok',
                  'message' => 'Actor\'s information has been updated.')
        );
    } else {
        echo json_encode(
            array('status' => 'Failed',
                  'message' => 'Error updating actor.')
        );  
    }