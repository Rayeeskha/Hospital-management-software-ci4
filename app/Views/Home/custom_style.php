<style>



/* Table of Content
==================================================
	#BASIC TYPOGRAPHY
	#HOME HEADER
	#HOME SLIDER SECTION
	#HOME SERVICE SECTION
	#HOME WHY US SECTION
	#HOME COUNTER SECTION
	#HOME MEET DOCTORS SECTION
	#HOME TESTIMONIAL SECTION
	#HOME BLOG SECTION
	#FOOTER 
	#BLOG ARCHIVE PAGE
	#BLOG DETAILS PAGE
	#FEATURES  
	#GALLERY
	#CONTACT
	#404 page
	#RESPONSIVE CSS
*/


/*--------------------*/
/* BASIC TYPOGRAPHY */
/*--------------------*/

body,html{
  overflow-x:hidden;
}
body {
font-family: 'Habibi', serif;
overflow-x: hidden !important;
}

ul{
  padding: 0;
  margin: 0;
  list-style: none;
}
a{ 
  text-decoration: none;
  color: #2f2f2f;  
}
a:hover,
a:focus{
  outline: none;
  text-decoration: none;
}
h1,
h2,
h3,
h4,
h5,
h6{
	font-family: 'Raleway', sans-serif;	
}
h2 {
  color: #313338;  
  font-size: 30px;
  font-weight: 700;
  line-height: 40px;
  margin: 0;
  padding-bottom: 10px;  
}
img{
 border:none;
}
.img-center {
  display: block;
  margin-left: auto;
  margin-right: auto;  
  text-align: center;
  max-width: 100%;
}
.img-right{
  display: block;
  margin-left: auto;
  max-width: 100%;  
}
.img-left {
  display: block; 
  margin-right: auto;  
  max-width: 100%;
}

/* Preloader */
#preloader {
  position: fixed;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-color:#fff; /* change if the mask should have another color then white */
  z-index:99999; /* makes sure it stays on top */ 
}

#status {
  width:200px;
  height:200px;
  position:absolute;
  left:50%; /* centers the loading animation horizontally one the screen */
  top:50%; /* centers the loading animation vertically one the screen */
  background-image:url(<?= base_url('public/assets/home_image/images/status.gif') ?>); /* path to your loading animation */
  background-repeat:no-repeat;
  background-position:center;
  margin:-100px 0 0 -100px; /* is width and height divided by two */
}

/*scrol to top*/

.scrollToTop {
	bottom: 60px;
	display: none;
	font-size: 32px;
	line-height: 50px;
	font-weight: bold;
	height: 50px;
	position: fixed;
	right: 50px;
	text-align: center;
	text-decoration: none;
	width: 50px;
	z-index: 999;
	color: #fff; 	
	transform:rotate(43deg);
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	-ms-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;

}
.scrollToTop>i{
	 transform:rotate(-45deg);
}
.scrollToTop:hover,
.scrollToTop:focus{
	background-color: #fff;
	text-decoration: none;
	outline: none;
}

/*--------------------*/
/* HEADER */
/*--------------------*/

#header{
	float: left;
	display: inline;
	width: 100%;
}
.menu_area{
	float: left;
	display: inline;
	width: 100%;	
}
.navbar-default .navbar-nav > li > a {	
	color: #fff;
	position: relative;
	display: inline-block;	
	outline: none;	
	padding: 15px 10px;
	text-decoration: none;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: bold;
	text-shadow: 0 0 1px rgba(255,255,255,0.3);	
	-webkit-transition: color 0.3s;
	-moz-transition: color 0.3s;
	transition: color 0.3s;
}
.navbar-default {
	padding: 10px 0;
	-moz-transition: padding 0.3s ease 0s;
	-o-transition: padding 0.3s ease 0s;
	-webkit-transition: padding 0.3s ease 0s;
	transition: padding 0.3s ease 0s
}
.past-main{
	padding: 0px;
}
.main-nav{
	margin : 10px 0px;
}
.navbar-default .navbar-nav > li > a::before {
	position: absolute;
	top: 80%;
	left: 50%;
	color: transparent;
	content: '•';
	text-shadow: 0 0 transparent;
	font-size: 2em;
	-webkit-transition: text-shadow 0.3s, color 0.3s;
	-moz-transition: text-shadow 0.3s, color 0.3s;
	transition: text-shadow 0.3s, color 0.3s;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	pointer-events: none;
}
.navbar-default .navbar-nav > li > a:hover::before,
.navbar-default .navbar-nav > li > a:focus::before,
.navbar-default .navbar-nav > .active > a::before {
	color: #fff;
	text-shadow: 10px 0 #fff, -10px 0 #fff;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
	color: #fff;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:focus,
.navbar-default .navbar-nav > .active > a:hover {
  color: #fff;	
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:focus,
.navbar-default .navbar-nav > .open > a:hover {
  color: #fff;
}
.navbar-right .dropdown-menu {
  left: auto;
  right: 15px;
  top: 74px;
}
.navbar-right .dropdown-menu::before {
	background: none repeat scroll 0 0 #fff;
	content: "";
	display: block;
	height: 20px;
	right: 15px;
	margin-top: -43px;
	position: absolute;
	top: 32px;
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	-webkit-transform: rotate(45deg);
	transform: rotate(45deg);
	width: 20px;
	z-index: -99
}
.dropdown-menu > li > a {
     clear: both;
    color: #c3c3c3;
    display: block;
    font-weight: bold;
    line-height: 1.42857;
    padding: 5px 20px;
    white-space: nowrap;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus{
  color: #fff;  
}
.navbar-default .navbar-nav .open .dropdown-menu > li > a {
  color: #c3c3c3;
}
.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover {
  color: #fff;  
}
.navbar-nav .open .dropdown-menu {
  background-color: #ffffff;   
}
.navbar-brand {
  color: #fff !important;
  font-family: 'Cinzel Decorative', cursive;
  font-size: 26px;
  font-weight: bold;
  margin-top: 5px;
  width: 300px;
}
.navbar-brand img{
	width: 100%;
}
.navbar-brand>i{
	margin-right: 8px;
	font-size: 30px;
}

/*--------------------*/
/* HOME SLIDER */
/*--------------------*/

#sliderArea {
  display: inline;
  float: left;
  margin-top: 70px;
  width: 100%;
}
.top-slider{
	float: left;
	display: inline;
	margin-bottom: 0;
	width: 100%;
}
.top-slide-inner{
	float: left;
	display: inline;
	height: 600px;
	width: 100%;

}
.slider-img{
	float: left;
	display: inline;
	height: 100%;
	width: 100%;
}
.slider-img>img{
	width: 100%;
	height: 100%;
}
.top-slider .slick-prev,
.top-slider .slick-next {
	background-color: transparent;
	border: 2px solid #ccc;
	border-radius: 50%;
	color: #ccc;
	cursor: pointer;
	display: block;
	font-size: 0;
	font-weight: bold;
	height: 50px;
	line-height: 44px;
	margin-top: -10px;
	outline: medium none;
	padding: 10px;
	position: absolute;
	text-align: center;
	top: 50%;
	width: 50px;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
}
.top-slider .slick-prev{
	left: 3%;
}
.top-slider .slick-next{
	right: 3%;
}
.top-slider .slick-next::before {
	
  content: "\f105";
  font-family: FontAwesome;
  font-size: 25px;
  left: 4px;
  margin-right: 5px;
  position: relative;
}
.top-slider .slick-prev::before {	
  content: "\f104";
  font-family: FontAwesome;
  font-size: 25px;
  left: 1px;
  margin-right: 5px;
  position: relative;
}
.top-slider .slick-dots {
	text-align: center;
	position: absolute;
	bottom: 2%;
	height: 30px;
	width: 100%;
	left: 0;
	z-index: 1000;
}

.top-slider .slick-dots li {
	display: inline-block;
	position: relative;
	width: 16px;
	height: 16px;
	border-radius: 50%;
	margin: 3px;
	background: #ddd;
	background: rgba(150,150,150,0.4);
	cursor: pointer;
	box-shadow:0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1);
}

.top-slider .slick-dots li {
	background: rgba(150,150,150,0.1);
	margin: 6px;
	-webkit-transition: all 0.2s;
	-moz-transition: all 0.2s;
	-ms-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	box-shadow: 
		0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1),
		0 0 0 2px rgba(255,255,255,0.5);
}

