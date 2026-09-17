<?php

require_once("../config/conexion.php");
require_once("../model/Producto.php");

$producto = new Producto();

switch ($_GET["op"]) {

    case "listar":

        $datos = $producto->get_producto();

        $data = array();

        foreach ($datos as $row) {

            $sub_array = array();

            $sub_array[] = $row["prod_nom"];
            $sub_array[] = $row["prod_id"];
            $sub_array[] = $row["prod_id"];

            $data[] = $sub_array;
        }

        $result = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($result);

        break;
}
