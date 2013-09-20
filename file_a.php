<?php

/*
  Python's '''if __name__ == "__main__":''' implemented in PHP.

  Python has a way to call a script and make available only its classes & functions
    without executing lines of code outside of those classes and functions.
  One use-case for this feature: testing.
    A script can be accessed to test its classes & functions without executing non-targeted code.
  This is a way to achieve similar functionality in PHP.
  ( based on <http://stackoverflow.com/questions/2413991/php-equivalent-of-pythons-name-main> )
*/

define( 'DIRECT_FROM_APACHE', !debug_backtrace() );

class Worker {

  function greet() {
    if ( DIRECT_FROM_APACHE ) {
      $greeting = 'Hello web-user.';
    } else {
      $greeting = 'Hello programmatic-call.';
    }
    return $greeting;
  }

}  // end class Worker

if ( DIRECT_FROM_APACHE ) {
  echo '<p>Apache asked me to say...</p>';
  $wrkr = new Worker();
  echo '<p>' . $wrkr->greet() . '</p>';
  echo '<p>
          Before this debug_backtrace() hack,
          this miscellaneous drek would have spewed forth
          if this file were included/required in order to access its classes/functions.
        </p>';
  echo '<p>
          But now that doesn\'t happen,
          and includes/requires work cleanly.
          <a href="./file_b.php">See?</a>
        </p>';
}

?>