.top-slider .slick-dots li.slick-active,
.top-slider .slick-dots li:hover {
	box-shadow: 
		0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1),
		0 0 0 5px rgba(255,255,255,0.5);
}

.top-slider .slick-dots li.slick-active:after {
	content: "";
	position: absolute;
	width: 10px;
	height: 10px;
	top: 3px;
	left: 3px;
	border-radius: 50%;
	background: rgba(255,255,255,0.8);
}
.top-slider .slick-dots li button{
	display: none;
}
.readmore_area a {
  color: #fff;
  display: inline-block;
  font-size: 1.35em;
  font-weight: 400;
  letter-spacing: 1px;
  margin: 15px 25px;
  outline: medium none;
  position: relative;
  text-decoration: none;
  text-shadow: 0 0 1px rgba(255, 255, 255, 0.3);
  text-transform: uppercase;
}
.readmore_area {
  float: left;
  margin-top: 40px;
  position: relative;
  z-index: 1;
}

.readmore_area a {
	overflow: hidden;
	margin: 0 15px;
}

.readmore_area a span {
	display: block;
	padding: 10px 20px;
	-webkit-transition: -webkit-transform 0.3s;
	-moz-transition: -moz-transform 0.3s;
	transition: transform 0.3s;
}

.readmore_area a::before {
	position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
	padding: 10px 20px;
	width: 100%;
	height: 100%;
	background: #fff;
	content: attr(data-hover);
	-webkit-transition: -webkit-transform 0.3s;
	-moz-transition: -moz-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transform: translateX(-25%);
}

.readmore_area a:hover span,
.readmore_area a:focus span {
	-webkit-transform: translateX(100%);
	-moz-transform: translateX(100%);
	transform: translateX(100%);
}

.readmore_area a:hover::before,
.readmore_area a:focus::before {
	-webkit-transform: translateX(0%);
	-moz-transform: translateX(0%);
	transform: translateX(0%);
}
.slider-text {
  left: 0;
  margin: 0 auto;
  padding: 100px 30px 10px;
  position: absolute;
  right: 0;
  top: 10%;
  width: 80%;
}

.slider-text h2 {
	color: #f5f5f5;
	font-size: 55px;
	line-height: 55px;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.2);	
}
.slider-text p {
	color: #fff;
	max-width: 960px;
	position: relative;
	width: 100%;	
	font-size: 28px;
	padding-top: 10px;
	font-weight: 300;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.2);
	z-index: 100;
}
#topFeature{
	float: left;
	display: inline;
	width: 100%;
}
.single-top-feature{
	float: left;
	display: inline;
	width: 100%;
	text-align: center;
	padding: 40px 30px;
}
.single-top-feature > span {
  color: #fff;
  font-size: 45px;
  font-weight: bold;
}
.single-top-feature>h3{
	color: #fff;	
	font-size: 30px;
	text-transform: uppercase;
	font-weight: bold;
}
.single-top-feature > p {
  color: #fff;
  font-size: 16px;
}
.single-top-feature .readmore_area {
  float: none;
}
.single-top-feature .readmore_area a span {
  background: #fff none repeat scroll 0 0;
}
.single-top-feature .readmore_area a {
  border: 2px solid #fff;  
}
.single-top-feature .readmore_area a::before {
  color: #fff;
}
.opening-hours {
  background-color: #fff;
  padding-right: 60px;
}
.opening-hours>span{
	color: #000;	
}
.opening-hours>h3{
	color: #000;	
}
.opening-hours>p{
	color: #000;	
}
.opening-table li{
	border-bottom: 1px solid #f1f1f2;
	line-height: 30px;
	margin: 0 15px;
	padding: 5px 0;
	color: #000;
	float: left;
	display: block;
	width: 100%;
}
.opening-table li span{
	float: left;
}
.opening-table li div.value{
	float: right;
}

/*--------------------*/
/* SERVICE */
/*--------------------*/

#service{
	float: left;
	display: inline;
	width: 100%;
	padding: 40px 0px;
}
.service-area{
	float: left;
	display: inline;
	width: 100%;
}
.section-heading{
	float: left;
	display: inline;
	width: 100%;
	text-align: center;
}
.service-content{
	float: left;
	display: inline;
	width: 100%;
	padding: 10px 0px;
}
.single-service{
	float: left;
	margin-bottom: 30px;
	padding: 0px 10px;
	display: inline;
	width: 100%;
	text-align: center;
}
.service-icon-effect {
	display: inline-block;
	font-size: 0px;	
	margin: 15px 30px;
	width: 90px;
	height: 90px;
	border-radius: 50%;
	text-align: center;
	position: relative;
	z-index: 1;	
}
.service-icon-effect:after {
	pointer-events: none;
	position: absolute;
	width: 100%;
	height: 100%;
	border-radius: 50%;
	content: '';
	-webkit-box-sizing: content-box; 
	-moz-box-sizing: content-box; 
	box-sizing: content-box;
}
.service-icon-effect:before {	
	speak: none;
	font-size: 48px;
	line-height: 90px;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	display: block;
	-webkit-font-smoothing: antialiased;
}
.service-icon .service-icon-effect {	
	 -moz-transition: -moz-background 0.2s, color 0.2s;
	-o-transition: -o-background 0.2s, color 0.2s;
	-webkit-transition: -webkit-background 0.2s, color 0.2s;
	transition: background 0.2s, color 0.2s
}
.service-icon .service-icon-effect:after {
	top: -8px;
	left: -8px;
	padding: 8px;
	z-index: -1;
	opacity: 0;
}
.service-icon .service-icon-effect:after {
	-moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    transform: rotate(-90deg);
    -moz-transition: opacity 0.2s, -moz-transform 0.2s;
    -o-transition: opacity 0.2s, -o-transform 0.2s;
    -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
    transition: opacity 0.2s, transform 0.2s;
    -moz-transition: opacity 0.2s, -moz-transform 0.2s;
    -o-transition: opacity 0.2s, -o-transform 0.2s;
    -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
    transition: opacity 0.2s, transform 0.2s;
    -moz-transition: opacity 0.2s, -moz-transform 0.2s;
    -o-transition: opacity 0.2s, -o-transform 0.2s;
    -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
    transition: opacity 0.2s, transform 0.2s
}
.single-service:hover .service-icon-effect:after {
	  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg)
}
.service-icon .service-icon-effect:before {
	 -moz-transform: scale(0.8);
    -ms-transform: scale(0.8);
    -o-transform: scale(0.8);
    -webkit-transform: scale(0.8);
    transform: scale(0.8);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
    filter: alpha(opacity=70);
    opacity: 0.7;
    -moz-transition: -moz-transform 0.2s, opacity 0.2s;
    -o-transition: -o-transform 0.2s, opacity 0.2s;
    -webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
    transition: transform 0.2s, opacity 0.2s;
    -moz-transition: -moz-transform 0.2s, opacity 0.2s;
    -o-transition: -o-transform 0.2s, opacity 0.2s;
    -webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
    transition: transform 0.2s, opacity 0.2s;
    -moz-transition: -moz-transform 0.2s, opacity 0.2s;
    -o-transition: -o-transform 0.2s, opacity 0.2s;
    -webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
    transition: transform 0.2s, opacity 0.2s
}
.single-service:hover .service-icon-effect:before {
	 -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1
}
.single-service>h3 a{
	color: #3e3e3e;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s
}
.single-service>h3 a:hover,.single-service>h3 a:focus{
	text-decoration: none;
	outline: none;
}
.single-service > p {
  color: #8997a7;
  font-size: 15px;
  letter-spacing: 0.5px;
  line-height: 25px;
}

/*--------------------*/
/* WHY CHOOSE US */
/*--------------------*/

