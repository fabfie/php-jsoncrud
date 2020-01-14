<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('test.json');
    $all = json_decode($all, true);
    $jsonfile = $all["data"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["data"][$id]);
        $all["data"] = array_values($all["data"]);
        file_put_contents("test.json", json_encode($all));
    }
}
?>