 <section id="testimonial">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="testimonial-area">
             <!-- Start Service Title -->
              <div class="section-heading">
                <h2>What our patients said</h2>
                <div class="line"></div>
              </div>
              <div class="testimonial-area">
                <ul class="testimonial-nav">
                  <?php if($pateint_feeback):
                  count($pateint_feeback);
                  foreach($pateint_feeback as $feedback): ?>
                     <li>
                        <div class="single-testimonial">
                          <div class="testimonial-img">
                            <img src="<?= base_url('public/uploads/frontend/review_image/'.$feedback->review_image); ?>" alt="img">
                          </div>
                          <div class="testimonial-cotent">
                            <p class="testimonial-parg"><?= $feedback->review_content; ?></p>
                          </div>
                        </div>
                      </li>
                  <?php endforeach; ?>
                  <?php else: ?>
                  <?php endif; ?>

                  
                                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>