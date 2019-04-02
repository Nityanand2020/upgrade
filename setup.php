<?php
require_once 'db.php';


  createTable('classics',
              'user VARCHAR(16),
              phone VARCHAR(10),
              INDEX(user(6))');


?>