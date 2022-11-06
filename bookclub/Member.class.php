<?php
require_once "DataObject.class.php";
class Member extends DataObject {
    protected $data = array(
        "id" => "",
        "username" => "",
        "password" => "",
        "firstName" => "",
        "lastName" => "",
        "joinDate" => "",
        "gender" => "",
        "favoriteGenre" => "",
        "emailAddress" => "",
        "otherInterests" => ""
    );
    private $_genres = array(
        "crime" => "Crime",
        "horror" => "Horror",
        "thriller" => "Thriller",
        "romance" => "Romance",
        "sciFi" => "Sci-Fi",
        "adventure" => "Adventure",
        "nonFiction" => "Non-Fiction"
    );
    
    public function getMembers($startRow, $numRows, $order) {
        
        $conn = $this->connect();
        
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_MEMBERS . "ORDER BY $order LIMIT :startRow, :numRows";
        try{
            $st = $conn->prepare($sql);
            $st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
            $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
            $st->execute();
            $members = array();
            foreach ($st->fetchAll() as $row) {
                $members[] = new Member($row);
            }
            $st = $conn->query( "SELECT found_rows() AS totalRows" );
            $row = $st->fetch();
            $conn->disconnect();
            return array($members, $row["totalRows"]);
        } catch (PDOException $e) {
            $conn->disconnect();
            die("Query failed: " . $e->getMessage());
        }
    }
    public function getMember($id) {
       
        $conn = $this->connect();
        $sql = "SELECT * FROM " . TBL_MEMBERS . " WHERE id = :id";
        try {
            $st = $conn->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $row = $st->fetch();
            $conn->disconnect;
            if ($row) return new Member($row);
        } catch (PDOException $e) {
            $conn->disconnect;
            die("Query failed: " . $e->getMessage() );
        }
    }
    public function getGenderString() {
        return ($this->data["gender"] == "f") ? "Female" : "Male";
    }
    public function getFavoriteGenreString() {
        return ($this->_genres[$this->data["favoriteGenre"]]);
    }
}
?>