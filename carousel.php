<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
</head>
<body>
    <div id="banners" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banners" data-slide-to="0" class="active"></li>
            <li data-target="#banners" data-slide-to="1"></li>
            <li data-target="#banners" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/banner_1.jpg" alt="" class="center-block">
            </div>

           
            <div class="item ">
                <img src="images/banner_2.jpg" alt="" class="center-block">
            </div>
            
            <div class="item ">
                <img src="images/banner_3.jpg" alt="" class="center-block">
            </div>

        </div>
        <a href="#banners" class="left carousel-control" role="button" data-slide="prev">
            <span  class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
    </div>
    </div>
    <a href="#banners" class="right carousel-control" role="button" data-side="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Proximo</span>
        </a>
    </div>
    
</body>
</html>