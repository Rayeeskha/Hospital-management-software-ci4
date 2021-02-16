<!DOCTYPE html>
<html>
<head>
	<title>Hospital Blog</title>
	<!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include ---> 
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  --->

   <!--=========== START BLOG SECTION ================-->       
    <section id="blogArchive">      
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="blog-breadcrumbs-area">
            <div class="container">
              <div class="blog-breadcrumbs-left">
                <h2>Blog</h2>
              </div>
              <div class="blog-breadcrumbs-right">
                <ol class="breadcrumb">
                  <li>You are here</li>
                  <li><a href="#">Home</a></li>                  
                  <li class="active">Blog</li>
                </ol>
              </div>
            </div>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <!-- Start Blog Archive Area -->
                <div class="blogArchive-area">
                  <div class="row">
                  <!-- Start left Side bar -->
                    <div class="col-md-3 col-sm-4">
                      <aside class="sidebar">
                        <!-- Start sidebar widget -->
                        <div class="sidebar-widget">
                          <h3>Latest Posts</h3>
                          <ul class="popular-tab">

                          	<?php if($blogs):
                          	count($blogs);
                          	foreach($blogs as $blog): ?>
                          		<li>
	                              <div class="media">
	                                <div class="media-left">
	                                  <a href="#" class="news-img">
	                                    <img alt="img" src="<?= base_url('public/uploads/frontend/blog_image/'.$blog->blog_image); ?>" class="media-object">
	                                  </a>
	                                </div>
	                                <div class="media-body">
	                                 <a href="<?= base_url('Home/view_blog/'.$blog->id); ?>"><?= $blog->blog_title; ?></a>
	                                 <span class="feed-date"><?= $blog->created_date ?> <?= $blog->created_month; ?> <?= $blog->created_year; ?></span>
	                                </div>
	                              </div>
	                            </li>
                          	<?php endforeach; ?>
                          	<?php else: ?>
                          		  <li>
		                              <div class="media">
		                                <div class="media-left">
		                                  <a href="#" class="news-img">
		                                    <img alt="img" src="<?= base_url('public/assets/home_image/images/small-blog-img1.jpg'); ?>" class="media-object">
		                                  </a>
		                                </div>
		                                <div class="media-body">
		                                 <a href="#">Dummy text of the Medical Post</a>
		                                 <span class="feed-date">28.02.15</span>
		                                </div>
		                              </div>
		                            </li> 
                          	<?php endif; ?>
                          </ul>
                        </div>
                       
                        <!-- Start sidebar widget -->
                        <div class="sidebar-widget">
                          <h3>Tags</h3>
                          <ul class="tag-nav">
                            <li><a href="#">Dental</a></li>
                            <li><a href="#">Surgery</a></li>
                            <li><a href="#">Pediatric</a></li>
                            <li><a href="#">Cardiac</a></li>
                            <li><a href="#">Ophthalmology</a></li>
                            <li><a href="#">Diabetes</a></li>
                          </ul>
                        </div>
                        <!-- Start sidebar widget -->
                        <div class="sidebar-widget">
                          <h3>Text Widget</h3>
                          <p>This is text widget of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly <a href="#">believable</a></p>
                        </div>
                        <!-- Start sidebar widget -->
                        <div class="sidebar-widget">
                          <h3>Archives</h3>
                          <ul class="archives">
                            <li><a title="May 2015" href="#">May 2015<span>2</span></a></li>
                            <li><a title="April 2015" href="#">April 2015<span>5</span></a></li>
                            <li><a title="March 2015" href="#">March 2015<span>10</span></a></li>
                          </ul>
                        </div>
                        <!-- Start sidebar widget -->
                        <div class="sidebar-widget">
                          <h3>Categories</h3>
                          <ul>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Dental</a></li>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Surgery</a></li>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Pediatric</a></li>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Cardiac</a></li>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Ophthalmology</a></li>
                            <li><a href="#"><span class="fa fa-angle-right"></span>Diabetes</a></li>
                          </ul>
                        </div>
                      </aside>
                    </div>
                    <!-- Start Blog Content -->
                    <div class="col-md-9 col-sm-8">                     
                      <div class="blog-content">
                        <!-- Start Single Blog -->

                        <?php if($secound_blogs):
                        count($secound_blogs);
                        foreach($secound_blogs as $blogs): ?>
                      	<div class="single-Blog">
                          <div class="single-blog-left">
                            <ul class="blog-comments-box">
                              <li><?= $blogs->created_month; ?> <h2><?= $blogs->created_date; ?></h2><?= $blogs->created_year; ?></li>
                              <li><span class="fa fa-eye"></span>1523</li>
                              <li><a href="#"><span class="fa fa-comments"></span>5</a></li>
                            </ul>
                          </div>
                          <div class="single-blog-right">
                            <div class="blog-img">
                              <figure class="blog-figure">
                               <a href="#"><img alt="img" src="<?= base_url('public/uploads/frontend/blog_image/'.$blogs->blog_image); ?>"></a>
                                <span class="image-effect"></span>
                              </figure>
                            </div>
                            <div class="blog-author">
                              <ul>
                                <li>By <a href="#"><?= $blogs->doctor_name; ?></a></li>
                                <li>In <a href="#"><?= $blogs->department_name; ?></a></li>
                              </ul>
                            </div>
                            <div class="blog-content">
                              <h2><?= $blogs->blog_title; ?></h2>
                              <p><?= $blogs->blog_content; ?></p>
                              <!-- Read more btn -->
                              <a class="wpcf7-submit button--itzel" href="#">
                                <i class="button__icon fa fa-link"></i>
                                <span>Read More</span>
                              </a>   
                            </div>
                          </div>
                        </div>

                        <?php endforeach; ?>
                        <?php else: ?>
                        	<h6 style="color: red;">Not Any Posted here</h6>
                        <?php endif; ?>
       				 </div>
      </div>
    </section>
    <!--=========== START BLOG SECTION ================-->




<!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
<!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->
</body>
</html>