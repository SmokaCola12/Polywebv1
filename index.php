<?php
    include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins';
}

.container{
    width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
}

.content{
    text-align: center;
}

.content h1{
    font-size: 95px;
    color: #fff;
    margin-bottom: 25px;
}
.content h2{
    font-size: 50px;
    color: #fff;
    margin-bottom: 10px;
}
.content p{
    font-size: 45px;
    color: #fff;
    margin-bottom: 50px;
}

.content a{
    font-size: 23px;
    color: #ffffff2d;
    text-decoration: none;
    border: 2px solid #ffffff3b;
    padding: 15px 25px;
    border-radius: 25px;
    transition: 0.4s;
}

.content a:hover{
    background-color: cyan;
    color: #000;
    box-shadow: rgb(0, 163, 163);
}

.background-clip{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;

}

@media (min-aspect-ratio:1/9) {
    .background-clip{
        width: 100%;
        height: auto;
    }
}

@media (max-aspect-ratio:16/9) {
    .background-clip{
        width:auto;
        height: 100%;
    }
}

    </style>
    <title>PolyWeb - Educational Coding Games</title>
</head>
<body>
    <div class="container">

       <video autoplay loop muted plays-inline class="background-clip">
        <source src="Developer Coding Background.mp4" type="video/mp4">
       </video>

        <div class="content">
            <h1><span style="color: white;">POLY</span><span style="color: #22D3EE;">WEB</span></h1>
            <h2>Play <span style="color: #22D3EE;">Educational</span> Coding Games</h2>
            <p class="subtitle">Have fun while  <span style="color: #22D3EE;">learning.</span></p>
            <a href="games selection.html">Start Learning</a>
        </div>
    </div>

</body>
</html>

