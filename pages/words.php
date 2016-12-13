<?php
include ("header.php");
include ("navbar.php");

include_once ($_SERVER['DOCUMENT_ROOT']."/db/db.php");
include $_SERVER['DOCUMENT_ROOT'].'/app/time.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/app/cloud.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$connection = new Db();
$cloud = new WordCloud();

$sql = $connection -> select("SELECT count(`userid`) AS count FROM `qa_users`;");
$count;
foreach ($sql as $key => $value) {
  $count = $value['count'];
}

$counts2 = [];
$counts3 = [];
$sql = $connection -> select("SELECT * FROM `qa_posts` WHERE `type` = 'Q';");
foreach ($sql as $key => $value) {
  // $wrdcount = $cloud -> wordcount($value['content']);
  $counts2 = $cloud -> array_merge_recursive_numeric($cloud -> wordcount($value['content']));
}
$sql = $connection -> select("SELECT * FROM `qa_posts` WHERE `type` = 'A';");
foreach ($sql as $key => $value) {
  // $wrdcount = $cloud -> wordcount($value['content']);
  $counts3 = $cloud -> array_merge_recursive_numeric($cloud -> wordcount($value['content']));
}

$result = array_merge($counts2, $counts3);
$cld = $cloud -> cleanup_wordcounts($result);
echo count($cld);
?>
<script type="text/CSS">
cloud {

}
</script>
<div class="container">
  <div class="row">

    <div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#starcloud" data-toggle="tab"><i class="fa fa-star-o" aria-hidden="true"></i> Star</a></li>
					<li><a href="#circle" data-toggle="tab"><i class="fa fa-circle-thin" aria-hidden="true"></i> Circle</a></li>
					<li><a href="#cross" data-toggle="tab"><i class="fa fa-times" aria-hidden="true"></i> Cross</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active wordcloud" id="starcloud">
              <?php foreach ($result as $key => $value): ?>
                <span data-weight="<?php echo $value;?>"><a href="/pages/word.php?word=<?php echo $key;?>"> <?php echo $key;?> </a> </span>
              <?php endforeach; ?>
					</div>
					<div class="tab-pane" id="circle">
            <div class="tab-pane active wordcloud" id="circlecloud">
                <?php foreach ($result as $key => $value): ?>
                  <span data-weight="<?php echo $value;?>"><a href="/pages/word.php?word=<?php echo $key;?>"> <?php echo $key;?> </a> </span>
                <?php endforeach; ?>
  					</div>
					</div>

					<div class="tab-pane" id="cross">
            <div class="tab-pane active wordcloud" id="crosscloud">
                <?php foreach ($result as $key => $value): ?>
                  <span data-weight="<?php echo $value;?>"><a href="/pages/word.php?word=<?php echo $key;?>"> <?php echo $key;?> </a> </span>
                <?php endforeach; ?>
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

    var configCircle = {
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
           "shape" : "circle"
       }
        $( "#circlecloud" ).awesomeCloud( configCircle );

        var configCross = {
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
               "shape" : "x"
           }
            $( "#crosscloud" ).awesomeCloud( configCross );
   </script>
<?php
include($_SERVER['DOCUMENT_ROOT']."/pages/footer.php");
?>
