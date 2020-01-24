<?php
    if (isset($_GET["add"])) {
        $file = file_get_contents('locations.json');
        $data = json_decode($file, true);
        unset($_GET["add"]);
        $data["data"] = array_values($data["data"]);
        array_push($data["data"], $_GET);
        file_put_contents("test.json", json_encode($data));
    }
?>