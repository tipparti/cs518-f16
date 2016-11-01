<?php
session_start();
include "connectdb.php";?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head
         content must come *after* these tags -->

        <title>Question & Answer</title>



        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap-social.css" rel="stylesheet">
        <link href="css/mystyles.css" rel="stylesheet">
        <link rel="stylesheet" href="lib/jquery.upvote.css">



    </head>

    <body>

        <header class="jumbotron">



            <div class="container">
                <div class="row row-header">
                    <div class="col-xs-12 col-sm-12 col-sm-push-2">

                        <h1>Question & Answer</h1>

                    </div>



                </div>
            </div>
        </header>


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span> Home</a></li>
                        <?php
                         	if(!empty($_SESSION['uid'])){
                            echo '<li><a href="post_question.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ask a Question</a></li>';
                       echo '<li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> '.$_SESSION['uname'].'</a></li>';
                     echo '<ul class="nav navbar-nav navbar-right"><li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li></ul>';

                   } else{
                     echo '<li>
                         <a data-toggle="modal" data-target="#loginModal">
                             <span class="glyphicon glyphicon-log-in"></span> Login</a>
                     </li>
                     <li>
                         <a data-toggle="modal" data-target="#signupModal">
                             <span class="glyphicon glyphicon-log-in"></span> Register</a>
                     </li>';

                   }
                    ?>



                    </ul>

                </div>
            </div>
        </nav>


        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login </h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-inline" action="login.php" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="username">Username</label>
                                <input type="text" class="form-control input-sm" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="Password" class="form-control input-sm" name="password" id="password" placeholder="Password">
                            </div>
                            <?php
                    		if(isset($pwdfail)){
                    		?>
                                <label class="error">
                                    <?php echo "Error: " . $sql . "<br>" . mysqli_error($conn); ?>></label>
                                <?php
                    		}
                    		?>
                                    <button type="submit" class="btn btn-info btn-sm">Sign in</button>
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div id="signupModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register </h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-inline" action="register.php" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="username">Username</label>
                                <input type="text" class="form-control input-sm" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="Password" class="form-control input-sm" name="password" id="password" placeholder="Password">
                            </div>
                            <?php
                      if(isset($pwdfail)){
                      ?>
                                <label class="error">
                                    <?php echo "Error: " . $sql . "<br>" . mysqli_error($conn); ?>></label>
                                <?php
                      }
                      ?>
                                    <button type="submit" class="btn btn-info btn-sm">Register</button>
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>