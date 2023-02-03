<?php

class Category extends Database
{
    protected $table = 'category';

    /**
     * Get all
     * @return array $data
     */
    public static function get()
    {
        $data = array();
        $_this = new static();
        $sql = "SELECT * FROM $_this->table";
        $stmt = $_this->connect()->query($sql);
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $data = $row;
        }
        return $data;
    }

    /**
     * Whereby id
     * @param int $id
     * @return array $data
     */
    public static function where($id)
    {
        $data = array();
        try {
            $_this = new static();
            $sql = "SELECT * FROM $_this->table WHERE cat_id = ?";
            $stmt = $_this->connect()->prepare($sql);
            $stmt->execute([$id]);
            while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                $data = $row;
            }
            return $data;
        } catch (PDOException $exception) {
            $exception->getMessage();
        }
    }

    /**
     * Create
     * @param string $cat_name
     * @param int $status
     * @return $stmt
     */
    public static function create($cat_name, $status)
    {
        $_this = new static();
        $sql = "INSERT INTO $_this->table (cat_name, status) VALUES (?, ?)";
        $stmt = $_this->connect()->prepare($sql);
        $stmt->execute([$cat_name, $status]);
        return $stmt;
    }

    /**
     * Update
     * @param string $cat_name
     * @param int $status
     * @param int $id
     * @return $stmt
     */
    public static function update($cat_name, $status, $id)
    {
        $_this = new static();
        $sql = "UPDATE $_this->table SET cat_name = ?, status = ? WHERE cat_id = ?";
        $stmt = $_this->connect()->prepare($sql);
        $stmt->execute([$cat_name, $status, $id]);
        return $stmt;
    }

    /**
     * Delete
     * @param int $id
     * @return $stmt
     */
    public static function delete($id)
    {
        $_this = new static();
        $sql = "DELETE FROM $_this->table WHERE cat_id = ?";
        $stmt = $_this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt;
    }
}