<?php require_once('../Connections/config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "painel.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);
  	
  $LoginRS__query=sprintf("SELECT usuario, senha, nivel FROM up_users WHERE usuario=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UpInside - Gerenciador de Sites</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="box">
  
  <div id="header">


     <div id="header_logo">
    <a href="painel.php"><img src="images/logo.png" alt="" border="0" /></a>
    </div><!--header logo-->
    
  </div>
 
  <div id="painel_de_login">
   
   <div class="alert">
   <strong>Para acessar o painel, você deve ter:</strong>
   <br />&raquo; Logado corretamente.
   <br />&raquo; Ter nivel de acesso.</div>
   
     <form method="POST" action="<?php echo $loginFormAction; ?>" name="login_erro">
      <fieldset>
        <legend>Você precisa logar-se</legend>
       <label>
         <span>Usuário</span>
          <input type="text" name="login" />
        </label>
        
        <label>
         <span>Senha</span>
          <input type="password" name="senha" />
        </label>
        
        <input type="submit" name="logar" value="Logar-se" class="login_btn"/>
        
       </fieldset>
     </form>   
   
   </div><!-- Painel de login-->

</div>

</body>
</html>