<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include ---> 
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  ---> 
<br><br>

<!---Body Section Start ----->
    <!--=========== BEGIN GALLERY SECTION ================-->
    <section id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="gallery-area">
              <!-- Start First Image Album  -->
            	<div class="my-simple-gallery">
	                <div class="section-heading">
	                	<h2>First Album</h2>
	                  <div class="line"></div>
	                </div>
	                <div class="row">
		              <?php if($gallary):
		              count($gallary);
		              foreach($gallary as $gal): ?>

	                  <figure itemprop="associatedMedia" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                    <a class="gallery-iteam" href="<?= base_url().'./public/uploads/frontend/image_gallery/'.$gal->gallary_image; ?>" itemprop="contentUrl" data-size="1024x1024">
	                      <img src="<?= base_url().'./public/uploads/frontend/image_gallery/'.$gal->gallary_image; ?>" itemprop="thumbnail" alt="Image description" />
	                       <span class="image-effect"></span>
	                    </a>                    
	                    <figcaption itemprop="caption description"><?= $gal->image_title; ?></figcaption>
	                </figure>

		              <?php endforeach; ?>
		              <?php else: ?>
		              	<figure itemprop="associatedMedia" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                    <a class="gallery-iteam" href="<?= base_url('public/assets/home_image/images/gallery/gallery-large-2.jpg') ?>" itemprop="contentUrl" data-size="1024x683">
	                      <img src="<?= base_url('public/assets/home_image/images/gallery/gallery-large-2.jpg') ?>" itemprop="thumbnail" alt="Image description" />
	                      <span class="image-effect"></span>
	                    </a>
	                    <figcaption itemprop="caption description">Image caption 7</figcaption>
	                  </figure>
		              <?php endif; ?>

              <!-- End First Image Album  -->

              <!-- Start Second Image Album  -->
              <div class="my-simple-gallery">
                <div class="section-heading">
                  <h2>Second Album</h2>
                  <div class="line"></div>
                </div>
                <div class="row">
                	<?php if($secound_gallary):
                	count($secound_gallary);
                	foreach($secound_gallary as $sec_gal): ?>
                		<figure itemprop="associatedMedia" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                    <a class="gallery-iteam" href="<?= base_url().'./public/uploads/frontend/image_gallery/'.$sec_gal->gallary_image; ?>" itemprop="contentUrl" data-size="1024x683">
	                      <img src="<?= base_url().'./public/uploads/frontend/image_gallery/'.$sec_gal->gallary_image; ?>" itemprop="thumbnail" alt="Image description" />
	                      <span class="image-effect"></span>
	                    </a>
	                    <figcaption itemprop="caption description"><?= $sec_gal->image_title; ?></figcaption>
	                  </figure>
                	<?php endforeach; ?>
                	<?php else: ?>
                		  <figure itemprop="associatedMedia" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                    <a class="gallery-iteam" href="<?= base_url('public/assets/home_image/images/gallery/gallery-large-3.jpg') ?>" itemprop="contentUrl" data-size="1024x683">
	                      <img src="<?= base_url('public/assets/home_image/images/gallery/gallery-large-3.jpg') ?>" itemprop="thumbnail" alt="Image description" />
	                      <span class="image-effect"></span>
	                    </a>
	                    <figcaption itemprop="caption description">Image caption 3</figcaption>
	                  </figure>
                	<?php endif; ?>
                  
                  
                 
              <!-- End Second Image Album  -->

              <!-- This Section only for Lightbox view -->
              <!-- Root element of PhotoSwipe. Must have class pswp. -->
              <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                <!-- Background of PhotoSwipe. 
                     It's a separate element, as animating opacity is faster than rgba(). -->
                <div class="pswp__bg"></div>

                <!-- Slides wrapper with overflow:hidden. -->
                <div class="pswp__scroll-wrap">

                  <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                  <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                  <div class="pswp__container">
                      <div class="pswp__item"></div>
                      <div class="pswp__item"></div>
                      <div class="pswp__item"></div>
                  </div>

                  <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                  <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END GALLERY SECTION ================-->
<!---Body Section End ----->

<!--=========== Start Footer SECTION ================-->
<?= view('Home/footer_section'); ?>
 <!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->
</body>
</html>