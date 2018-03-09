<?php
  $inactive = 3600;
  
    if (!isset($_SESSION['timeout'])) {
      $session_life = time() - $SESSION['start'];
     // $_SESSION['timeout'] = time() + MAX_IDLE_TIME;
    } if {
	if ($_SESSION['timeout'] > $inactive) {   
            session_destroy()
    } else {
        $_SESSION['timeout'] = time();
    }
}
?>

