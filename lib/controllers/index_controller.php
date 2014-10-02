<?php
$controllers['index'] =
function()
{
    $params = [];

    function decompose_color($color)
    {
        if(strlen($color) != 6)
            return false;

        for($i = 0; $i < 6; $i += 2)
            $color_array[] = hexdec(substr($color, $i, 2));

        foreach($color_array as $channel)
            if($channel < 0 || $channel > 255)
                return false;

        return hexdec($color);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(!($color = decompose_color($_POST['color'])))
        {
            $errors[] = 'Wrong color format.';
        }
        else
        {
            $image_info = getimagesize($_FILES['file']['tmp_name']);

            switch($image_info['mime'])
            {
                case 'image/png':
                    $image = imagecreatefrompng($_FILES['file']['tmp_name']);
                break;

                case 'image/jpeg':
                    $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
                break;

                case 'image/gif':
                    $image = imagecreatefromgif($_FILES['file']['tmp_name']);
                break;

                default:
                    $image = false;
            }

            if(!$image)
                $errors[] = 'Wrong image format.';
            else
            {
                $found = [];
                for($y = 0; $y < $image_info[1] && empty($break); ++$y)
                {
                    for($x = 0; $x < $image_info[0] && empty($break); ++$x)
                    {
                        if(count($found) >= 1000)
                        {
                            $break = true;
                            break;
                        }

                        $rgb = imagecolorat($image, $x, $y);

                        if($rgb === $color)
                            $found[] = [$x, $y];
                    }
                }

                if(!empty($found))
                {
                    $params['found'] = $found;
                    return render_view('results', $params);
                }
                else
                    $errors[] = 'This color was not found in this image.';
            }
        }
        $params['errors'] = $errors;
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET' || !empty($errors))
        render_view('index', $params);
};
