<section id="homeBLog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="homBlog-area">
             <!-- Start Service Title -->
              <div class="section-heading">
                <h2>News From Blog</h2>
                <div class="line"></div>
              </div> 
              <!-- Start Home Blog Content -->
              <div class="homeBlog-content">
                <div class="row">
                  <!-- Start Single Blog -->
                  <?php if($blogs):
                  count($blogs);
                  foreach($blogs as $news_blog): ?>
                     <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single-Blog">
                      <div class="single-blog-left">
                        <ul class="blog-comments-box">
                          <li><?= $news_blog->created_month; ?> <h2><?= $news_blog->created_date; ?></h2>
                            <?= $news_blog->created_year; ?></li>
                          <li><span class="fa fa-eye"></span>1523</li>
                          <li><a href="#"><span class="fa fa-comments"></span>5</a></li>
                        </ul>
                      </div>
                      <div class="single-blog-right">
                        <div class="blog-img">
                          <figure class="blog-figure">
                           <a href="#"><img src="<?= base_url('public/assets/home_image/images/choose-us-img3.jpg'); ?>" alt="img"></a>
                            <span class="image-effect"></span>
                          </figure>
                        </div>
                        <div class="blog-author">
                          <ul>
                            <li>By <a href="#"><?=  $news_blog->doctor_name; ?></a></li>
                            <li>In <a href="#"><?=  $news_blog->department_name; ?></a></li>
                          </ul>
                        </div>
                        <div class="blog-content">
                          <h2><?=  $news_blog->blog_title; ?></h2>
                          <p><?=  $news_blog->blog_content; ?></p>
                          <div class="readmore_area">
                            <a href="<?= base_url('Home/view_blog/'.$news_blog->id); ?>" data-hover="Read More"><span>Read More</span></a>                
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Start Single End -->
                  <?php endforeach; ?>
                  <?php else: ?>
                  <?php endif; ?>   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>