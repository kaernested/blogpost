<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!--load all styles -->
    <title><?php echo (isset($page_title)) ? $page_title : 'Generic title'; ?></title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <nav class="navWrapper">
        <div class="navContainer">
            <a class="logo" href="/">The Daily Blog Post</a>
            <ul class="navContent">
                <li <?php echo (isset($page_id) && $page_id == 'add_job') ? 'active' : ''; ?>">
                    <a href="/addBlogPost.php">Add a post</a>
                </li>
                <li>
                    <a href="/login.php">Login</a>
                </li>
                <div class="searchWrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" class="searchInput" placeholder="Search...">
                </div>
            </ul>
        </div>
    </nav>

    <div class="container">