
<?php
include 'rb.php';
include 'config.php';

@$id= $_GET['id'];
$db=R::setup('mysql:host=localhost;dbname=grocery_db', 'root', '');



$count = R::findOne('categories', 'id = ?', [1]);




?>
<!DOCTYPE html>
<html>

<head>
  <meta charset=utf-8>
  <title>Fluid Width Video</title>

  <style>
    * { margin: 0; padding: 0; }
    body { 
      font: 16px/1.4 Georgia, Serif;
      width: 100%; 
      margin: 10px auto; 
      background: url(uploads/listings/<?php echo $count->profile ?>);
    }
    h1 { font-weight: normal; font-size: 42px; }
    h1, p, pre, video, h2, figure, h3, ol { margin: 0 0 15px 0; }
    h2 { margin-top: 80px; }
    h1 { margin-bottom: 40px; }
    li { margin: 0 0 5px 20px; }
    article { background: white; padding: 10%; }
    pre { display: block; padding: 10px; background: #eee; overflow-x: auto; font: 12px Monaco, MonoSpace; }

    img { max-width: 100%; }

    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe,
    .videoWrapper object,
    .videoWrapper embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    video {
      width: 100%    !important;
      height: auto   !important;
    }
    figure { display: block; background: #eee; padding: 10px; }
    figcaption { display: block; text-align: center; margin: 10px 0; font-style: italic; font-size: 14px; orphans: 2; }
  </style>
</head>

<body>
<?
// if(isset($_GET['url'])){
$vid = "uploads/videos/vd.mp4";  
$pos = "uploads/listings/4.jpg";

// if($pos == "uploads/listings/4.jpg"){
    $cap = "Jordan Armsterdam - The flight of the Wild Geese";
// }
?>
<figure>
    <video src="uploads/videos/<?php echo $count->vidio ?>" controls poster="<?php echo $count->profile;?>"></video>
    <figcaption><?php echo $count->title; ?>      by  <?php echo $count->name; ?></figcaption>
</figure>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>
    var $allVideos = $(".js-resize"),
        $fluidEl = $("figure");

    $allVideos.each(function() {

      $(this)
        // jQuery .data does not work on object/embed elements
        .attr('data-aspectRatio', this.height / this.width)
        .removeAttr('height')
        .removeAttr('width');

    });

    $(window).resize(function() {

      var newWidth = $fluidEl.width();
      $allVideos.each(function() {

        var $el = $(this);
        $el
            .width(newWidth)
            .height(newWidth * $el.attr('data-aspectRatio'));

      });

    }).resize();
</script>

</body>

</html>