<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php">Q&A</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/pages/questions.php">Questions </a></li>
        <li><a href="/pages/tags.php">Tags</a></li>
        <li><a href="/pages/users.php">Users</a></li>
        <li><a href="/pages/ask.php">Ask a Question</a></li>
        <li><a href="/pages/words.php">WordCloud</a></li>
        <li><a data-toggle="modal" data-target=".firstModal">Help?</a></li>
      </ul>



      <?php
      if (empty($_SESSION['name'])){
    echo  '<ul class="nav navbar-nav navbar-right">
        <li><a href="/pages/login.php"><i class="fa fa-user" aria-hidden="true"></i>
 Login</a></li>
      </ul>';
    }
    else {
      echo '<ul class="nav navbar-nav navbar-right">
          <li><a href="/pages/profile.php"><span class="glyphicon glyphicon-user"></span> '.stripslashes($_SESSION['name']).'</a></li>
             <li><a href="/pages/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
           </ul>';
          // if ($_SESSION ['userid'] == $userid){
            // echo  '<div  class="ratio img-responsive img-circle" style="background-image: url("http://localhost:8888/img/uploads/"'.$filename.');"></div>'.stripslashes($_SESSION['name']).'</a></li>
            //   <li><a href="/pages/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            // </ul>';
          // }else {
        // echo  '<span class="glyphicon glyphicon-user"></span> '.stripslashes($_SESSION['name']).'</a></li>
        //   <li><a href="/pages/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        // </ul>';
      // }
    }
    ?>

    <div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" action="/pages/search.php" method="post">
					<input class="morphsearch-input" type="search" name="searchall" id="searchall" onKeyUp="showHint(this.value)" placeholder="Search..."/>
					<button class="morphsearch-submit" type="submit" id="search_submit">Search</button>
				</form>
				<div class="morphsearch-content" id="search-content" name="search-content">

				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			<div class="overlay"></div>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>

<div class="modal fade firstModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><!--This class matches the button target-->
 <div class="modal-dialog modal-lg"><!--This will also affect your modal size, look into it-->
   <div class="modal-content">
     <div id="carousel-controls" class="carousel slide" data-ride="carousel"><!--This calls the controls for the carousel, note the id-->
       <!-- Wrapper for slides -->
         <div class="carousel-inner">
           <div class="item active">
             <img class="img-responsive" src="/img/1.png" alt="...">
           </div>
           <div class="item">
             <img class="img-responsive" src="/img/2.png" alt="...">

           </div>
           <div class="item">
             <img class="img-responsive" src="/img/3.png" alt="...">

           </div>
           <div class="item">
            <img class="img-responsive" src="/img/4.png" alt="...">

          </div>
          <div class="item">
            <img class="img-responsive" src="/img/5.png" alt="...">

          </div>
          <div class="item">
            <img class="img-responsive" src="/img/6.png" alt="...">

          </div>
          <div class="item">
            <img class="img-responsive" src="/img/7.png" alt="...">

          </div>
          <div class="item">
            <img class="img-responsive" src="/img/8.png" alt="...">

          </div>

         </div>
         <!-- Controls -->
         <a class="left carousel-control" href="#carousel-controls" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#carousel-controls" role="button" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
     </div>
   </div>
 </div>
</div>
