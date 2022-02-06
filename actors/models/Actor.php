<?php
    class Actor {
        private $conn;
        private $table = 'actors';
    
        public $actor_id;
        public $firstname;
        public $lastname;
        public $ratings;
        public $last_update;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function get_all() {
            $query = 'SELECT * FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function create_actor() {
            $query = 'INSERT INTO ' . $this->table .'
              SET
                firstname = :firstname,
                lastname = :lastname,
                ratings = :ratings,
                last_update = :last_update';

            
            $stmt = $this->conn->prepare($query);

            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->ratings = htmlspecialchars(strip_tags($this->ratings));
            $this->last_update = htmlspecialchars(strip_tags($this->last_update));

            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':ratings', $this->ratings);
            $stmt->bindParam(':last_update', $this->last_update);

            if($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function update_actor() {
            $query = 'UPDATE ' . 
                $this->table .'
              SET
                firstname = :firstname,
                lastname = :lastname,
                ratings = :ratings,
                last_update = :last_update
              WHERE
                actor_id = :actor_id';

            $stmt = $this->conn->prepare($query);

            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->ratings = htmlspecialchars(strip_tags($this->ratings));
            $this->last_update = htmlspecialchars(strip_tags($this->last_update));
            $this->actor_id = htmlspecialchars(strip_tags($this->actor_id));

            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':ratings', $this->ratings);
            $stmt->bindParam(':last_update', $this->last_update);
            $stmt->bindParam(':actor_id', $this->actor_id);

            if($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function delete_actor() {
            $query = 'DELETE FROM ' . $this->table . ' WHERE actor_id = :actor_id';

            $stmt = $this->conn->prepare($query);

            $this->actor_id = htmlspecialchars(strip_tags($this->actor_id));

            $stmt->bindParam(':actor_id', $this->actor_id);

            if($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }