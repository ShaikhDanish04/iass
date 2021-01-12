<?php
session_unset();
session_destroy();
echo "<script type='text/javascript'>document.location.href = 'index';</script>";