#whychooseSection{
	background-color: #f7f7f7;
	float: left;
	display: inline;
	width: 100%;
	padding: 75px 0px;
}
.whyChoose-left { 
  display: inline;
  float: left;
  margin-top: 30px;
  border: 5px solid #fff;
  height: 330px;
  width: 460px;
}
.whychoose-slider{
	float: left;	
	display: block;	
	width: 100%;
	height: 100%;
}
.whychoose-singleslide{
	float: left;	
	display: block;	
	width: 100%;
	height: 100%;
}
.whychoose-singleslide img{
	height: 320px;
	max-width: 100%;
}
.whychoose-slider .slick-prev,
.whychoose-slider .slick-next {
    background-color: #fff;
    height: 45px;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
    filter: alpha(opacity=80);
    opacity: 0.8;
    top: 46%;
    width: 40px;
    display: none !important;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s
}
.whyChoose-left:hover .slick-prev,
.whyChoose-left:hover .slick-next{
	display: block !important;
}
.whychoose-slider .slick-next {
  background-image: url(<?= base_url('public/assets/home_image/images/next_icon1.png'); ?>);
  background-position: center center;
  background-repeat: no-repeat; 
  right: 0;
}
.whychoose-slider .slick-prev {
  background-image: url(<?= base_url('public/assets/home_image/images/prev_icon.png'); ?>);
  background-position: center center;
  background-repeat: no-repeat;    
  left: 0;
}
.whyChoose-right{
	float: left;
	margin-top: 30px;
	display: inline;
	width: 100%;
	padding: 0px 20px;
}
.whyChoose-right .media{
	margin-bottom: 20px;
}
.media-icon {
	-moz-border-radius: 100%;
	-webkit-border-radius: 100%;
	border-radius: 100%;
	color: #fff;
	display: inline-block;
	font-size: 25px;
	height: 68px;
	line-height: 55px;
	margin-right: 15px;
	padding: 5px 10px;
	text-align: center;
	width: 68px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s
}
.whyChoose-right .media-heading{
	font-size: 22px;
	line-height: 1.3em;
	padding-bottom: 6px;	
}
.whyChoose-right .media-body > p {
  color: #6d6d6d;
  font-size: 15px;
  line-height: 1.4em;
}
.whyChoose-right .media:hover .media-icon{
	background-color: #fff;
}

/*--------------------*/
/* COUNTER */
/*--------------------*/

#counterSection {
	background-image: url(<?= base_url("public/assets/home_image/images/counter-bg2.jpg") ?>);
	background-repeat: no-repeat;
	background-position: 100%;
	background-color: #222;
	display: block;
	float: left;
	padding: 77px 0;
	width: 100%;
	position: relative;
	height: 300px;
}
#counterSection::after {
  background-color: rgba(0, 0, 0, 0.7);
  content: "";
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}
.counter-area {
  display: inline;
  float: left;
  position: relative;
  width: 100%;
  z-index: 99;
}
.counter-box {
  border: 1px solid #fff;
  border-radius: 10px;
  display: inline;
  float: left;
  font-family: "Raleway",sans-serif;
  padding: 10px 5px 20px;
  width: 100%;
  position: relative;
}
.counter-box::after {
  border: 1px solid #fff;
  border-radius: 10px;
  content: "";
  height: 111%;
  left: -9px;
  position: absolute;
  top: -8px;
  width: 107%;
}
.counter-no {
  color: #fff;
  display: inline;
  float: left;
  font-size: 60px;
  font-weight: bold;
  line-height: 1.3em;
  padding-left: 0;
  text-align: center;
  width: 100%;
}
.counter-label {
  color: #ededed;
  display: inline;
  float: left;
  font-size: 18px;
  font-weight: bold;
  line-height: 1.8em;
  padding-left: 0;
  padding-top: 5px;
  text-align: center;
  width: 100%;
  text-transform: uppercase;
}

/*--------------------*/
/* MEET DOCTORS */
/*--------------------*/

#meetDoctors{
	float: left;
	display: inline;
	width: 100%;
	padding: 75px 0px;
}
.meetDoctors-area{
	float: left;
	display: inline;
	width: 100%;
}
.doctors-area {
  display: inline;
  float: left;
  margin-top: 25px;
  width: 100%;
}
.doctors-nav{
	margin-left: -35px;
}
.doctors-nav .slick-slide {
  background-color: #ccc;
  display: inline-block;
  float: left;
  margin-left: 35px;
  min-height: 100px;
  width: 22%;
}
.single-doctor{
	float: left;
	display: inline-block;
	width: 100%;
}
.doctors-nav a {
	float: left;	
	width: 100%;
	color: #333;
}
.doctors-nav figure {
	position: relative;
	overflow: hidden;
	margin: 5px;
	background: #333;
}
.doctors-nav figure img {
	 position: relative;
    display: block;
    width: 100%;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
    filter: alpha(opacity=70);
    opacity: 0.7;
    -moz-transition: opacity 0.3s;
    -o-transition: opacity 0.3s;
    -webkit-transition: opacity 0.3s;
    transition: opacity 0.3s
}

.doctors-nav figcaption {
	position: absolute;
	top: 0;
	z-index: 11;
	padding: 10px;
	width: 100%;
	height: 100%;
	text-align: center;
}

.doctors-nav figcaption h2 {
	text-transform: uppercase;
    font-weight: 300;
    font-size: 18px;
    font-weight: bold;
    -moz-transition: -moz-transform 0.3s;
    -o-transition: -o-transform 0.3s;
    -webkit-transition: -webkit-transform 0.3s;
    transition: transform 0.3s;
    -moz-transition: -moz-transform 0.3s;
    -o-transition: -o-transform 0.3s;
    -webkit-transition: -webkit-transform 0.3s;
    transition: transform 0.3s
}

.doctors-nav figcaption p {
	 padding: 0 20px;
    color: #aaa;
    font-size: 17px;
    font-weight: 300;
    -moz-transition: opacity 0.3s, -moz-transform 0.3s;
    -o-transition: opacity 0.3s, -o-transform 0.3s;
    -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
    transition: opacity 0.3s, transform 0.3s;
    -moz-transition: opacity 0.3s, -moz-transform 0.3s;
    -o-transition: opacity 0.3s, -o-transform 0.3s;
    -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
    transition: opacity 0.3s, transform 0.3s
}
.doctors-nav figcaption h2,
.doctors-nav figcaption p {
	-moz-transform: translatey(50px);
    -ms-transform: translatey(50px);
    -o-transform: translatey(50px);
    -webkit-transform: translatey(50px);
    transform: translatey(50px)
}
.doctors-nav figure button {
	position: absolute;
	padding: 4px 20px;
	border: none;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: bold;
	-moz-transition: opacity 0.3s, -moz-transform 0.3s;
	-o-transition: opacity 0.3s, -o-transform 0.3s;
	-webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	transition: opacity 0.3s, transform 0.3s;
	-moz-transition: opacity 0.3s, -moz-transform 0.3s;
	-o-transition: opacity 0.3s, -o-transform 0.3s;
	-webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
	transition: opacity 0.3s, transform 0.3s
}
.doctors-nav figcaption,
.doctors-nav figcaption h2,
.doctors-nav figcaption p,
.doctors-nav figure button {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}
/* Style for SVG */
.doctors-nav svg {
	position: absolute;
	top: -1px; /* fixes rendering issue in FF */
	z-index: 10;
	width: 100%;
	height: 100%;
}

.doctors-nav svg path {
	fill: #fff;
}
.doctors-nav a:hover figure img {
	opacity: 1;
}
.doctors-nav a:hover figcaption h2,
.doctors-nav a:hover figcaption p {
	 -moz-transform: translatey(0);
    -ms-transform: translatey(0);
    -o-transform: translatey(0);
    -webkit-transform: translatey(0);
    transform: translatey(0)
}
.doctors-nav a:hover figcaption h2{
	background-color: #fff;
	margin: 0px;
	padding: 0px;	
}

