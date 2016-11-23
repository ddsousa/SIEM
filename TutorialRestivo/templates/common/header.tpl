<!DOCTYPE html>
<html>
  <head>
    <title>Fritter</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="{$BASE_URL}/css/style.css">
  </head>
  <body>
		<header>
      <h1><a href="{$BASE_URL}">Fritter</a></h1>
			{if $USERNAME}
				{include file='common/menu_logged_in.tpl'}
			{else}				
				{include file='common/menu_logged_out.tpl'}
			{/if}
    </header>
		{if !$_SESSION['error_messages'] }
			<div id="error_messages">
				{foreach $ERROR_MESSAGES as $error}
					<div class="error">{$error}</div>
				{/foreach}
			</div>
		{/if}
	<div id="success_messages">
	{foreach $SUCCESS_MESSAGES as $success}
		<div class="success">{$success}</div>
	{/foreach}
	</div>
