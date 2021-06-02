<?php
class Mock extends Control implements RESTfulInterface {
    function restPost($segments) {
        echo 'Create resource';
        echo '<br/><pre>';
        print_r($_POST);
        echo '</pre>';
    }

    function restGet($segments) {
        $id = $segments[0];
        if ($id == 'rock')
            echo 'Read resource: ' . $segments[0]; // id
        else
            self::exceptionResponse(404, 'Not found');
    }

    function restPut($segments) {
        echo 'Update resource: ' . $segments[0];
        echo '<br/> you put data: ' . file_get_contents('php://input'); // read the raw put data.
    }

    function restDelete($segments) {
        echo 'Delete resource: ' . $segments[0];
    }
}
?>