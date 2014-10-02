<?php
$views['template'] =
function($title = '', array $params = array()) use (&$views, $view_titles, $action)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=(!empty($title) ? $title . ' - ' : '')?><?=$view_titles['main']?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1><?=(!empty($title) ? $title : $view_titles['main'])?></h1>
<?php
    if(!empty($action)
       && !empty($views[$action]))
        $views[$action]();
    else
        echo '404 error: this page does not exist!';
?>
    </body>
</html>
<?php
};
