<!--
==============================+===============================================================
@ File Name : CommentPageLogout.php
@ Author : jopemachine
@ Team : team ⓒ EV for 2019 BottomUp
@ Created Date : 2019-07-11, 22:24:48
@ Desc : 
@    Comment.php에서 로그아웃 할 때 사용합니다. 세션을 삭제하는 식으로 작동합니다.
==============================+===============================================================
-->


<?php

session_start();
// 저장해두었던 세션을 삭제
unset($_SESSION['user_id']);
unset($_SESSION['profileImageFileName']);
// 삭제한 후 로그인 페이지로 돌아감

$prevPage = $_SERVER["HTTP_REFERER"];

header("location:" . $prevPage);
