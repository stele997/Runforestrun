<?php session_start(); ?>
<?php if(isset($_SESSION['username'])&&($_SESSION['username']->uloga_id)==1): ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/index.html">
<title>SB Admin 2</title>
<script language="javascript">
    window.location.href = "pages/index.php?page=insertMeni"
</script>
</head>
<body>
Go to <a href="pages/index.html">/pages/index.html</a>
</body>
</html>
<?php else: http_response_code(404); ?>
<?php endif;?>