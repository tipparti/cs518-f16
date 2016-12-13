<?php
include ("header.php");
include ("navbar.php");


if(!empty($_SESSION['userid'])){?>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      		  <h2>Ask a question</h2>
            <hr>
  	<!-- <div class="alert alert-success col-xs-4" ><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>
      <div class="alert alert-danger col-xs-4"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div> -->
    </div>
    <form role="form" method="post" id="ask_form" action="/pages/test.php">
      <div class="col-md-12">
          <div class="form-group">
            <div class="col-md-8">
              <label for="InputTitle">The question in one sentence:</label>
            <input  name="InputTitle" id="InputTitle" class="form-control" type="text" autocomplete="off" required>
          </div>
            </div>
         <div class="form-group">
          <div class="col-md-8">
            <label for="InputContent">More information for the question:</label>
            <textarea  class="form-control" name="InputContent" id="InputContent" rows="10" autocomplete="off" required></textarea>
            </div>
        </div>
        <div class="form-group">
          <div class="col-md-8" >
            <div class="tags well">
            <label for="tag" class="control-label">Tags - use hyphens to combine words:</label>
            <div data-tags-input-name="taggone" id="tag"></div>
            <p class="help-block">Press Enter, Comma or Spacebar to create a new tag, Backspace or Delete to remove the last one.</p>
            <div id="test">

            </div>
        </div>
            </div>
            </div>
        </div>
        <div class="form-group">
          <div  class="col-md-12"><br>
          <button type="submit" name="submit" id="submit" value="Ask the Question" class="btn btn-info btn-md"><span class="glyphicon glyphicon-send"></span>  Ask the Question
          </button>
        </div>
      </div>
    </form>
    <script>
           CKEDITOR.replace('InputContent');
            var my_form_id 			= '#ask_form';
           (function( $, window, document, undefined ) {
               $( document ).ready(function() {
                 var $tag_box;
                   var t = $( "#tag" ).tagging();
                   t[0].addClass( "form-control" );
                   console.log( t[0] );
                   $tag_box = t[0];
                   $tag_box.tagging( "getTags" );
                  //  console.log($tag_box);


               });
           })( window.jQuery, window, document );
        //ID of an element for response output
        // var form_data = new FormData(this); //Creates new FormData object
        // var post_url = $(this).attr("action");
        // $(my_form_id).on( "submit", function(event) {
        //    event.preventDefault();
        //    $.ajax({
        //    type: "POST",
        //    url: post_url,
        //    data: form_data,
        //    cache: false,
        //    success: function(result){
        //    $("#test").empty();
        //    $("#test").append(result);
        //    }
        //    });
        //  });
          </script>
  </div>
  </div>
  </div>
<?php
}
else {
  include_once 'check.php';
}
include("footer.php");
?>
