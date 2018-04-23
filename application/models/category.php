<?php
class Category extends Model{

    function getCategory($catID){

        $sql =  'SELECT categoryID, name from categories WHERE categoryID = ?';

        // perform query
        $results = $this->db->getrow($sql, array($catID));

        $category = $results;

        return $category;

    }

    public function getAllCategories($limit = 0){

        if($limit > 0){

            $numcats = ' LIMIT '.$limit;
        }

        $sql =  'SELECT categoryID, name FROM categories '.$numcats;

        // perform query
        $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $categories[] = $row;
        }

        return $categories;

    }

    function addCategory($name){
        $sql='INSERT INTO categories (name) VALUES (?)';
        $this->db->execute($sql,array($name));
        $message = 'Category added.';
        return $message;
    }

    function editCategory($data){
        $sql='UPDATE categories SET name = ? WHERE categoryID = ?';
        $this->db->execute($sql,$data);
        $message = 'Category changed.';
        return $message;
    }





}