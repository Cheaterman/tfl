<?php
function render_view($action, array $params = array())
{
    require_once(__DIR__ . '/views/titles.php');
    require_once(__DIR__ . '/views/template.php');
    require_once(__DIR__ . '/views/index_view.php');
    require_once(__DIR__ . '/views/results.php');
    
    $views['template']($view_titles[$action], $params);
}