.doctors-nav a:hover figcaption p {
	opacity: 0;
}
.doctors-nav figure button,
.doctors-nav figure button {
	top: 50%;
	left: 50%;
	border: 3px solid #fff;
	background: transparent;
	color: #fff;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	opacity: 0;
	-moz-transform: translatey(-50%) translatex(-50%) scale(0.25);
	-ms-transform: translatey(-50%) translatex(-50%) scale(0.25);
	-o-transform: translatey(-50%) translatex(-50%) scale(0.25);
	-webkit-transform: translatey(-50%) translatex(-50%) scale(0.25);
	transform: translatey(-50%) translatex(-50%) scale(0.25)
}
.doctors-nav a:hover figure button,
.doctors-nav a:hover figure button {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	opacity: 1;
	-moz-transform: translatey(-50%) translatex(-50%) scale(1);
	-ms-transform: translatey(-50%) translatex(-50%) scale(1);
	-o-transform: translatey(-50%) translatex(-50%) scale(1);
	-webkit-transform: translatey(-50%) translatex(-50%) scale(1);
	transform: translatey(-50%) translatex(-50%) scale(1)
}
.single-doctor-social {
  background-color: #ccc;
  display: inline;
  float: left;
  margin-top: -38px;
  padding: 10px 0;
  position: relative;
  text-align: center;
  width: 100%;
  z-index: 100;
}
.single-doctor-social > a {
	border: 2px solid #fff;
	color: #fff;
	display: inline-block;
	float: none;
	font-size: 15px;
	height: 30px;
	line-height: 27px;
	margin: 0 3px;
	text-align: center;
	width: 35px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s
}
.doctors-nav .slick-prev,
.doctors-nav .slick-next {
	background-color: #ccc;
	height: 45px;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
	filter: alpha(opacity=80);
	opacity: 0.8;
	top: 46%;
	-moz-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
	width: 40px
}
.doctors-nav .slick-next {
  background-image: url(<?= base_url('public/assets/home_image/images/team-next-icon.png'); ?>);
  background-position: center center;
  background-repeat: no-repeat; 
  color: #fff;
  right: -50px;
}
.doctors-nav .slick-prev {
  background-image: url(<?= base_url('public/assets/home_image/images/team-prev-icon.png'); ?>);
  background-position: center center;
  background-repeat: no-repeat;
  color: #fff;
  left: -15px;
}

/*--------------------*/
/* TESTIMONIAL */
/*--------------------*/

#testimonial{
	float: left;
	display: inline;
	padding: 75px 0px 100px;
	background-color: #f7f7f7;
	width: 100%;
}
.testimonial-area{
	float: left;
	display: inline;
	width: 100%;
}
.testimonial-nav {
  margin-top: 30px;
}
.testimonial-nav>li{
	display: block;
	width: 100%;
}
.single-testimonial{
	float: left;
	display: inline;
	width: 100%;
}
.testimonial-img {
  border-radius: 100%;
  height: 150px;
  margin: 0 auto;
  width: 150px;
}
.testimonial-img>img{
	width: 100%;
	height: 100%;
	border-radius: 100%;
}
.testimonial-cotent{
	float: left;
	display: inline;
	width: 100%;
	text-align: center;
	margin-top: 30px;
}
.testimonial-cotent > p {
  font-size: 18px;
  padding: 0 30px;
}
.testimonial-parg::before {
  content: "\f10d";
  font-family: FontAwesome;
  font-size: 25px;
  left: 0;
  margin-right: 5px;
  position: relative;
}
.testimonial-parg:after{
	position: relative;
	font-family: FontAwesome;
	content: "\f10e";
	left: 0;
	font-size: 25px;
}
.testimonial-cotent > p span{
	font-size: 25px;
}
.testimonial-cotent > p .fa-quote-left {
  margin-right: 5px;
}
.testimonial-cotent > p .fa-quote-right{
	margin-left: 5px;
}
.testimonial-nav .slick-dots li {
   -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s 
}
.testimonial-nav .slick-dots li button::before {
  color: transparent;  
}
.testimonial-nav .slick-dots li.slick-active button::before {
   -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=75)";
    filter: alpha(opacity=75);
    opacity: 0.75
}

/*--------------------*/
/* BLOG */
/*--------------------*/

#homeBLog{
	float: left;
	display: inline;
	width: 100%;
	padding: 75px 0;
}
.homBlog-area{
	float: left;
	display: inline;
	width: 100%;
}
.homeBlog-content{
	float: left;
	display: inline;
	width: 100%;
	margin-top: 25px;
}
.single-Blog{
	float: left;
	display: inline;
	width: 100%;
}
.single-blog-left{
	float: left;
	display: inline;
	width: 18%;
}
.blog-comments-box li {
  border-bottom: 1px solid #e3e3e3;
  border-right: 1px solid #e3e3e3;
  color: #aaa;
  display: block;
  float: left;  
  padding: 15px;
  text-align: center;
  width: 100%;  
}
.blog-comments-box li:last-child{
	border-bottom: none;
}
.blog-comments-box li > h2 {
  font-size: 33px;
  line-height: 32px;
  margin-bottom: 0;
  padding-bottom: 0;
}
.blog-comments-box li span {  
  display: block;
  font-size: 16px;
}
.blog-comments-box li > a {
  color: #aaa;
  text-decoration: none;
}
.single-blog-right{
	float: right;
	display: inline;
	width: 78%;
}
.blog-img{
	float: left;
	display: inline;
	width: 100%;
}
.blog-img img{
	width: 100%;
}
figure.blog-figure {
	/*background: #3498db;*/
}

figure.blog-figure img {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=95)";
    filter: alpha(opacity=95);
    opacity: 0.95;
    -moz-transition: opacity 0.35s, -moz-transform 0.35s;
    -o-transition: opacity 0.35s, -o-transform 0.35s;
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -moz-transition: opacity 0.35s, -moz-transform 0.35s;
    -o-transition: opacity 0.35s, -o-transform 0.35s;
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -moz-transform: scale3d(1.05, 1.05, 1);
    -ms-transform: scale3d(1.05, 1.05, 1);
    -o-transform: scale3d(1.05, 1.05, 1);
    -webkit-transform: scale3d(1.05, 1.05, 1);
    transform: scale3d(1.05, 1.05, 1)
}

figure.blog-figure:hover img {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=60)";
	filter: alpha(opacity=60);
	opacity: 0.6;
	-moz-transform: scale3d(1, 1, 1);
	-ms-transform: scale3d(1, 1, 1);
	-o-transform: scale3d(1, 1, 1);
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1)
}
.blog-img figure {
  background: none repeat scroll 0 0 #3085a3;
  cursor: pointer;
  float: left;
  height: auto;
  overflow: hidden;
  position: relative;
  text-align: center;
}
.blog-img figure img {
	position: relative;
	display: block;
	min-height: 100%;
	max-width: 100%;
	opacity: 0.8;
}
figure.blog-figure .image-effect::before {  
	content: "";
	height: 100%;
	left: 0;
	position: absolute;
	top: 0;
	-moz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-moz-transition: -moz-transform 0.6s ease 0s;
	-o-transition: -o-transform 0.6s ease 0s;
	-webkit-transition: -webkit-transform 0.6s ease 0s;
	transition: transform 0.6s ease 0s;
	width: 100%
}
figure.blog-figure:hover .image-effect::before {
	-moz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0)
}
.blog-author {
  display: inline;
  float: left;
  padding: 10px 0;
  width: 100%;
}
.blog-author > ul > li {
  display: inline-block;
  padding: 5px;
  color: #aaa;
}
.blog-content{
	float: left;
	display: inline;
	width: 100%;
}
.blog-content > h2 {
  font-size: 18px;
  line-height: 25px;
}
.blog-content .readmore_area a { 
  font-size: 14px;
  margin-left: 0;
}
.blog-content .readmore_area a::before { 
  padding: 8px 13px;  
}
.blog-content .readmore_area a span { 
  padding: 8px 13px;  
}
.blog-content .readmore_area {
  margin-top: 25px;  
}

/*--------------------*/
/* FOOTER */
/*--------------------*/

