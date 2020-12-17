<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Code Warrior Index</h1>
    <?php
        $dir = 'Exercises';

        $folders = scandir($dir, 1);
        echo '<ul>';
        foreach($folders as $folder) {
            if (!strstr($folder, '.')) {
                $date = DateTime::createFromFormat('Y_m_d', $folder);
                echo '<li>'.$date->format('d F Y').'</li>';
                $files = scandir($dir.'/'.$folder.'/', 1);
                foreach ($files as $file) {
                    if (strlen($file) > 2) {
                        echo '<ul>';
                            echo '<li><a href="'.$dir.'/'.$folder.'/'.$file.'" target="_blank">'.$file.'</a></li>';
                        echo '</ul>';
                    }

                } 
            }
        }
        echo '</ul>'
    ?>
</body>
</html>