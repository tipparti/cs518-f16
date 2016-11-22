<script type="text/javascript">
$(function(){
$(".input-group-btn .dropdown-menu li a").click(function(){
var selText = $(this).html();
//working version - for single button //
//$('.btn:first-child').html(selText+'<span class="caret"></span>');
//working version - for multiple buttons //
$(this).parents('.input-group-btn');
});
});
</script>
<nav class="navbar navbar-default">
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
        <li><a href="/pages/questions.php">Questions <!--span class="sr-only">(current)</span--></a></li>
        <!-- <li><a href="/pages/tags.php">Tags</a></li> -->
        <!-- <li><a href="/pages/users.php">Users</a></li> -->
        <li><a href="/pages/ask.php">Ask a Question</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <div class="input-group">
              <div class="input-group-btn search-panel">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept"><i class="fa fa-database" aria-hidden="true"></i>
</span> <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><button type="button" class="btn btn-default" data-toggle="dropdown">
                      <span id="search_concept"><i class="fa fa-users" aria-hidden="true"></i>
  </span></button></li>
                  </ul>
              </div>
              <input type="hidden" name="search_param" value="all" id="search_param">
              <input type="text" class="form-control" name="x" placeholder="Search Q&amp;A">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
              </span>
              <!-- <input type="hidden" name="search_param" value="all" id="search_param">
              <input type="text" class="form-control" name="x" placeholder="Search Q&amp;A">

                   <div class="input-group-btn">
                       <button type="button" class="btn btn-search btn-success">
                           <span class="glyphicon glyphicon-search"></span>
                       </button>
                       <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                           <span class="caret"></span>
                       </button>
                       <ul class="dropdown-menu pull-right" role="menu">
                         <li>
                               <a href="#">
                                   <span class="glyphicon glyphicon-user"></span>
                               </a>
                           </li>
                       </ul>
                   </div> -->

          </div>
        </div>
      </form>

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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
