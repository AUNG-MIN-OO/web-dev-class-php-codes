<?php
date_default_timezone_set("Asia/Tokyo");
//echo date("d-M-Y h:m:s");

$Today_date = create_date(date("d-M-Y h:m:s"));
date_add($Today_date,date_interval_create_from_date_string('3 days'));
echo (date_format($Today_date,"d-m-y"));
