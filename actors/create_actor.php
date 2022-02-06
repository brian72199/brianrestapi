<?php  
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';
    include_once 'models/Actor.php';

    $database = new Database();
    $db = $database->connect();
    $actor = new Actor($db);
    $data = json_decode(file_get_contents("php://input"));
    $actor->firstname = $data->firstname;
    $actor->lastname = $data->lastname;
    $actor->ratings = $data->ratings;
    $actor->last_update = $data->last_update;

    if($actor->create_actor()) {
        echo json_encode(
            array('status' => 'Ok',
                  'message' => 'New actor has been created.')
        );
    } else {
        echo json_encode(
            array('status' => 'Failed',
                  'message' => 'Error creating actor.')
        );  
    }