<div class="container">
  <div class="row">
    <div class="col-lg-12">

    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-8">

      </div>
      <div class="col-md-4">
        <p class="muted pull-right">&copy; 2016 All rights reserved</p>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="/js/classie.js"></script>
  <script>
    (function() {
      var morphSearch = document.getElementById( 'morphsearch' ),
        input = morphSearch.querySelector( 'input.morphsearch-input' ),
        ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
        isOpen = isAnimating = false,
        // show/hide search area
        toggleSearch = function(evt) {
          // return if open and the input gets focused
          if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

          if( isOpen ) {
            classie.remove( morphSearch, 'open' );

            // trick to hide input text once the search overlay closes
            // todo: hardcoded times, should be done after transition ends
            if( input.value !== '' ) {
              setTimeout(function() {
                classie.add( morphSearch, 'hideInput' );
                setTimeout(function() {
                  classie.remove( morphSearch, 'hideInput' );
                  input.value = '';
                }, 300 );
              }, 500);
            }

            input.blur();
          }
          else {
            classie.add( morphSearch, 'open' );
          }
          isOpen = !isOpen;
        };

      // events
      input.addEventListener( 'focus', toggleSearch );
      ctrlClose.addEventListener( 'click', toggleSearch );
      // esc key closes search overlay
      // keyboard navigation events
      document.addEventListener( 'keydown', function( ev ) {
        var keyCode = ev.keyCode || ev.which;
        if( keyCode === 27 && isOpen ) {
          toggleSearch(ev);
        }
      } );


      /***** for demo purposes only: don't allow to submit the form *****/
      morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) {
                      this.form.submit();
                       ev.preventDefault();
                    } );
    })();
  </script>
<script type="text/javascript">
function showHint(str) {
var like = $("#searchall").val();
var dataString = 'searchall='+ like ;

if (like != '') {

  $.ajax({
  type: "POST",
  url: "/pages/search.php",
  data: dataString,
  cache: false,
  success: function(result){
  $("#search-content").empty();
  $("#search-content").append(result);
  }
  });
} else {
  $("#search-content").append("<h2>No Results</h2>");
  $("#search-content").empty();
}
}
// AJAX Code To Submit Form.


</script>
<script src="/js/tagging.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

</body>
</html>
