<div align="center">
	<div class="voteBlock2">
		<center><b><u>Как получить приз?</u></b></center>
 		<br>1. Вам нужно иметь игрового чара на нашем серверe
    	<br>2. Перейти по банеру и проголосовать за сервер
    	<br>3. Ниже ввести ник Вашего персонажа и выбрать сервер
		<br>4. Получить приз
    	<br>
    	<br><br>
	</div>
	[vote]
	<div class="voteBlock2">
		<script type="text/javascript">//<![CDATA[
function reload () {
	var rndval = new Date().getTime(); 
	document.getElementById('sw-captcha').innerHTML = '<a onclick="reload(); return false;" href="#"><img src="{url}/module/antibot.php?rndval=' + rndval + '" border="0"></a>';
};
//]]></script>
		<center><b><u>Проголосовал? Получи приз</u></b>
		<br>Введите ник игрока, на которого хотите получить бонус<br /></center>
		<form action="" method="post">
		<input type="hidden" name="act" value="get">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="voteTab2">
        <tr>
        	<td align="right">«Ник чара» &nbsp;&nbsp;</td>
        	<td><input type="text" name="char_name" maxlength="16" class="input"></td>
        </tr>
        <tr>
        	<td align="right">«Сервер» &nbsp;&nbsp;</td>
            <td>{servers}</td>
        </tr>
        [captcha]
        <tr>
        	<td align="right">{l2sec_code} </td>
        	<td valign="top"><input type="text" name="l2sec_code" maxlength="5" class="input"></td>
        </tr>
        [/captcha]
        [recaptcha]
		<tr>
		  	<td colspan="2">{code}</td>
		</tr>
		[/recaptcha]
        <tr>
        	<td colspan="2" align="center"><input type="submit" value="Получить" class="button"></td>
		</tr>
        </table>
		</form>
	</div>
	[/vote]
	[error]
	<div class="voteBlockErr">
		{error}
	</div>
	[/error]
</div>