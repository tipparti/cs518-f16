<?php
session_start();
include ("header.php");
include ("navbar.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/time.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/cloud.php';


date_default_timezone_set('America/New_York');


$config["upload_url"] = '/img/uploads/';

$connection = new Db();
$bbcode = new BBCode;
$cloud = new WordCloud();


$sql = $connection -> select("SELECT `avatarblobid`,`filename`,`qa_users`.`created`, `gravatar` FROM `qa_users` INNER JOIN `qa_blobs` ON `qa_users`.`avatarblobid` = `qa_blobs`.`blobid` WHERE `qa_users`.`userid`=".$_SESSION['userid'].";");
$created;

$points = $connection -> select("SELECT * FROM `qa_userpoints` WHERE `userid`=".$_SESSION['userid']." ORDER BY `points` DESC;");
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
		<div class="col-md-2 column" id="imagediv">
      <?php
      $created;
      $gravatar;
        foreach ($sql as $key => $value) {
          $created = $value['created'];
          $gravatar = $value['gravatar'];
          if ($gravatar == 0) {
            echo '<img src="'.$config["upload_url"].$value['filename'].'" class="img-thumbnail" title="'.$_SESSION['name'].'" />';
          } else {
            echo '<img src="'.$value['filename'].'" class="img-thumbnail" title="'.$_SESSION['name'].'" style="width:158px;height:158px;" />';
          }

        }




      //  header("Location: /pages/profile.php");
    ?>

        <div id="error"><!-- error or success results --></div>
		</div>
		<div class="col-md-5">
			<blockquote>
				<p>
<?php echo $_SESSION['name']; ?>
            </p> <small>Score: 	<?php echo $totalpoints; ?> points (ranked #3)</small>
			</blockquote>
      <form action="../app/process.php" method="post" enctype="multipart/form-data" id="upload_form">
          <div class="form-inline">
   <div class="form-group">
     <input type="file" name="__files[]" multiple>
   </div>
   <input type="submit" class="btn btn-sm btn-primary" name="__submit__" value="Upload files"/>
 </div>
      </form>
      <form action="gravatar.php" method="post" enctype="multipart/form-data" id="gravatar_form">
        <?php if ($gravatar == 0): ?>
          <input type="hidden" name="type" value="gravatar">
          <input type="submit" class="btn btn-sm btn-primary" name="__submit__"/ value="Gravatar">
          <!-- <img src="../img/Logo_Gravatar.png" alt="" style="height:20px;width:80px;"/> -->
        <?php else: ?>
          <input type="hidden" name="type" value="reset">
          <input type="submit" class="btn btn-sm btn-danger pull-right" name="__submit__" value="Reset"/>
        <?php endif; ?>
      </form>
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
						<a href="#panel-567648" data-toggle="tab">All Questions</a>
					</li>
          <li>
						<a href="#panel-567649" data-toggle="tab">All Answers</a>
					</li>
          <li>
						<a href="#starcloud" data-toggle="tab"><i class="fa fa-star-o" aria-hidden="true"></i> Star</a></a>
					</li>
          <?php
            if ($_SESSION['name'] == 'admin') {?>
              <li>
                <a href="#panel-567650" data-toggle="tab">Stats</a>
              </li>          <?php  }?>
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
                              $retVal = ($_SESSION['name'] == 'admin') ? "Super Administartor" : "Registered user" ;
                              echo $retVal;
                              ?>
                            </div>
                          </div><?php if ($_SESSION['name'] == 'admin') { ?>
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
                               <div class="panel-heading">Activity <strong><?php echo $_SESSION['name'];?></strong></div>
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
                                  <?php $all = $connection -> select("SELECT *,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `handle`='".$_SESSION['name']."' ORDER BY `qa_posts`.`created` DESC;");
                                   foreach ($all as $key => $value) {?>
                                     <tr>
                                       <td><a href="/pages/questions.php?qa=<?php
                                       if ($value['type'] == 'A') {
                                          echo $value['parentid'];
                                       }else {
                                       echo $value['postid'];}
                                       ?>"><?php

                                       if ($value['title'] == NULL) {
                                        echo html_entity_decode($bbcode->Parse($value['content']));
                                       }else{
                                       echo html_entity_decode($bbcode->Parse($value['title']));} ?>
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
          <div class="tab-pane" id="panel-567648">
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
                                  <?php $all = $connection -> select("SELECT * ,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `handle`='".$_SESSION['name']."' AND `type`= 'Q' ORDER BY `qa_posts`.`created` DESC;");
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
                                  <?php $all = $connection -> select("SELECT *,`qa_posts`.`created` as pdate FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `type`='A' AND `handle`='".$_SESSION['name']."' ORDER BY `qa_posts`.`created` DESC;");
                                   foreach ($all as $key => $value) {?>
                                     <tr>
                                       <td><a href="/pages/questions.php?qa=<?php echo $value['parentid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['content'])); ?>
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
          <div class="tab-pane wordcloud" id="starcloud">
              <?php
              $sql = $connection -> select("SELECT count(`userid`) AS count FROM `qa_users`;");
              $count;
              foreach ($sql as $key => $value) {
                $count = $value['count'];
              }

              $counts2 = [];
              $counts3 = [];
              $sql = $connection -> select("SELECT * FROM `qa_posts` WHERE `type` = 'Q' AND `userid`=".$_SESSION['userid'].";");
              foreach ($sql as $key => $value) {
                // $wrdcount = $cloud -> wordcount($value['content']);
                $counts2 = $cloud -> array_merge_recursive_numeric($cloud -> wordcount($value['content']));
              }
              $sql = $connection -> select("SELECT * FROM `qa_posts` WHERE `type` = 'A' AND `userid`=".$_SESSION['userid'].";");
              foreach ($sql as $key => $value) {
                // $wrdcount = $cloud -> wordcount($value['content']);
                $counts3 = $cloud -> array_merge_recursive_numeric($cloud -> wordcount($value['content']));
              }

              $result = array_merge($counts2, $counts3);
              $cld = $cloud -> cleanup_wordcounts($result);
              foreach ($result as $key => $value){ ?>
                <span data-weight="<?php echo $value;?>"><a href="/pages/word.php?word=<?php echo $key;?>"> <?php echo $key;?> </a> </span>
              <?php } ?>
					</div>
          <div class="tab-pane" id="panel-567650">
						                 <div class="row">
                               <div class="panel-body">
                                       <table class="table table-striped table-hover">
                                                 <thead>
                                                   <tr>
                                                     <th>Question</th>
                                                     <th>Posted By</th>
                                                     <th>Close</th>
                                                     <th>Delete</th>
                                                   </tr>
                                                 </thead>
                                                 <tbody>




                                     <?php $stats = $connection -> select("SELECT * FROM `qa_posts` INNER JOIN `qa_users` ON `qa_posts`.`userid` = `qa_users`.`userid` WHERE `type`='Q';");
                                      foreach ($stats as $key => $value) {?>
                                        <tr>
                                          <td><a href="/pages/questions.php?qa=<?php echo $value['postid']; ?>"><?php echo html_entity_decode($bbcode->Parse($value['title'])); ?>
                                                      </a></td>
                                                      <td>                            <a href="#"><?php echo $value['handle'];  ?></a>
</td>
                                                      <td>
                                                        <form class="" action="/app/stats.php" method="post">
                                                          <input type="hidden" name="id" id="id" value="<?php  echo $value['postid'];?>"/>
                                                          <input type="hidden" name="flagcount" id="flagcount" value="<?php  echo $value['flagcount'];?>"/>
                                                          <button type="submit" class=
                                                          <?php
                                                          $retVal = ($value['flagcount'] == 0) ?   '"btn btn-danger btn-xs"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>' : '"btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
' ;                                                       echo $retVal;
                                                          ?>
                                                          </button>
                                                        </form>
                                                      </td>
                                                    <td>
                                                      <form class="" action="/app/stats.php" method="post">
                                                        <input type="hidden" name="id" id="id" value="<?php  echo $value['postid'];?>"/>
                                                        <input type="hidden" name="flagcount" id="flagcount" value="2"/>
                                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                      </form>
                                                    </td>
</td>
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
<script type="text/javascript">
var config = {
       "size" : {
           "grid" : 12,
           "factor": 45,
           "normalize": true
       },
       "options" : {
          "color" : "random-dark",
         	"rotationRatio" : 0.5,
          "printMultiplier" : 3,
       },
       "font" : "Pacifico, Helvetica, sans-serif",
       "shape" : "star"
   }
    $( "#starcloud" ).awesomeCloud( config );
    </script>
<script type="text/javascript">
var form = $('#ajax-contact');
var form_data_g = $(form).serialize(); //Creates new FormData object
var post_url_g = $(this).attr("action");
$(form).on(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: post_url_g,
        data: form_data_g
    }).done(function(response) {
      $('#imagediv').emtpy();
      $('#imagediv').append(response);
    });
  });

</script>
<script type="text/javascript">
//configuration
var max_file_size 		= 2048576; //allowed file size. (1 MB = 1048576)
var allowed_file_types 		= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
var result_output 		= '#output'; //ID of an element for response output
var result_error = '#error';
var my_form_id 			= '#upload_form'; //ID of an element for response output
var total_files_allowed 	= 1; //Number files allowed to upload



//on form submit
$(my_form_id).on( "submit", function(event) {
	event.preventDefault();
	var proceed = true; //set proceed flag
	var error = [];	//errors
	var total_files_size = 0;

	if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
		error.push("Your browser does not support new File API! Please upgrade."); //push error text
	}else{
		var total_selected_files = this.elements['__files[]'].files.length; //number of files

		//limit number of files allowed
		if(total_selected_files > total_files_allowed){
			error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
			proceed = false; //set proceed flag to false
		}
		 //iterate files in file input field
		$(this.elements['__files[]'].files).each(function(i, ifile){
			if(ifile.value !== ""){ //continue only if file(s) are selected
				if(allowed_file_types.indexOf(ifile.type) === -1){ //check unsupported file
					error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); //push error text
					proceed = false; //set proceed flag to false
				}

				total_files_size = total_files_size + ifile.size; //add file size to total size
			}
		});

		//if total file size is greater than max file size
		if(total_files_size > max_file_size){
			error.push( "You have "+total_selected_files+" file(s) with total size "+total_files_size+", Allowed size is " + max_file_size +", Try smaller file!"); //push error text
			proceed = false; //set proceed flag to false
		}

		var submit_btn  = $(this).find("input[type=submit]"); //form submit button

		//if everything looks good, proceed with jQuery Ajax
		if(proceed){
			submit_btn.val("Please Wait...").prop( "disabled", true); //disable submit button
			var form_data = new FormData(this); //Creates new FormData object
			var post_url = $(this).attr("action"); //get action URL of form

			//jQuery Ajax to Post form data
			$.ajax({
				url : post_url,
				type: "POST",
				data : form_data,
				contentType: false,
				cache: false,
				processData:false,
				mimeType:"multipart/form-data"
			}).done(function(res){ //
				$(my_form_id)[0].reset(); //reset form
				$(result_output).html(res); //output response from server
        document.location.reload();
				submit_btn.val("Upload").prop( "disabled", false);
        //enable submit button once ajax is done
			});
		}
	}

	$(result_error).html(""); //reset output
	$(error).each(function(i){ //output any error to output element
    $(result_error).removeClass('hidden');
    $(result_error).append(error[i]+'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
    $(result_error).fadeOut(1800);
	});

});

</script>


<?php
include 'footer.php';
 ?>
