<?php

$ldapServer = "ldap.iitm.ac.in";
$ldapPort = 389;
$ldapDn = "cn=students,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in";
$ldapPass = "rE11Bg_oO~iC";
$ldapConn = ldap_connect($ldapServer, $ldapPort) or die("Could not connect to LDAP server.");

$studentUser = $uname;
$studentPass = $pass;

//Target URL
if(isset($_GET['Target'])){
  $Target = "&Target=".$_GET['Target'];
}
else $Target ="";

//Target Home
if(isset($_GET['TargetHome'])){
  $TargetHome = $_GET['TargetHome'];
}
else $TargetHome ="index";

if(empty($studentUser) || empty($studentPass))	header('Location: index.php?error=1');

if($ldapConn) {
  $ldapBind = ldap_bind($ldapConn, $ldapDn, $ldapPass);
  if($ldapBind){
    //echo "Bound<br>";
    $filter = "(&(objectclass=*)(uid=".$studentUser."))";
    $ldapDn = "dc=ldap,dc=iitm,dc=ac,dc=in";
    $result = ldap_search($ldapConn, $ldapDn, $filter) or die ("Error in search query: ".ldap_error($ldapConn));   
    $entries = ldap_get_entries($ldapConn, $result);
    foreach($entries as $values => $values1){
      $logindn = $values1['dn'];
    }
    $loginbind = ldap_bind($ldapConn, $logindn, $studentPass);
    if ($loginbind){
      //echo "success";
      if($_POST['remember']==true)
        setcookie("user", $uname, $expire);
      $_SESSION['uname'] = $uname;
      $_SESSION['uid'] = $row['id'];
      $_SESSION['UserID'] = 38;
      include "forum_login.php";
      if(isset($_POST['tc_key'])) header("location:http://students.iitm.ac.in/forum/?login=success".$Target);
      else header("location:$TargetHome.php");
    } else{
      //Either login has failed or it might be a special user - {Alumni, Faculty, Demo User}
      //Demo User
      if( $studentUser == "thought_cloud"){
        if($pass == "tcdemo"){
          $_SESSION['uname'] = $studentUser;
          $_SESSION['uid'] = $row['id'];
          if(isset($_POST['tc_key'])) header("location:http://student.iitm.ac.in/forum/?login=success".$Target);
          else header("location:$TargetHome.php");
        }
        else{
          //echo "Special Login Failed";
          if(isset($_POST['tc_key'])) header("location:http://student.iitm.ac.in/forum/?err=Username Password Mismatch".$Target);
          else header("Location: $TargetHome.php?error=1");
        }
      }
      //DOST
      else if( $studentUser == "dost"){
        if($pass == "tc#dostiitm"){
          $_SESSION['uname'] = $studentUser;
          $_SESSION['uid'] = $row['id'];
          if(isset($_POST['tc_key'])) header("location:http://students.iitm.ac.in/forum/?login=success".$Target);
          else header("location:$TargetHome.php");
        }
        else{
          //echo "Special Login Failed";
          if(isset($_POST['tc_key'])) header("location:http://students.iitm.ac.in/forum/?err=Username Password Mismatch".$Target);
          else header("Location: $TargetHome.php?error=1");
        }
      }
      //Failed Login
      else{
        //echo "Failed";
        if(isset($_POST['tc_key'])) header("location:http://students.iitm.ac.in/forum/?err=Username Password Mismatch".$Target);
        else header("Location: $TargetHome.php?error=1");
      }
    }
    //print_r($entries[0]);
  }
  else header("Location: index.php?error=2");
}
ldap_unbind($ldapConn);

?>
