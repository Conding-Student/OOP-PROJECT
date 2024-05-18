<?php

abstract class Information 
{
    protected function insert($connection, $name, $email, $comment)
    {
        $insert = $connection->prepare('INSERT INTO user_info (name, email, comment) VALUES (:name, :email, :comment)');
        $insert->bindParam(':name', $name, PDO::PARAM_STR);
        $insert->bindParam(':email', $email, PDO::PARAM_STR);
        $insert->bindParam(':comment', $comment, PDO::PARAM_STR);
        return $insert->execute();
    }
}

class Name extends Information
{
    public function insertion($connection, $name, $email, $comment)
    {
        return $this->insert($connection, $name, $email, $comment);
    }
}

class Comment extends Information
{
    private function comment($connection, $comment)
    {
        $insert = $connection->prepare('INSERT INTO commet (comment) VALUES (:comment)');
        $insert->bindParam(':comment', $comment, PDO::PARAM_STR);
        return $insert->execute();
    }

    public function insertComment($connection, $comment)
    {
        return $this->comment($connection, $comment);
    }
}
