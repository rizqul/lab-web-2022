<?php

require_once 'conn.php';

class DBFunc extends Conn
{
    public function insert($prod_code, $title, $price, $qty, $series, $prod_desc, $img_src)
    {
        $query = "INSERT INTO products (product_code, title, price, qty, series, product_desc, imgsrc)
                VALUES (:prod_code, :title, :price, :qty, :series, :prod_desc, :img_src)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(
            [
                'prod_code' => $prod_code,
                'title' => $title,
                'price' => $price,
                'qty' => $qty,
                'series' => $series,
                'prod_desc' => $prod_desc,
                'img_src' => $img_src,
            ]
        );

        return true;
    }

    public function view()
    {
        $query = "SELECT * FROM products;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function selectOne($id)
    {
        $sql = 'SELECT * FROM products WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($prod_code, $title, $price, $qty, $series, $prod_desc, $img_src)
    {
        $query = "UPDATE products SET product_code = :prod_code, title = :title, price = :price, qty = :qty, series = :series, product_desc = :prod_desc, imgsrc = :img_src WHERE product_code = :prod_code";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'prod_code' => $prod_code,
            'title' => $title,
            'price' => $price,
            'qty' => $qty,
            'series' => $series,
            'prod_desc' => $prod_desc,
            'img_src' => $img_src,
        ]);

        return true;

    }

    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'id' => $id
            ]
        );
        return true;
    }

}