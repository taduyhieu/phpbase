<div class="span9">
  <div class="well np">
    <div id="myCarousel" class="carousel slide homCar">
      <div class="carousel-inner">
        <?php 
          foreach ($slider as $slider) {
        ?>
        <div class="item">
          <img style="width:100%" src="<?php echo htmlspecialchars($slider->url_slider, ENT_QUOTES, 'UTF-8'); ?>" alt="bootstrap ecommerce templates">
          <div class="carousel-caption">
            <h4>Săn hàng trúng quà</h4>
            <p><span>Cơ hội trúng Iphone X</span></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
  </div>

