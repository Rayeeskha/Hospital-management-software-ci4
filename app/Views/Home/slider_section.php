    <section id="sliderArea">
      <!-- Start slider wrapper -->      
      <div class="top-slider">
        <!-- Start First slide -->
        <?php if($slider):
        count($slider);
        foreach($slider as $slide): ?>
           <div class="top-slide-inner">
            <div class="slider-img">
              <img src="<?= base_url().'./public/uploads/frontend/slider/'.$slide->image_gallery; ?>" alt="flexion khan Rayees">

            </div>
            <div class="slider-text">
              <h2>An <strong>Excellent</strong> <?= $slide->image_title; ?></h2>
              <p><strong>Noble Heart</strong> <?= $slide->image_title; ?></p>
              <div class="readmore_area">
                <a data-hover="Read More" href="<?= $slide->website_link; ?>" target="_blank"><span>Read More</span></a>                
              </div>
            </div>
          </div>
          <!-- End First slide -->
        <?php endforeach; ?>
        <?php else: ?>
            <!-- Start 2nd slide -->
            <div class="top-slide-inner">
              <div class="slider-img">
                <img src="<?= base_url('public/assets/home_image/images/15.jpg'); ?>" alt="">
              </div>
              <div class="slider-text">
                <h2><strong>Noble</strong> Heart Super Speciality Hospital </h2>
                <p><strong>Noble</strong> Heart Super Speciality Hospital Experience Quality Care</p>
                <div class="readmore_area">
                  <a data-hover="Read More" href="https:khanrayees.000webhostapp.com" target="_blank"><span>Read More</span></a>                
                </div>
              </div>
            </div>
            <!-- End 2nd slide -->

        <?php endif; ?>
       
      </div><!-- /top-slider -->
    </section>