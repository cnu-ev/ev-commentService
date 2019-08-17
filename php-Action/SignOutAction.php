<!--
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-11, 22:25:37
@ Desc : 
@     evCommentService.ga에서 로그아웃 할 때 실행됩니다.
-->


<?php

session_start();
// 저장해두었던 세션을 삭제
unset($_SESSION['user_id']);
unset($_SESSION['profileImageFileName']);

// 삭제한 후 로그인 페이지로 돌아감
echo ("<script>location.href='../SignIn.php';</script>");
