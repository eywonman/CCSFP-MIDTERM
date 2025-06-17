<?php
require_once 'agent-class.php';
$user = new AGENT();

if(!$user->isUserLoggedIn())
{
 $user->redirect('../../../signin.php');
}

if($user->isUserLoggedIn()!="")
{
 $user->logout();
 $user->redirect('../../../signin.php');
}
?>