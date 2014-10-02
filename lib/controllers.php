<?php
function controller($action)
{
    require_once(__DIR__ . '/controllers/index_controller.php');

    if(!empty($action)
       && !empty($controllers[$action]))
        $controllers[$action]();
}
