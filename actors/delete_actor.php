<?php  
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';
    include_once 'models/Actor.php';

    $database = new Database();
    $db = $database->connect();

    $actor = new Actor($db);

    $data = json_decode(file_get_contents("php://input"));

    $actor->actor_id=$data->actor_id;

    if($actor->delete_actor()) {
        echo json_encode(
            array('status' => 'Ok',
                  'message' => 'Actor\'s information has been deleted.')
        );
    } else {
        echo json_encode(
            array('status' => 'Failed',
                  'message' => 'Error deleting actor.')
        );  
    }