#footer{
	float: left;
	display: inline;
	width: 100%;	
}
.footer-top {
  background-color: #f8f8f8;
  border-top: 2px solid #e9e9e9;
  display: inline;
  float: left;
  min-height: 100px;
  padding: 45px 0;
  width: 100%;
}
.single-footer-widget{
	float: left;
	display: inline;
	width: 100%;
	padding: 0 10px;
	color: #555;
}
.single-footer-widget .section-heading{
	text-align: left;
}
.single-footer-widget .section-heading > h2 {
  font-size: 20px;
  margin-bottom: 0px;
  padding-bottom: 0px;
  line-height: 25px;
}
.single-footer-widget .line {
  margin: 0 0 20px;
}
.footer-service li > a {
	color: #555;
	display: block;
	font-size: 15px;
	padding: 6px 0;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s
}
.footer-service li > a:hover{
  text-decoration: none;
  outline: none;
}
.footer-service li > a span {
  margin-right: 8px;
}
.tag-nav a {
	border: 1px solid #e2e6e7;
	color: #555;
	display: inline-block;
	float: left;
	font-size: 12px;
	margin-bottom: 8px;
	margin-right: 8px;
	padding: 10px 12px;
	text-transform: uppercase;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s
}
 .tag-nav li a:hover,
 .tag-nav li a:focus{
	color: #fff !important;
	text-decoration: none;
	outline: none;
}
.contact-info > p {
  line-height: 20px;
}
.contact-info > p span {
  font-size: 18px;
  margin-right: 10px;
}
.footer-middle {
  background-color: #f3f3f3;
  display: inline;
  float: left;
  padding: 25px 0;
  width: 100%;
}
.footer-copyright{
	float: left;
	display: inline;
	width: 100%;
}
.footer-copyright>p{
	margin-bottom: 0px;
	font-size: 16px;
}
.footer-copyright>p>a{
	text-decoration: none;
    outline: none;
    border-bottom: 1px transparent;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s
}
.footer-social{
	float: left;
	display: inline;
	width: 100%;
	text-align: right;
}
.footer-social a {  
	display: inline-block;
	float: none;
	font-size: 15px;
	height: 30px;
	line-height: 29px;
	margin: 0 3px;
	text-align: center;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
	width: 35px
}
.footer-bottom {
  background-color: #fff;
  display: inline;
  float: left;
  width: 100%;
  padding: 20px 0 ;
  text-align: center;
}
.footer-bottom p{
	margin-bottom: 0px;
	font-size: 15px;
}
.footer-bottom p a {
	border-bottom: 1px solid #ccc;
	outline: medium none;
	padding-bottom: 2px;
	text-decoration: none;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}

/*--------------------*/
/* BLOG ARCHIVE */
/*--------------------*/

