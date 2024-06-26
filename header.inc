<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="images/njs.png" />
        <title>NodeGenius - Home</title>
        <link rel="stylesheet" href="styles/style.css" />

        <?php
            // Get the current page's filename
            $current_page = basename($_SERVER['PHP_SELF']);

            // Define an array of page names where you want to include the CSS
            $pages_to_include_css = ['quiz.php', 'login.php'];

            // Check if the current page is in the array
            if (in_array($current_page, $pages_to_include_css)) {

                // Include the CSS file if the current page is in the list
                echo '<link rel="stylesheet" href="styles/style_second.css">';
            }
            
            // Check if the current page is admin Dashbord
            if ($current_page === 'manage.php') {
                echo '<link rel="stylesheet" href="styles/admin.css">';
            }
        ?>

    </head>
    <body>
        <div class="preloader">
            <div class="loader"></div>
        </div>

        <header>
            <?php include'menu.inc'; ?>
        </header>