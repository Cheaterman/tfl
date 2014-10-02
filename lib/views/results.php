<?php
$views['results'] =
function() use ($params)
{
?>
        <div class="results">
            Results:<br>
<?php
    foreach($params['found'] as $coords):
?>
            <?=$coords[0]?>, <?=$coords[1]?><br>
<?php
    endforeach;

    if(count($params['found']) == 1000):
?>
            <span class="error">Results are capped to 1000.</span><br>
<?php
    endif
?>
            <a href="">Other image/color</a>
        </div>
<?php
}
?>