#blogArchive {
  display: inline;
  float: left;
  margin-top: 90px;
  width: 100%;
}
.blog-breadcrumbs-area {
  background-color: #f5f5f5;
  display: inline;
  float: left;
  padding: 20px 0;
  width: 100%;
}
.blog-breadcrumbs-left{
	float: left;
	display: inline;
}
.blog-breadcrumbs-left>h2{
	padding-bottom: 0px;
}
.blog-breadcrumbs-right{
	float: right;
	display: inline;
}
.blog-breadcrumbs-right .breadcrumb{
	margin-bottom: 0px;
}
.blog-breadcrumbs-right .breadcrumb > li {
  color: #777;
}
.blog-breadcrumbs-right .breadcrumb > li a{
  text-transform: uppercase;
  font-size: 12px;
}
.blog-breadcrumbs-right .breadcrumb > .active {
  text-transform: uppercase;
  font-size: 13px;
}
.blogArchive-area {
  display: inline;
  float: left;
  padding: 70px 0;
  width: 100%;
}
.blog-content{
	float: left;
	display: inline;
	width: 100%;
}
.blog-content .button--itzel{
	text-align: center;
	width: 170px;
}
.blogArchive-area .single-blog-right {
  display: inline;
  float: right;
  width: 79%;
}
.blog-content .single-Blog{
	margin-bottom: 30px;
}
.blog-content .blog-img figure a{
	height: 100%;
}
.blog-pagination{
	float: left;
	display: inline;
	width: 100%;
	text-align: right;
}
.blog-pagination .pagination > li > a,
.blog-pagination .pagination > li > span {
	background-color: #fff;
	border: 1px solid #e2e6e7;
	color: #999;
	font-size: 16px;
	line-height: 1.42857;
	margin-left: 6px;
	padding: 6px 15px;
	font-family: "Raleway",sans-serif; 
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.blog-pagination .pagination > li > a:focus,
.blog-pagination .pagination > li > a:hover,
.blog-pagination .pagination > li > span:focus,
.blog-pagination .pagination > li > span:hover {
  color: #fff;
}
.blog-pagination .pagination > li:last-child > a,
.blog-pagination .pagination > li:last-child > span {
  border-bottom-right-radius: 0px;
  border-top-right-radius: 0px;
}
.blog-pagination .pagination > li:first-child > a,
.blog-pagination .pagination > li:first-child > span {
  border-bottom-left-radius: 0px;
  border-top-left-radius: 0px;
}
.sidebar{
	float: left;
	display: inline;
	width: 100%;	
	min-height: 300px;
}
.sidebar-widget{
	float: left;
	display: inline;
	width: 100%;
	margin-bottom: 25px;
}
.sidebar-widget > h3 {
  border-bottom: 1px solid #e2e6e7;
  font-size: 22px;
  margin-bottom: 25px;
  margin-top: 0;
}
.sidebar-widget h3::after {
  content: "";
  display: block;
  height: 2px;
  margin-bottom: -1px;
  margin-top: 13px;
  position: relative;
  width: 50px;
}
.popular-tab li { 
  margin-bottom: 15px;
  padding-bottom: 15px;
}
.popular-tab li:last-child{
  border-bottom: none;
}
.news-img {
  display: block;
  height: 70px;
  width: 85px;
}
.news-img>img{
  width: 100%;
  height: 100%;
}
.news-img>img:hover{
	opacity: 0.8;
}
.popular-tab .media-body > a {
	display: block;
	font-size: 15px; 
	padding: 0px;  
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.popular-tab .media-body > a:hover,
.popular-tab .media-body > a:focus{
	color: #000;
	outline: none;
}
.feed_date {
  color: #ccc;
  display: block;
  margin-top: 7px;
}
.sidebar-widget p>a{	
	font-weight: bold;
}
.archives li{
float: left;
margin-bottom: 7px;
width: 100%;
}
.archives li > a {
	border: 1px solid #e2e6e7;
	color: #999;
	display: block;
	font-size: 15px;
	letter-spacing: 1px;
	line-height: 15px;
	padding: 10px 12px;
	text-align: left;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.archives li > a:hover {
  text-decoration: none;
  outline: none;
  color: #fff !important;
}
.archives li>a>span{
	float: right;
}
.sidebar-widget>ul li{	
}
.sidebar-widget>ul li>a{
	display: block;
	padding: 5px;
	border-bottom: 1px solid #e2e6e7;
}
.sidebar-widget>ul li>a:hover{
	text-decoration: none;
}
.sidebar-widget>ul li>a>span{
	margin-right: 5px;
}

/*--------------------*/
/* BLOG DETAILS */
/*--------------------*/

.blog-details h2 {
  font-size: 30px;
  line-height: 40px;
  margin-bottom: 10px;
  margin-top: 10px;
}
.blog-details p {
  font-size: 15px;
  line-height: 28px;
}
.blog-details blockquote {
  background: none repeat scroll 0 0 #f8f8f8;
  border-left: medium none;
  font-size: 20px;
  font-style: italic;
  padding: 15px 15px 15px 40px;
  position: relative;
  margin-top: 30px;
  margin-bottom: 30px;
}
.blog-details blockquote::before {
  content: "\"";
  font-family: "Raleway",sans-serif;
  font-size: 150px;
  font-style: italic;
  line-height: 130px;
  position: absolute;
  right: 32px;
  top: 64%;
}
.blog-details blockquote::after {
  content: "\"";
  font-family: "Raleway",sans-serif;
  font-size: 150px;
  font-style: italic;
  left: -35px;
  line-height: 130px;
  position: absolute;
  top: 0;
}
.blog-details{
	position: relative;
}
.blog-details li {
  font-size: 15px;
  line-height: 25px;
}
.blog-details li>i {
  margin-right: 5px;
}
.blog-details .checkbox label,
.blog-details .radio label { 
  font-size: 15px;
}
.blog-details > a,
.blog-details > p>a {
  border: 1px none transparent;
  color: #555;
  font-size: 15px;
  font-weight: bold;
}
.blog-details>a:hover,
.blog-details>a:focus,
.blog-details > p>a:hover,
.blog-details > p>a:focus{
	text-decoration: none;
	outline: none;
}
.blog-details .table-hover tbody tr:hover{
	color: #fff;
}
.social-share{
	border-bottom: 2px solid #f8f8f8;
	border-top: 2px solid #f8f8f8;
	display: inline;
	float: left;
	margin-bottom: 30px;
	margin-top: 30px;
	padding: 15px;
	width: 100%;
}
.social-share h3{
	float: left;
	margin: 0px;
	padding: 0px;
}
.social-share ul{
	float: right;
	text-align: right;
	display: inline-block;
}
.social-share ul li{
	display: inline-block;
}
.social-share ul li > a {  
	display: inline-block;
	text-align: center;
	width: 30px;
	color: #fff;
	font-size: 18px;
	height: 30px;
	line-height: 31px;
	margin-left: 5px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.social-share ul li:nth-child(1) a:hover{
	background-color: #354c8c;
}
.social-share ul li:nth-child(2) a:hover{
	background-color: #33CCFF;
}
.social-share ul li:nth-child(3) a:hover{
	background-color: #C92619;
}
.social-share ul li:nth-child(4) a:hover{
	background-color: #DD4B39;
}
.social-share ul li:nth-child(5) a:hover{
	background-color: #0077B5;
}
.post-navigation {
  border-bottom: 2px solid #f8f8f8;
  border-top: 2px solid #f8f8f8;
  display: inline;
  float: left;
  margin-bottom: 30px;
  margin-top: 30px;
  width: 100%;
  padding: 5px 0px;
}
.postnav-left{
	float: left;
	display: inline;
	width: 50%;
	padding: 10px;
	text-align:center;
	border-right: 1px solid #f8f8f8;
}
.postnav-left a,
.postnav-right a {
	border: 1px solid #f2f2f2;
	border-radius: 50%;
	color: #ccc;
	display: inline-block;
	font-size: 22px;
	height: 40px;
	line-height: 38px;
	width: 40px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.postnav-left h4,
.postnav-right h4 {
  color: #ccc;
  margin-bottom: 0px;  
}
.postnav-right{
	float: right;
	display: inline;
	width: 50%;
	text-align: center;
	padding: 10px;	
}
.post-author {
  background-color: #f8f8f8;
  display: inline;
  float: left;
  margin-bottom: 0;
  margin-top: 30px;
  padding: 20px;
  width: 100%;
}
.post-author > h3 { 
  font-weight: bold;
  margin-top: 0;
  padding-bottom: 10px;
}
.post-author .news-img {  
  margin-right: 10px;
}
.author-name {
  font-size: 15px;
  font-weight: bold;
}
.post-author p {
  font-size: 14px;
  line-height: 19px;
}
.author-morepost {
  border-bottom: 1px solid #ccc;
  display: inline-block;
}
.author-morepost:hover,.author-morepost:focus {
  text-decoration: none;
  outline: none;
}
.blog-author ul>li span{
	margin-right: 5px;
}
.similar-post{
 float: left;
 display: inline;
 width: 100%;
 margin-top: 30px;
}
.similar-post > h2 {
  border-bottom: 1px solid #ccc;
  padding-bottom: 10px;
}
.similar-post .media{
	margin-bottom: 10px;
}
.similar-post .media-body a { display: block;}
.comments-area {
  display: inline;
  float: left;
  margin: 20px 0 30px;
  width: 100%;
}
.comments-title{
	border-bottom: 1px solid #e2e6e7;
	font-size: 22px;
	margin-bottom: 25px;
	margin-top: 0;
}
.comments-title::after {
  content: "";
  display: block;
  height: 2px;
  margin-bottom: -1px;
  margin-top: 13px;
  position: relative;
  width: 50px;
}
.comments{
	float: left;
	display: inline;
	width: 100%;
}
.commentlist li {
  border: 1px solid #f8f8f8;
  display: inline;
  float: left;
  padding: 10px;
  width: 100%;
  margin-bottom: 10px;
}
.comments-date {
  color: #888;
  display: block;
  font-size: 14px;
  margin-bottom: 10px;
}
.reply-btn {
	color: #fff;
	display: inline-block;
	float: right;
	font-size: 15px;
	line-height: 16px;
	padding: 8px 12px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.reply-btn:hover{
	color: #fff;
	text-decoration: none;
	outline: none;
	opacity: 0.8;
}
.children{
	margin-left: 50px;
}
.author-tag {
  color: #fff;
  display: inline-block;
  font-size: 12px;
  font-weight: bold;
  margin-bottom: 5px;
  padding: 4px 6px;
}
.author-comments{
	background-color: #f8f8f8;
}
.comments-pagination{
	display: inline-block;
	text-align: left;
}
.comments-pagination li{
	display: inline-block;	
}
.comments-pagination li a {
	border: 1px solid #f8f8f8;
	color: #ccc;
	display: inline-block;
	font-size: 15px;
	font-weight: bold;
	height: 30px;
	line-height: 15px;
	padding: 5px;
	text-align: center;
	width: 30px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.comments-pagination li a:hover {
  color: #fff;
  text-decoration: none;
  outline: none;
}
.commentlist>li:last-child{
	margin-bottom: 0px;
}
#respond {
  display: inline;
  float: left;
  margin-top: 20px;
  width: 100%;
}
#respond .reply-title {
  font-size: 25px;
}
#respond .comment-notes {
  font-size: 15px;
}
#respond .required{
	color: red;
}
#respond label{
	display: block;	
}
#respond input[type="text"],
#respond input[type="email"],
#respond input[type="url"] {
	color: #555;
	margin-bottom: 10px;
	height: 35px;
	padding: 5px;
	width: 65%;
	border: 1px solid #ccc;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}

#respond textarea {
  border: 1px solid #ccc;
  color: #555;
  margin-bottom: 5px;
  padding: 10px;
  width: 100%;
}
.form-submit input {
	color: #fff;
	font-size: 16px;
	font-weight: bold;
	margin-top: 5px;
	padding: 5px 8px;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.form-submit input:hover {
  background-color: #fff;  
}

/*--------------------*/
/* Features */
/*--------------------*/

#extraFeatures{
	background-color: #fff;
	float: left;
	display: inline;
	width: 100%;
	padding: 75px 0px;
}
.departments-area {
  display: inline;
  float: left;
  padding: 0 12px 0 0;
  width: 100%;
}
.custom-panel{
	float: left;
	display: inline;
	width: 100%;
}
.custom-panel .panel-heading {
  border-bottom: none;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
  padding: 0px;
  
}
.custom-panel .panel-heading a {
	color: #fff;
	display: block;
	font-size: 18px;
	font-weight: bold;
	padding: 12px 15px;
	text-decoration: none;
	-moz-transition: all 0.5s;
	-o-transition: all 0.5s;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
.custom-panel .panel-heading a:hover{
	opacity: 0.8;
}
.custom-panel .panel-heading a>span{
	float: right;
}
.custom-panel .panel {
  border-radius: 0px;
  margin-bottom: 0;
  border:none;
}
.custom-panel .panel-body img{
	margin-bottom: 15px;
}
.how-works-area{
	float: left;
	display: inline;
	width: 100%;
	 padding: 0 0 0 12px;
}
.how-works{
	float: left;
	display: inline;
	width: 100%;
}
.nav-tabs{
	display: inline-block;
	text-align: center;
}
.nav-tabs li{
	display: inline-block;
	float: none;
}
.nav-tabs > li > a {
  border: 1px solid transparent;
  border-radius: 0;
  color: #fff;
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  line-height: 1.42857;
  padding: 10px 18px;
}
.nav-tabs > li > a:hover,.nav-tabs > li > a:focus{
	opacity: 0.8;
}
.tab-content > .tab-pane {
  padding: 20px 0px ;
}

/*--------------------*/
/* GALLERY */
/*--------------------*/

#gallery{
	float: left;
	display: inline;
	width: 100%;
	padding: 75px 0px;
}
.gallery-area{
	float: left;
	display: inline;
	width: 100%;
}
.my-simple-gallery {
  float: left;
  margin-bottom: 20px;
  width: 100%;
}
.my-simple-gallery img {
  height: 100%;
  width: 100%;
}
.my-simple-gallery figure {
  margin-bottom: 30px;
}
.my-simple-gallery figure a {
  display: block;
  height: 240px;
  width: 100%;
}
.my-simple-gallery figcaption {
  display: none;
}
a.gallery-iteam img {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=95)";
    filter: alpha(opacity=95);
    opacity: 0.95;
    -moz-transition: opacity 0.35s, -moz-transform 0.35s;
    -o-transition: opacity 0.35s, -o-transform 0.35s;
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -moz-transition: opacity 0.35s, -moz-transform 0.35s;
    -o-transition: opacity 0.35s, -o-transform 0.35s;
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -moz-transform: scale3d(1.05, 1.05, 1);
    -ms-transform: scale3d(1.05, 1.05, 1);
    -o-transform: scale3d(1.05, 1.05, 1);
    -webkit-transform: scale3d(1.05, 1.05, 1);
    transform: scale3d(1.05, 1.05, 1)
}
a.gallery-iteam:hover img {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=60)";
    filter: alpha(opacity=60);
    opacity: 0.6;
    -moz-transform: scale3d(1, 1, 1);
    -ms-transform: scale3d(1, 1, 1);
    -o-transform: scale3d(1, 1, 1);
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1)
}
.my-simple-gallery a {
  cursor: pointer;
  float: left;
  height: auto;
  overflow: hidden;
  position: relative;
  text-align: center;
}
.my-simple-gallery a img {
	position: relative;
	display: block;
	min-height: 100%;
	max-width: 100%;
	opacity: 0.8;
}
a.gallery-iteam .image-effect::before { 
	content: "";
	height: 100%;
	left: 0;
	position: absolute;
	top: 0;
	-moz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, -100%, 0);
	-moz-transition: -moz-transform 0.6s ease 0s;
	-o-transition: -o-transform 0.6s ease 0s;
	-webkit-transition: -webkit-transform 0.6s ease 0s;
	transition: transform 0.6s ease 0s;
	width: 100%
}
a.gallery-iteam:hover .image-effect::before {
	-moz-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -ms-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -o-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    -webkit-transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0);
    transform: scale3d(1.9, 1.4, 1) rotate3d(0, 0, 1, 45deg) translate3d(0, 100%, 0)
}
.my-simple-gallery figcaption {
  bottom: 0;
  color: #fff;
  display: block;
  font-size: 18px;
  font-weight: bold;
  left: 0;
  margin-top: -23px;
  padding-bottom: 10px;
  position: absolute;
  text-align: center;
  width: 100%;
}
.pswp__caption__center {
  font-size: 25px;
  text-align: center;
  max-width: 800px; 
}
.pswp__button--arrow--left::before,
.pswp__button--arrow--right::before {
  height: 40px; 
  top: 30px;
  width: 40px;
}
.pswp__button--arrow--right::before {
  background-position: -91px -39px; 
}
.pswp__button--arrow--left::before {
  background-position: -134px -39px;  
}

