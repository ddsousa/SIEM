<!DOCTYPE html>
<html>
  <head>
    <title>Oceano Hipermercados</title>
    <link rel="stylesheet" href="{$BASE_URL}css/style.css">
    <link rel="icon" href="{$BASE_URL}media/img/logos/icon.png">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{$BASE_URL}javascript/main.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
  	<div id="wrapper">
			<header>
				<a href="{$BASE_URL}pages/other/home.php"><img id="logo" src="{$BASE_URL}media/img/logos/logo.png" alt="Logotype"></a>
				{if $USERNAME}
					{include file='common/menu_logged_in.tpl'}
				{else}
					{include file='common/menu_logged_out.tpl'}
				{/if}
			</header>
			<div id="error_messages">
			  {foreach $ERROR_MESSAGES as $error}
			    <div class="error">{$error}</div>
			  {/foreach}
			</div>
