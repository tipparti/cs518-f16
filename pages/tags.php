<?php
include ("header.php");
include ("navbar.php");
include_once 'db/db.php';

?>

<div class="container">
      <div class="row">
        <ul class="nav nav-pills nav-stacked tag-list">
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/user-interface" style="background-color: #2C3E50; color:#FFF;">
  				  	<span class="badge pull-right">204</span>
  				  	user interface
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/forms" style="background-color: #2C3F51; color:#FFF;">
  				  	<span class="badge pull-right">135</span>
  				  	forms
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/lists" style="background-color: #2C4053; color:#FFF;">
  				  	<span class="badge pull-right">119</span>
  				  	lists
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/layouts" style="background-color: #2C4155; color:#FFF;">
  				  	<span class="badge pull-right">83</span>
  				  	layouts
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/buttons" style="background-color: #2C4357; color:#FFF;">
  				  	<span class="badge pull-right">81</span>
  				  	buttons
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/menu" style="background-color: #2C4459; color:#FFF;">
  				  	<span class="badge pull-right">62</span>
  				  	menu
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/user" style="background-color: #2C455B; color:#FFF;">
  				  	<span class="badge pull-right">61</span>
  				  	user
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/responsive" style="background-color: #2C465D; color:#FFF;">
  				  	<span class="badge pull-right">59</span>
  				  	responsive
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/login" style="background-color: #2C485F; color:#FFF;">
  				  	<span class="badge pull-right">58</span>
  				  	login
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/animation" style="background-color: #2D4961; color:#FFF;">
  				  	<span class="badge pull-right">57</span>
  				  	animation
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/jquery" style="background-color: #2D4A63; color:#FFF;">
  				  	<span class="badge pull-right">46</span>
  				  	jquery
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/shop" style="background-color: #2D4B65; color:#FFF;">
  				  	<span class="badge pull-right">40</span>
  				  	shop
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/panel" style="background-color: #2D4D67; color:#FFF;">
  				  	<span class="badge pull-right">39</span>
  				  	panel
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/table" style="background-color: #2D4E69; color:#FFF;">
  				  	<span class="badge pull-right">39</span>
  				  	table
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/images" style="background-color: #2D4F6B; color:#FFF;">
  				  	<span class="badge pull-right">37</span>
  				  	images
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/carousel" style="background-color: #2D516D; color:#FFF;">
  				  	<span class="badge pull-right">36</span>
  				  	carousel
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/navbar" style="background-color: #2D526F; color:#FFF;">
  				  	<span class="badge pull-right">36</span>
  				  	navbar
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/navigation" style="background-color: #2D5371; color:#FFF;">
  				  	<span class="badge pull-right">35</span>
  				  	navigation
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/modal" style="background-color: #2E5473; color:#FFF;">
  				  	<span class="badge pull-right">31</span>
  				  	modal
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/profile" style="background-color: #2E5675; color:#FFF;">
  				  	<span class="badge pull-right">31</span>
  				  	profile
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/admin" style="background-color: #2E5777; color:#FFF;">
  				  	<span class="badge pull-right">29</span>
  				  	admin
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/blog" style="background-color: #2E5879; color:#FFF;">
  				  	<span class="badge pull-right">27</span>
  				  	blog
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/search" style="background-color: #2E597B; color:#FFF;">
  				  	<span class="badge pull-right">23</span>
  				  	search
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/ecommerce" style="background-color: #2E5B7D; color:#FFF;">
  				  	<span class="badge pull-right">20</span>
  				  	ecommerce
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/social" style="background-color: #2E5C7E; color:#FFF;">
  				  	<span class="badge pull-right">20</span>
  				  	social
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/tabs" style="background-color: #2E5D80; color:#FFF;">
  				  	<span class="badge pull-right">20</span>
  				  	tabs
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/cms" style="background-color: #2E5E82; color:#FFF;">
  				  	<span class="badge pull-right">18</span>
  				  	cms
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/alert" style="background-color: #2F6084; color:#FFF;">
  				  	<span class="badge pull-right">16</span>
  				  	alert
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/sidebar" style="background-color: #2F6186; color:#FFF;">
  				  	<span class="badge pull-right">16</span>
  				  	sidebar
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/gallery" style="background-color: #2F6288; color:#FFF;">
  				  	<span class="badge pull-right">15</span>
  				  	gallery
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/icon_fonts" style="background-color: #2F648A; color:#FFF;">
  				  	<span class="badge pull-right">14</span>
  				  	icon fonts
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/progress-bar" style="background-color: #2F658C; color:#FFF;">
  				  	<span class="badge pull-right">13</span>
  				  	progress bar
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/thumbnails" style="background-color: #2F668E; color:#FFF;">
  				  	<span class="badge pull-right">12</span>
  				  	thumbnails
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/signup" style="background-color: #2F6790; color:#FFF;">
  				  	<span class="badge pull-right">12</span>
  				  	signup
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/contact" style="background-color: #2F6992; color:#FFF;">
  				  	<span class="badge pull-right">11</span>
  				  	contact
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/admin-dashboard" style="background-color: #2F6A94; color:#FFF;">
  				  	<span class="badge pull-right">11</span>
  				  	admin dashboard
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/admin-interface" style="background-color: #306B96; color:#FFF;">
  				  	<span class="badge pull-right">11</span>
  				  	admin interface
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/footer" style="background-color: #306C98; color:#FFF;">
  				  	<span class="badge pull-right">10</span>
  				  	footer
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/popup" style="background-color: #306E9A; color:#FFF;">
  				  	<span class="badge pull-right">10</span>
  				  	popup
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/controls" style="background-color: #306F9C; color:#FFF;">
  				  	<span class="badge pull-right">10</span>
  				  	controls
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/checkbox" style="background-color: #30709E; color:#FFF;">
  				  	<span class="badge pull-right">10</span>
  				  	checkbox
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/registration" style="background-color: #3071A0; color:#FFF;">
  				  	<span class="badge pull-right">9</span>
  				  	registration
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/toolbar" style="background-color: #3073A2; color:#FFF;">
  				  	<span class="badge pull-right">8</span>
  				  	toolbar
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/radio" style="background-color: #3074A4; color:#FFF;">
  				  	<span class="badge pull-right">7</span>
  				  	radio
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/messages" style="background-color: #3075A6; color:#FFF;">
  				  	<span class="badge pull-right">7</span>
  				  	messages
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/material_design" style="background-color: #3177A8; color:#FFF;">
  				  	<span class="badge pull-right">7</span>
  				  	material design
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/hover" style="background-color: #3178AA; color:#FFF;">
  				  	<span class="badge pull-right">7</span>
  				  	hover
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/payment" style="background-color: #3179AC; color:#FFF;">
  				  	<span class="badge pull-right">7</span>
  				  	payment
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/badges" style="background-color: #317AAD; color:#FFF;">
  				  	<span class="badge pull-right">6</span>
  				  	badges
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/calendar" style="background-color: #317CAF; color:#FFF;">
  				  	<span class="badge pull-right">5</span>
  				  	calendar
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/header" style="background-color: #317DB1; color:#FFF;">
  				  	<span class="badge pull-right">5</span>
  				  	header
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/card" style="background-color: #317EB3; color:#FFF;">
  				  	<span class="badge pull-right">5</span>
  				  	card
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/checkout" style="background-color: #317FB5; color:#FFF;">
  				  	<span class="badge pull-right">4</span>
  				  	checkout
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/containers" style="background-color: #3181B7; color:#FFF;">
  				  	<span class="badge pull-right">4</span>
  				  	containers
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/status" style="background-color: #3282B9; color:#FFF;">
  				  	<span class="badge pull-right">4</span>
  				  	status
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/timeline" style="background-color: #3283BB; color:#FFF;">
  				  	<span class="badge pull-right">4</span>
  				  	timeline
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/chat" style="background-color: #3284BD; color:#FFF;">
  				  	<span class="badge pull-right">3</span>
  				  	chat
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/rating" style="background-color: #3286BF; color:#FFF;">
  				  	<span class="badge pull-right">2</span>
  				  	rating
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/ajax" style="background-color: #3287C1; color:#FFF;">
  				  	<span class="badge pull-right">2</span>
  				  	ajax
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/select" style="background-color: #3288C3; color:#FFF;">
  				  	<span class="badge pull-right">1</span>
  				  	select
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/append" style="background-color: #328AC5; color:#FFF;">
  				  	<span class="badge pull-right">1</span>
  				  	append
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/tabbable" style="background-color: #328BC7; color:#FFF;">
  				  	<span class="badge pull-right">1</span>
  				  	tabbable
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/caption" style="background-color: #328CC9; color:#FFF;">
  				  	<span class="badge pull-right">1</span>
  				  	caption
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/maps" style="background-color: #338DCB; color:#FFF;">
  				  	<span class="badge pull-right">1</span>
  				  	maps
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/transactions" style="background-color: #338FCD; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	transactions
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/slider" style="background-color: #3390CF; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	slider
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/spinner" style="background-color: #3391D1; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	spinner
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/dropdown" style="background-color: #3392D3; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	dropdown
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/accordion" style="background-color: #3394D5; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	accordion
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/typography" style="background-color: #3395D7; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	typography
  					</a>
  				</li>
            				            				<li class="col-md-4">
  					<a href="http://bootsnipp.com/tags/breadcrumb" style="background-color: #3396D9; color:#FFF;">
  				  	<span class="badge pull-right">0</span>
  				  	breadcrumb
  					</a>
  				</li>
            				  			</ul>
    </div>
</div>

<?php include_once 'footer.php';?>
