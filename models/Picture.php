<?php

/**
 * Модель для работы с Picture
 * 
*/

class Picture
{

    const SHOW_BY_DEFAULT = 4;

    public static function index() 
    {
        $con = Connection::make();
        $sql = "SELECT * FROM pictures ORDER BY id ASC";
        $res = $con->query($sql);
        $pictures = $res->fetchAll(PDO::FETCH_ASSOC);
        return $pictures;
    }

    public static function show($id)
    {
        $con = Connection::make();
        $sql = "SELECT * FROM pictures WHERE id = :id";
        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        $picture = $res->fetch(PDO::FETCH_ASSOC);
        return $picture;
    }

    public static function store($options) 
    {

        $db = Connection::make();
        $sql = "INSERT INTO pictures(resource, filename, resource_id)
                VALUES (:resource, :filename, :resource_id)";
        $res = $db->prepare($sql);
        $res->bindParam(':resource', $options['resource'], PDO::PARAM_STR);
        $res->bindParam(':filename', $options['filename'], PDO::PARAM_STR);
        $res->bindParam(':resource_id', $options['resource_id'], PDO::PARAM_INT);
        //Если запрос выполнен успешно
        if ($res->execute()) {
            return $db->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function lastId() 
    {
        $con = Connection::make();
        $res = $con->prepare("SELECT id FROM pictures ORDER BY id DESC LIMIT 1");
        $res->execute();
        return $res->fetch(PDO::FETCH_ASSOC)['id'];

    }

    public static function getPictureById($id) 
    {
        $con = Connection::make();
        $sql = "SELECT * FROM pictures WHERE id = :id";
        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        $picture = $res->fetch(PDO::FETCH_ASSOC);
        return $picture;
    }

    
    public static function update($id, $options) 
    {

        $con = Connection::make();

        $sql = "
                UPDATE pictures
                SET
                resource = :resource,
                filename = :filename,
                resource_id = :resource_id
                WHERE id = :id
                ";

        $res = $con->prepare($sql);

        $res->bindParam(':resource', $options['resource'], PDO::PARAM_STR);
        $res->bindParam(':filename', $options['filename'], PDO::PARAM_STR);
        $res->bindParam(':resource_id', $options['resource_id'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        $res->execute();

    }
    
    public static function destroy($id) 
    {
        $con = Connection::make();
        $sql = "DELETE FROM pictures WHERE id = :id";
        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

}