/*--------------------*/
/* Contact */
/*--------------------*/

#googleMap{
	float: left;
	display: inline;
	width: 100%;
	margin-bottom: -6px;
}
#contact{
	float: left;
	display: inline;
	padding: 40px 0px;
	width: 100%;
}
.contact-form{
	float: left;
	display: inline;
	width: 100%;
}
.contact-form > p {
  font-size: 17px;
  margin-bottom: 20px;
}
.contact-address {
  display: inline;
  float: left;
  width: 100%;
  padding: 0px 20px;
}
.contact-address>p{
	font-size: 17px;
	margin-bottom: 20px;
}
.contact-address>h3{
	margin-bottom: 0px;
	margin-top: 50px;
}
.contact-address .social-share {
  text-align: center;
  margin-top: 20px;
}
.contact-address .social-share ul{
	text-align: center;
	float: none;
}
.wp-form-control {
  border-radius: 0px;
  display: inline;
  font-size: 15px;	
  float: left;
  margin-bottom: 20px;
  padding: 10px 12px;
  -webkit-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
  -ms-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;  
  width: 100%;  
}
.wpcf7-text{
  height: 45px;
}
.wpcf7-email{
  height: 45px;
}
.wpcf7-textarea {
  height: 200px;
  padding: 15px;
}
.wpcf7-submit {
	float: left;
	min-width: 150px;
	max-width: 250px;
	font-weight: 600;
	display: block;
	margin: 1em;
	padding: 1em 2em;
	border: none;
	background: none;
	color: inherit;
	vertical-align: middle;
	position: relative;
	z-index: 1;
	-webkit-backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
}
.wpcf7-submit:focus {
	outline: none;
}
.wpcf7-submit > span {
	vertical-align: middle;
}
.button--itzel {
	border: none;
	padding: 0px;
	overflow: hidden;
	width: 255px;
}
.button--itzel::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border-radius: inherit;
	-webkit-clip-path: polygon(0% 0%, 0% 100%, 35% 100%, 35% 60%, 65% 60%, 65% 100%, 100% 100%, 100% 0%);
	clip-path: url(../index.html#clipBox);
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
}
.button--itzel.button--border-thin::before {
	border: 1px solid;
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -1px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -1px, 0);
}
.button--itzel.button--border-thick::before {
	border: 3px solid;
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -3px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -3px, 0);
}
.button--itzel::before,
.button--itzel .button__icon {
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--itzel .button__icon {
	background-color: #fff;
	position: absolute;
    top: 104%;
    left: 50%;
    padding: 20px;
    font-size: 20px;
    -moz-transform: translate3d(-50%, 0, 0);
    -ms-transform: translate3d(-50%, 0, 0);
    -o-transform: translate3d(-50%, 0, 0);
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0)
}
.button--itzel > span {	
	display: block;
    padding: 20px;
    -moz-transition: -moz-transform 0.3s, opacity 0.3s;
    -o-transition: -o-transform 0.3s, opacity 0.3s;
    -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
    transition: transform 0.3s, opacity 0.3s;
    -moz-transition: -moz-transform 0.3s, opacity 0.3s;
    -o-transition: -o-transform 0.3s, opacity 0.3s;
    -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
    transition: transform 0.3s, opacity 0.3s;
    -moz-transition-delay: 0.3s;
    -o-transition-delay: 0.3s;
    -webkit-transition-delay: 0.3s;
    transition-delay: 0.3s
}
.button--itzel:hover::before {
	-moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
}
.button--itzel:hover .button__icon {
	 -moz-transition-delay: 0.1s;
    -o-transition-delay: 0.1s;
    -webkit-transition-delay: 0.1s;
    transition-delay: 0.1s;
    -moz-transform: translate3d(-50%, -100%, 0);
    -ms-transform: translate3d(-50%, -100%, 0);
    -o-transform: translate3d(-50%, -100%, 0);
    -webkit-transform: translate3d(-50%, -100%, 0);
    transform: translate3d(-50%, -100%, 0)
}
.button--itzel:hover > span {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    -moz-transform: translate3d(0, -50%, 0);
    -ms-transform: translate3d(0, -50%, 0);
    -o-transform: translate3d(0, -50%, 0);
    -webkit-transform: translate3d(0, -50%, 0);
    transform: translate3d(0, -50%, 0);
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    -webkit-transition-delay: 0s;
    transition-delay: 0s
}
.appointment-area{
	float: left;
	display: inline;
	width: 100%;
}
#myModal .modal-content {
  background: #fff none repeat scroll 0 0;
  border-radius: 0;
  float: left;
  width: 100%;
}
#myModal .modal-title {
  line-height: 1.42857;
  margin: 0;
  font-size: 30px;  
}
.modal-header{
	display: inline;
	float: left;
	width: 100%;
}
.modal-body {
  display: inline;
  float: left;
  width: 100%;
}
.appointment-form label {
  color: #888;
  float: left;
  font-size: 18px;
  font-weight: normal;
  text-align: left;
}
.appointment-form .required{
	color: red;
	font-size: 15px;
}
.wpcf7-select{
	color: #888;
}

