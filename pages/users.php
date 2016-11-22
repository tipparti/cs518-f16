<?php
session_start();
include ("header.php");
include ("navbar.php");
include_once '../db/db.php';
include '../app/time.php';

date_default_timezone_set('America/New_York');


$config["upload_url"] = 'img/uploads/';


$connection = new Db();
$handle = $connection -> quote($_GET['handle']);

$sql = $connection -> select("SELECT `avatarblobid`,`filename`,`qa_users`.`created`,`qa_users`.`handle` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_users`.`handle`=".$handle.";");
$created;
$points = $connection -> select("SELECT * FROM `qa_userpoints` INNER JOIN `qa_users` ON `qa_users`.`userid` = `qa_userpoints`.`userid` WHERE `handle`=".$handle." ORDER BY `points` DESC;");
$totalpoints;
$qposts;
$aposts;
$qvoteds;
$avoteds;
$upvoteds;
$downvoteds;
foreach ($points as $key => $value) {
  $totalpoints = $value['points'];
  $qposts = $value['qposts'];
  $aposts = $value['aposts'];
  $qvoteds = $value['qvoteds'];
  $avoteds = $value['avoteds'];
  $upvoteds = $value['upvoteds'];
  $downvoteds = $value['downvoteds'];
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="alert alert-danger fade in hidden" id="error">

      </div>
    </div>
  </div>
    <div class="row clearfix well">
		<div class="col-md-2 column">
      <?php
      $created;
      foreach ($sql as $key => $value) {
        $created = $value['created'];
        echo '<img src="'.$config["upload_url"].$value['filename'].'" class="img-thumbnail" title="'.$value['filename'].'" />';

      }
       header("Location: /pages/profile.php");
    ?>

        <div id="output"><!-- error or success results --></div>
		</div>
		<div class="col-md-5">
			<blockquote>
				<p>
<?php echo $_GET['handle']; ?>
            </p> <small>Score: 	<?php echo $totalpoints; ?> points (ranked #3)</small>
			</blockquote>
		</div>
	</div>


	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="tabbable" id="tabs-444468">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-200304" data-toggle="tab">About</a>

					</li>
					<li>
						<a href="#panel-567647" data-toggle="tab">Recent Activity</a>
					</li>
          <li>
						<a href="#panel-567649" data-toggle="tab">All Questions</a>
					</li>
          <li>
						<a href="#panel-5676450" data-toggle="tab">All Answers</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-200304">
            <br/>
						 <div class="row">
                			<div class="col-md-12 column">
                        <div class="col-md-6">
                          <div class="panel panel-info">
                            <div class="panel-heading">User Information</div>
                            <div class="panel-body"><div class="col-md-3">
                              Member for:
                            </div>
                            <div class="col-md-6">
                              <strong><?php
                              $dt = new DateTime($created);
                               $dt->format('F d');
                              //  var_dump($dt);
                              echo time_elapsed_string($created)." ( since ".$dt->format('F d')." )"; ?> </strong>
                            </div></div>
                            <div class="panel-body"><div class="col-md-3">
                              Type:
                            </div><div class="col-md-6">
                              <?php
                              $retVal = ($_GET['handle'] == 'admin') ? "Super Administartor" : "Registered user" ;
                              echo $retVal;
                              ?>
                            </div>
                          </div><?php if ($_GET['handle'] == 'admin') { ?>
                            <div class="panel-body"><div class="col-md-3">
                              Extra privileges:
                            </div><div class="col-md-6">
                              Editing any question<br />
Editing any answer<br />
Editing posts silently<br />
Closing any question<br />
Selecting answer for any question<br />
Viewing who voted or flagged posts<br />
Approving or rejecting posts<br />
Hiding or showing any post<br />
Deleting hidden posts<br />

                            </div>
                          </div><?php  } ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="panel panel-info">
                               <div class="panel-heading">Activity <strong><?php echo $_GET['handle'];?></strong></div>
                               <div class="panel-body"><div class="col-md-3">
                                 Score:
                               </div>
                               <div class="col-md-6">
                                 <strong><?php echo $totalpoints; ?>  </strong>
                               </div>
                             </div>
                             <div class="panel-body"><div class="col-md-3">
                               Questions:
                             </div>
                             <div class="col-md-6">
                               <strong><?php echo $qposts; ?>  </strong>
                             </div>
                           </div>
                           <div class="panel-body"><div class="col-md-3">
                             Answers:
                           </div>
                           <div class="col-md-6">
                             <strong><?php echo $aposts; ?> </strong>
                           </div>
                         </div>

                         <div class="panel-body"><div class="col-md-3">
                            Voted on:
                         </div>
                         <div class="col-md-6">
                           <strong><?php echo $qvoteds; ?> </strong> question, <strong> <?php echo $avoteds; ?></strong> answers
                         </div>
                       </div>
                       <div class="panel-body"><div class="col-md-3">
                         Gave out:
                       </div>
                       <div class="col-md-6">
                         <strong><?php echo $upvoteds; ?> </strong> up votes, <strong> <?php echo $downvoteds; ?></strong> down votes
                       </div>
                     </div>



                             </div>
                        </div>
            				</div>
            			</div>
					</div>
          <div class="tab-pane" id="panel-567647">
            <div class="row">
              <div class="panel-body">
                      <table class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>All Posts</th>
                                    <th>Votes</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $all = $connection -> select("SELECT *,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `qa_users`.`handle`='".$_GET['handle']."' ORDER BY `qa_posts`.`created` DESC;");
                                   foreach ($all as $key => $value) {?>
                                     <tr>
                                       <td><a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
                                                   </a></td>
                                                   <td><?php echo $value['netvotes']; ?></td>
                                                 </tr>
                                    <?php }
                                    ?>
                                </tbody>
                              </table>

		</div>
	</div>
					</div>
          <div class="tab-pane" id="panel-567649">
            <div class="row">
              <div class="panel-body">
                      <table class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>All Posts</th>
                                    <th>Votes</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $all = $connection -> select("SELECT * ,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `qa_users`.`handle`='".$_GET['handle']."' AND `type`= 'Q' ORDER BY `qa_posts`.`created` DESC;");
                                   foreach ($all as $key => $value) {?>
                                     <tr>
                                       <td><a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
                                                   </a></td>
                                                   <td><?php echo $value['netvotes'];  ?></td>
                                                 </tr>
                                    <?php }
                                    ?>
                                </tbody>
                              </table>

    </div>
  </div>
          </div>
          <div class="tab-pane" id="panel-567650">
            <div class="row">
              <div class="panel-body">
                      <table class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>All Posts</th>
                                    <th>Votes</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $all = $connection -> select("SELECT *,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `type`='A' AND `qa_users`.`handle`='".$_GET['handle']."' ORDER BY `qa_posts`.`created` DESC;");
                                   foreach ($all as $key => $value) {?>
                                     <tr>
                                       <td><a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['content'])); ?>
                                                   </a></td>
                                                   <td><?php echo $value['netvotes'];  ?></td>
                                                 </tr>
                                    <?php }
                                    ?>
                                </tbody>
                              </table>

    </div>
  </div>
          </div>

  </div>
</div>
        </div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
include 'footer.php';
 ?>
