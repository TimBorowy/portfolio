<!DOCTYPE html>
<head>
    {pageStylesheet}
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Tim Borowy Portfolio{title}</title>
</head>
<body>
<header>
    <div class="title-header">
        <h1>{titleHeader}</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php"><img id="header-foto" src="pictures/logo_img.png" alt="website logo"></a></li>
        </ul>
        <ul>
            <li><a href="index.php?link=about">Over</a></li>
            <li><a href="index.php?link=contact">Contact</a></li>
            <li><a href="#">Portfolio</a>
                <ul id="second-ul">
                    <li><a href="index.php?link=achtergrond">Achtergrond</a></li>
                    <li><a href="index.php?link=opleidingen">Opleidingen</a></li>
                    <li><a href="index.php?link=hobbies">Hobbies</a></li>
                    <li><a href="index.php?link=projecten">Projecten</a></li>
                </ul>
            </li>
            <li><a href="index.php?link=blog">Blog</a></li>
            <!-- START BLOCK : navAccount -->
            <li><a href=#>{username_nav}</a>
                <ul id='second-ul'>
                    <li><a href='index.php?link=gebruiker'>Mijn pagina</a></li>
                    <li><a href='index.php?link=uitloggen'>uitloggen</a></li>
                </ul>
            </li>
            <li><a href="#">Admin</a>
                <ul id='second-ul'>
                    <li><a href='index.php?link=admin-user'>Users</a></li>
                    <li><a href='index.php?link=admin-blog'>Blogs</a></li>
                    <li><a href='index.php?link=admin-projects'>Projecten</a></li>
                    <li><a href='index.php?link=admin-comment'>Comments</a></li>
                </ul>
            </li>
            <!-- END BLOCK : navAccount -->
            <!-- START BLOCK : navDefault -->
            <li><a href='index.php?link=login'>Login</a></li>
            <li><a href='index.php?link=sign-up'>Aanmelden</a></li>
            <!-- END BLOCK : navDefault -->
            {navLogStat}
        </ul>
        <ul>
            <li><a href="https://nl-nl.facebook.com/"><img class="social" src="pictures/facebook.png" alt="facebook logo"></a></li>
            <li><a href="https://twitter.com/"><img class="social" src="pictures/twitter.png" alt="twitter logo"></a></li>
            <li><a href="https://plus.google.com/"><img class="social" src="pictures/googleplus.png" alt="google plus logo"></a></li>
        </ul>
    </nav>
</header>