<?php?>
<html>
<style>
/* Reset Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Main Styling */

body {
    font-family: 'Roboto', sans-serif;


}


p {
    margin: 0.75rem 0;
}

ul {
    list-style: none;
}

a {
    text-decoration: none;
}

i {
    padding-right: 0.4rem;
}

/* Utilites Styling */

.container {
    margin: auto;
    max-width: 1100px;
    padding: 0 2rem;


}

.bg-dark {
    background: #333;
    color: white;
}

.bg-light {
    background: greenyellow;
    color: white;
}


.text-primary {
    color: black;
}

.btn {
    color: white;
    display: inline-block;
    text-align: center;
    border: none;
    background: greenyellow;
    padding: 0.6rem 2rem 0.6rem 2rem;
    border-radius: 5px;
    transition: 0.5s;
    margin-top: 1.2rem;

}

.btn:hover {
    background: rgb(123, 184, 32);
    transition: 1.1s;
}

.btn-dark {
    background: #333;
    color: #fff;
    transition: 0.5s;
}

.btn-dark:hover {
    background: rgb(36, 36, 36);
    transition: 1.1s;
}

.pad-1 {
    padding: 1.5rem 0;
}

.pad-2 {
    padding: 2rem 0;
}

.pad-3 {
    padding: 3rem 0;
}





/* Header/Navbaer Styling */



#main-nav {
    background-color: rgb(81, 85, 77);
    color: wheat;
    display: flex;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    justify-content: space-between;
    padding: 1rem;
    align-items: center;
}

#main-nav .logo {
    font-weight: bold;
    font-size: 1.6rem;
}


#main-nav #navbar {
    display: flex;

    /*centers the items it makes it nice*/


}



#main-nav #navbar li a {
    color: #fff;
    padding: 0.50rem;
    margin: 0 0.4rem;
    font-size: 1.1rem;

}

#main-nav ul li a:hover {
    background: rgb(143, 203, 167);
    border-radius: 5px;
    transition: 1.2s;

}

.btn {
    background-color: ;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: rgb(231, 250, 249);

}

span {
    color: rgb(189, 209, 213);

}
</style>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" media="(max-width: 768px)" href="../css/mobile.css">
        <link rel="stylesheet" media="(min-width: 1100px)" href="../css/widescreen.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Legends College</title>
    </head>

    <body id="home">
        <!-- Header/Navigation -->
        <!--I place the logo and everything in to the navbar because we building a sticky navbar, if we place with the showcase, it will only stay at the end of the showcase -->

        <nav id="main-nav">

            <h1 class="logo">
                <span>
                    <i class="fas fa-book-open"></i>Legends college
                </span>
            </h1>
            <ul id="navbar">
                <li><a href="studentAssigments.php">מטלות</a></li>
                <li><a href="grades.php">ציונים</a></li>
                <li><a href="testem.php">בחינות</a></li>
                <li><a href="studentSchedule.php">מערכת שעות</a></li>
                <li><a href="studentCourses.php">קורסים</a></li>
                <li><a href="HomePage.php">דף הבית</a></li>
                <li><a href="studentProfile.php"><img src="clipboard-user-solid.png" width="25" height="20"></a></li>
            </ul>
        </nav>

        <section id="name"></section>
    </body>

    </html>
</body>

</html>