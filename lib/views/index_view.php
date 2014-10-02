<?php
$views['index'] =
function() use ($params)
{
    $errors = !empty($params['errors']) ? $params['errors'] : '';
    $color = !empty($_POST['color']) ? $_POST['color'] : '000000';

    if(!empty($errors)):
        foreach($errors as $error):
?>
        <span class="error"><?=$error?></span><br>
<?php
        endforeach;
?>
        <br>
<?php
    endif;
?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="file">Choose your image (formats: JPEG, PNG, GIF):</label><br>
            <input type="file" id="file" name="file"><br>
            <label for="color">Choose a color (hexadecimal: "AA00BB"):</label><br>
            <input name="color" value="<?=$color?>"><br>
            <input type="submit" value="Get coordinates!">
        </form>
<?php
};
