{include file='templates/header.tpl'}

<table class="header">
<tr>
<td>Welcome {$username}<a style="color:grey;" href="?action=logout"> (Logout)</a></td>

<td>Servidor <a style="color:green;">ONLINE</a></td>

<td>Servidor <a style="color:red;">OFFLINE</a></td>

<td>Servidor <a style="color:red;">OFFLINE</a></td>

</tr>
</table> 

<div class="form">
<form action="index.php" method="get">
<input type="hidden" name="action" value="start"><br>
<div class="buttom_submit"><input class="inp_submit"type="submit" value="Start server"></div>
</form>
</div>

<div class="form" style="margin-top:-30px;">
<form action="index.php" method="get">
<input type="hidden" name="action" value="stop"><br>
<div class="buttom_submit"><input class="inp_submit"type="submit" value="Turn off server"></div>
</form>
</div>

<div class="form" style="margin-top:-30px;">
<form action="index.php" method="get">
<input type="hidden" name="action" value="restart"><br>
<div class="buttom_submit"><input class="inp_submit"type="submit" value="Restart server"></div>
</form>
</div>


{include file='templates/footer.tpl'}