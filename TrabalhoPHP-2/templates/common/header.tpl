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
				{if isset($USERNAME)}
					{include file='common/menu_logged_in.tpl'}
				{else}
					{include file='common/menu_logged_out.tpl'}
				{/if}
			</header>
			{include file='common/navbar.tpl'}
			{if isset($active_page)}
				{if $active_page eq "Produtos"}
					<p>{$active_page}</p>
					{include file='common/prod_type_menu.tpl'}
				{/if}
			{/if}
			<div id="error_messages">
				{if isset($ERROR_MESSAGES)}
				  {foreach $ERROR_MESSAGES as $error}
				    <div class="error">{$error}</div>
				  {/foreach}
				{/if}
			</div>
			<div id="success_messages">
				{if isset($SUCCESS_MESSAGES)}
				  {foreach $SUCCESS_MESSAGES as $success}
				    <div class="success">{$success}</div>
				  {/foreach}
				{/if}
			</div>
