<?php

require_once "../config/connection.php";

class Information extends Connection
{
    public static function findAll()
    {
        try {
            $sql = "SELECT i.id, i.name, i.image, i.ingredients, p.price
                    FROM public.information i
                    JOIN public.pizza p ON i.id = p.id_information
                    WHERE p.diameter < 30";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Error1: " . $th->getMessage();
        }
    }

    public static function findAllForDrink()
    {
        try {
            $sql = "SELECT i.name, i.image, i.ingredients, d.price
                    FROM public.information i
                    JOIN public.drinks d ON i.id = d.id_information
                    order by d.id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Error1: " . $th->getMessage();
        }
    }

    public static function findAllForSnack()
    {
        try {
            $sql = "SELECT i.name, i.image, i.ingredients, s.price
                    FROM public.information i
                    JOIN public.snack s ON i.id = s.id_information";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Error1: " . $th->getMessage();
        }
    }

    public static function pizzaInfo($id)
    {
        try {
            $sql = 'SELECT i.name, i.image, i.ingredients, i."energyValue", i.carb, i.proteins, i.far,
       p.price, p.weight, p.diameter
FROM public.information i
         JOIN public.pizza p ON i.id = p.id_information
where diameter = 25 and i.id = :id';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Error1: " . $th->getMessage();
        }
    }

    public static function snackInfo($id)
    {
        try {
            $sql = 'SELECT i.name, i.image, i.ingredients, i."energyValue", i.carb, i.proteins, i.far,
       p.price, p.weight, p.diameter
FROM public.information i
         JOIN public.pizza p ON i.id = p.id_information
where diameter = 25 and i.id = :id';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo "Error1: " . $th->getMessage();
        }
    }
}