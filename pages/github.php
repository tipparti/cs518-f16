<?php
session_start();
// require_once $_SERVER['DOCUMENT_ROOT'].'/pages/header.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/pages/navbar.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clientId = "332ee047993e8908ad81";
$clientSecret = "90f90533343d94fa6bca81bdf8da5402b7219ac7";
$redirect_url = 'http://tipparti.cs518.cs.odu.edu/pages/github.php';
// $redirect_url = 'http://localhost:8888/pages/github.php';

$ROOTURI = "http://tipparti.cs518.cs.odu.edu/index.php";

//get request , either code from github, or login request
//authorised at github
if(isset($_GET['code'])) {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://github.com/login/oauth/access_token");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
    http_build_query(array(
      'code' => $_GET['code'],
      'client_id' => $clientId,
      'client_secret' => $clientSecret
    ))
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER,array("Accept: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $server_output = curl_exec ($ch);
  curl_close ($ch);

  $json = json_decode($server_output,true);

  if( !$json ||
    !isset($json['access_token']) ||
    strpos($json['access_token'],' ') !== FALSE){echo "Bad access token. <a href='$ROOTURI'>Reload the page.</a> Try again.";die();}

  $accessToken = json_decode($server_output,true)["access_token"];

  // $data = array('url' => '='.$accessToken,
  //                     'header' => array("Content-Type: application/x-www-form-urlencoded","Accept: application/json"),
  //                     'method' => 'GET');

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/user?access_token='.$accessToken,
    CURLOPT_USERAGENT => 'Q&A',
    CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded","Accept: application/json")
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$git = json_decode($resp,true);
// echo $resp;
echo $git["name"];
echo $git["avatar_url"];
$_SESSION['name'] = $git["login"];

require_once $_SERVER['DOCUMENT_ROOT'].'/pages/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pages/navbar.php';

// echo '<script type="text/javascript">
// window.location.href = "/";
// </script>';?>

<div class="container">
  <div class="row">
    <div class="row clearfix well">
    <div class="col-md-2 column">
      <?php         echo '<img src="'.$git["avatar_url"].'" class="img-thumbnail" alt="'.$git['name'].'" />';?>
    </div>
    <div class="col-md-5">
			<blockquote>
				<p>
<?php echo $git['name']; ?>
            </p> <small>Score: 0 points (no rank)</small>
			</blockquote>
		</div>
  </div>
  </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/pages/footer.php';

} else {
  $url = "https://github.com/login/oauth/authorize?client_id=$clientId&redirect_uri=$redirect_url&scope=user";
  header("Location: $url");
}
?>
