<?php
include ("header.php");
include ("navbar.php");
include '../app/time.php';

include_once ($_SERVER['DOCUMENT_ROOT']."/db/db.php");
include $_SERVER['DOCUMENT_ROOT'].'/app/time.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$bbcode = new BBCode;

$connection = new Db();
$display = $connection -> select("SELECT * FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `type`='Q';");
$rows = (int)count($display);
$page_rows = 10;
$last = ceil($rows/$page_rows);

if($last < 1){
	$last = 1;
}

$pagenum = 1;

if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
    $pagenum = 1;
} else if ($pagenum > $last) {
    $pagenum = $last;
}
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql = $connection -> select("SELECT * FROM `qa_posts` ORDER BY `postid` DESC $limit");

$paginationCtrls = '';
if($last != 1){
  if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">«</a></span></li>';

        for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></span></li>';
			}
	    }
    }
    $paginationCtrls .= '<li class="active"><span>'.$pagenum.'</span></li>';
    for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li><span><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> </span></li>';
		if($i >= $pagenum+4){
			break;
		}
	}
  if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" rel="next">»</a></span></li> ';
    }
}
?>
<div class="container">

<!-------->
<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">Recent</a></li>
        <li><a href="#votes" data-toggle="tab">Most votes</a></li>
        <li><a href="#answered" data-toggle="tab">Most answered</a></li>
        <!-- <li><a href="#views" data-toggle="tab">Most views</a></li> -->
    </ul>
    <?php
      $hr;
      $red = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `qa_posts`.`postid`, `qa_posts`.`acount`, `qa_users`.`handle`, `netvotes`,`avatarblobid` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `type`='Q' ORDER BY `qa_posts`.`created` DESC $limit ;");
			$blue = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `qa_posts`.`postid`, `qa_posts`.`acount`, `qa_users`.`handle`, `netvotes`, `avatarblobid` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `type`='Q' ORDER BY `qa_posts`.`netvotes` DESC $limit ;");
			$yellow = $connection -> select("SELECT `title`,`content`,`qa_posts`.`created`, `qa_posts`.`postid`, `qa_posts`.`acount`, `qa_users`.`handle`, `netvotes`,`avatarblobid` FROM `qa_posts` LEFT JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid`  WHERE `type`='Q' ORDER BY `qa_posts`.`acount` DESC $limit ;");
			$hrred = (int)count($red);
			$hrblue = (int)count($blue);
			$hryellow = (int)count($yellow);

    ?>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                      <?php
										    if (count($red) != 0){
                       foreach ($red as $key => $value) {
												 $profile = $connection -> select("SELECT `filename`, `qa_users`.`handle` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_blobs`.blobid=".$value['avatarblobid'].";");
												 if(count($profile) == 1){
												 foreach ($profile as $key => $val){
 												 	$pic = $val['filename'];
													$na = $val['handle'];
													}
											 }else{
													 $pic = "58324d75bb23f.jpg";
												 }

												 ?>

                        <div class="row">
                          <div class="col-xs-2 col-md-1">
                              <div class="text-center fa-2x"><?php  echo $value['netvotes']; ?>
                              </div>
                              <div class="text-center">Votes</div>
                              <div class="text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><!--i class="fa fa-thumbs-o-down" aria-hidden="true"></i--></div>
                            </div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
                                        </a>
                                    <div class="mic-info form-inline">
                                        asked <?php echo time_elapsed_string($value['created']); echo " by  <a href='/pages/users.php?handle=".$na."'><img src='/img/uploads/".$pic."' class='img-responsive img-circle' style='width:24px;height:24px;' />".$value['handle']."</a>"; ?>
                                    </div>
                                </div>
                                <!-- <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                        <?php
                          if($hrred != 1){
                            echo '<hr>';
                          $hrred--;
                        }
                      }
										}
                        ?>
                    </li>
                </ul>


            </div>
						<div class="text-center"><ul class="pagination pagination-large">

						<?php echo $paginationCtrls; ?>
						</ul>
						</div>
						<h6>
															Total Posts <span class="label label-info"><?php echo $rows; ?></span></h6>
        </div>

        <div class="tab-pane" id="votes">
					<div class="panel-body">
							<ul class="list-group">
									<li class="list-group-item">
										<?php
											if(count($blue) != 0){
										 foreach ($blue as $key => $value) {
											$profile = $connection -> select("SELECT `filename`, `qa_users`.`handle` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_blobs`.blobid=".$value['avatarblobid'].";");
										 if(count($profile) == 1){
										 foreach ($profile as $key => $val){
											$pic = $val['filename'];
											$na = $val['handle'];
											}
									 }else{
											 $pic = "58324d75bb23f.jpg";
										 }
?>

											<div class="row">
												<div class="col-xs-2 col-md-1">
														<div class="text-center fa-2x"><?php  echo $value['netvotes']; ?>
														</div>
														<div class="text-center">Votes</div>
														<div class="text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><!--i class="fa fa-thumbs-o-down" aria-hidden="true"></i--></div>
													</div>
													<div class="col-xs-10 col-md-11">
															<div>
																	<a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
																			</a>
																	<div class="mic-info">
																		asked <?php echo time_elapsed_string($value['created']); echo " by  <a href='/pages/users.php?handle=".$na."'><img src='/img/uploads/".$pic."' class='img-responsive img-circle' style='width:24px;height:24px;' />".$value['handle']."</a>"; ?>
																	</div>
															</div>
															<!-- <div class="action">
																	<button type="button" class="btn btn-primary btn-xs" title="Edit">
																			<span class="glyphicon glyphicon-pencil"></span>
																	</button>
																	<button type="button" class="btn btn-success btn-xs" title="Approved">
																			<span class="glyphicon glyphicon-ok"></span>
																	</button>
																	<button type="button" class="btn btn-danger btn-xs" title="Delete">
																			<span class="glyphicon glyphicon-trash"></span>
																	</button>
															</div> -->
													</div>
											</div>
											<?php
												if($hrblue != 1){
													echo '<hr>';
												$hrblue--;
											}
										}
									}
											?>
									</li>
							</ul>


					</div>
					<div class="text-center"><ul class="pagination pagination-large">
					<?php echo $paginationCtrls; ?>
					</ul>
					</div>
					<h6>
														Total Posts <span class="label label-info"><?php echo $rows; ?></span></h6>
        </div>
        <div class="tab-pane" id="answered">
					<div class="panel-body">
							<ul class="list-group">
									<li class="list-group-item">
										<?php
											if(count($yellow) != 0){
										 foreach ($yellow as $key => $value) {
											 $profile = $connection -> select("SELECT `filename`, `qa_users`.`handle` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_blobs`.blobid=".$value['avatarblobid'].";");
										 if(count($profile) == 1){
										 foreach ($profile as $key => $val){
											$pic = $val['filename'];
											$na = $val['handle'];
											}
									 }else{
											 $pic = "58324d75bb23f.jpg";
										 }
?>

											<div class="row">
												<div class="col-xs-2 col-md-1">
														<div class="text-center fa-2x"><?php  echo $value['netvotes']; ?>
														</div>
														<div class="text-center">Votes</div>
														<div class="text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><!--!i class="fa fa-thumbs-o-down" aria-hidden="true"></i--></div>
													</div>
													<div class="col-xs-10 col-md-11">
															<div>
																	<a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
																			</a>
																	<div class="mic-info">
																		asked <?php echo time_elapsed_string($value['created']); echo " by  <a href='/pages/users.php?handle=".$na."'><img src='/img/uploads/".$pic."' class='img-responsive img-circle' style='width:24px;height:24px;' />".$value['handle']."</a>"; ?>
																	</div>
															</div>
															<!-- <div class="action">
																	<button type="button" class="btn btn-primary btn-xs" title="Edit">
																			<span class="glyphicon glyphicon-pencil"></span>
																	</button>
																	<button type="button" class="btn btn-success btn-xs" title="Approved">
																			<span class="glyphicon glyphicon-ok"></span>
																	</button>
																	<button type="button" class="btn btn-danger btn-xs" title="Delete">
																			<span class="glyphicon glyphicon-trash"></span>
																	</button>
															</div> -->
													</div>
											</div>
											<?php
												if($hryellow != 1){
													echo '<hr>';
												$hryellow--;
											}
										}
									}
											?>
									</li>
							</ul>


					</div>
					<div class="text-center"><ul class="pagination pagination-large">
					<?php echo $paginationCtrls; ?>
					</ul>
					</div>
					<h6>
														Total Posts <span class="label label-info"><?php echo $rows; ?></span></h6>
			</div>
        <div class="tab-pane" id="views">
            <h1>Green</h1>
            <p>green green green green green</p>
        </div>
    </div>
</div>
<?php

include("footer.php");
?>
