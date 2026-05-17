<?php
http_response_code(301);
header('X-Robots-Tag: noindex, nofollow', true);
header('Location: rezultaty-rabot.php');
exit;