/*--------------------*/
/* ERROR PAGE */
/*--------------------*/

#errorPage {
  display: inline;
  float: left;
  width: 100%;
  padding: 40px 0px 90px;
}
.error-page-area{
	float: left;
	display: inline;
	width: 100%;
	text-align: center;
}
.error-page-area h1 {
  font-size: 200px;
  font-weight: bold;
  margin-top: 0;
}
.error-page-area h3 {
  font-size: 60px;
  margin-bottom: 90px;
  margin-top: 0;
  text-transform: uppercase;
}
.error-page-area h5{	
	color: #888;
	font-size: 30px;
}
.error-page-area p{	
	color: #888;
	font-size: 16px;
}
.error-page-area .readmore_area {
  float: none;
  margin: 0 auto;  
  margin-top: 40px;
}

#aboutUs{
	float: left;
	display: inline;
	width: 100%;
}
.about-us-area{
	float: left;
	display: inline;
	width: 100%;
}

/*======================///////////////
			start responsive style
=====================///////////////////////*/


@media(max-width:1199px ){
  .navbar-default .navbar-nav > li > a {padding: 18px 6px;font-size: 13px;}
  .navbar-brand {font-size: 20px;width: 258px;}
  .doctors-nav figcaption h2 {font-size: 14px;}
  .doctors-nav figcaption p {font-size: 14px;padding: 0 12px;}
  .nav-tabs > li > a {padding: 10px 10px;}
}


@media(max-width:991px ){	
  .navbar-header {float: none;text-align: center;}
  .navbar-brand {display: inline-block;float: none;font-size: 25px;width: 290px;}
  .sl-slider h2 {font-size: 36px;line-height: 40px;}
  .sl-slider p {font-size: 25px;}
  .sl-slider-wrapper {height: 500px;}
  .whyChoose-left {width: 350px;}
  .whyChoose-right .media-heading {font-size: 18px;line-height: 1em;}
  .whyChoose-right .media-body > p {font-size: 14px;}
  #counterSection {height: auto;background-size: 100% 100%;}
  .counter-box {margin-bottom: 35px;width: 95%;}
  .doctors-nav .slick-prev {left: 20px;}
  .doctors-nav .slick-next {right: -13px;}
  .single-blog-left {width: 25%;}
  .single-blog-right {width: 70%;}
  .blog-author > ul > li {font-size: 12px;}
  .blogArchive-area .single-blog-right {width: 72%;}
  #blogArchive {margin-top: 157px;}
  .social-share h3 {text-align: center;width: 100%;}
  .social-share ul {width: 100%;margin-top: 15px;text-align: center;}
  .nav-tabs {width: 100%;}
  .how-works-area {margin-top: 30px;}
  .nav-tabs > li > a {font-size: 18px;padding: 10px 20px;}
  .button--itzel {width: 190px;} 
  #header .navbar-right {float: none !important;display: inline-block;} 
  .navbar-collapse.collapse {text-align: center;}
  #respond input[type="text"], #respond input[type="email"], #respond input[type="url"] {width: 80%;} 
  .slider-text h2 {font-size: 45px;line-height: 50px;}
  .slider-text p {font-size: 25px;}

}


@media(max-width:767px ){
.navbar-default .navbar-toggle {border-color: #fff;margin-top: 12px;}
.navbar-default .navbar-toggle .icon-bar {background-color: #fff;}
.navbar-default .navbar-toggle:hover,.navbar-default .navbar-toggle:focus{background-color: transparent;}
.navbar-default .navbar-brand {margin-bottom: 10px;margin-top: 0;}
#sliderArea {margin-top: 70px;}
.navbar-right .dropdown-menu::before {display: none;}
.whychoose-singleslide img {width: 100%;}
.whyChoose-left {width: 100%;}
.whyChoose-right {margin-top: 50px;}
.counter-box {margin-bottom: 40px;width: 100%;}
.counter-box::after {width: 103%;}
.single-blog-left {width: 20%;}
.single-blog-right {width: 75%;}
.single-Blog {margin-bottom: 30px;}
.single-footer-widget {margin-bottom: 30px;}
.footer-copyright {text-align: center;}
.footer-social {margin-top: 20px;text-align: center;}
#blogArchive {margin-top: 81px;}
.blog-pagination {margin-bottom: 30px;text-align: center;}
.sidebar-widget {margin-bottom: 35px;}
.blogArchive-area .single-blog-right {width: 75%;}
.similar-post .media{margin-bottom: 15px;}
.nav-tabs > li > a {font-size: 15px;padding: 10px 15px;}
.contact-address {margin-top: 40px;}
.navbar-collapse.collapse {text-align:left;}
.top-slide-inner {height: 400px;}
.slider-text {padding: 10px 5px;top: 10%;}
.slider-text h2 {font-size: 35px;line-height: 40px;}
.slider-text p {font-size: 20px;}
}

@media(max-width:480px ){	
.sl-slider h2 {font-size: 22px;line-height: 25px;}
.sl-slider p {font-size: 16px;}
.readmore_area a {font-size: 1em;}
.counter-box::after {width: 104%;}
.postnav-left h4, .postnav-right h4 {font-size: 14px;}
.nav-tabs > li > a {font-size: 12px;padding: 10px;} 
.slider-text h2 {font-size: 30px;line-height: 34px;}
.slider-text p {font-size: 18px;}
}


@media(max-width:360px ){
.navbar-brand {float: left;font-size: 20px;width: 250px;}
.navbar-default .navbar-brand {margin-bottom: 10px;margin-top: 5px;}
.navbar-brand > i {font-size: 25px;}
.slider-text {width: 90%;}
.sl-slider-wrapper {height: 420px;}
.counter-box::after {width: 107%;}
.blog-breadcrumbs-left {text-align: center;width: 100%;}
.blog-breadcrumbs-right {width: 100%;}
.blog-pagination .pagination > li > a, .blog-pagination .pagination > li > span {
 font-size: 15px;
 padding: 5px 12px;
}
.blog-breadcrumbs-right .breadcrumb {padding: 8px;}
.blog-details h2 {font-size: 20px;line-height: 30px;margin-bottom: 10px;margin-top: 10px;}
.blog-details blockquote {font-size: 16px;}
.social-share ul li > a {font-size: 14px;height: 25px;line-height: 26px;width: 25px;}
.social-share h3 {font-size: 20px;}
.nav-tabs > li > a {font-size: 10px;padding: 3px;}
.custom-panel .panel-heading a {font-size: 16px;}
#myModal .modal-title {font-size: 25px;}
.post-author .news-img {margin-right: 0px;width: 45px;height: 45px;}
.author-name {font-size: 13px;margin-bottom: 5px;display: block;}
.post-author p {font-size: 12px;line-height: 18px;}
.commentlist .news-img {height: 45px;width: 45px;}
.children {margin-left: 15px;}
.commentlist .media-body p {font-size: 12px;}
.error-page-area h1 {font-size: 150px;}
.error-page-area h3 {font-size: 50px;margin-bottom: 70px;}
.error-page-area h5 {font-size: 25px;}
.slider-text h2 {font-size: 25px;line-height: 30px;}
.slider-text p {font-size: 16px;}
}


@media(max-width:320px ){
.navbar-brand {width: 240px;}	
.blog-breadcrumbs-right .breadcrumb > li a {font-size: 12px;}	
.blog-breadcrumbs-right .breadcrumb > .active {font-size: 12px;}
.custom-panel .panel-heading a {font-size: 14px;}
#myModal .modal-title {font-size: 22px;}
#respond input[type="text"], #respond input[type="email"], #respond input[type="url"] {
  width: 100%;
}

	
}

</style>