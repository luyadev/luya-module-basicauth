<html>
	<head>
		<title>Basic Auth</title>
	</head>
	<body>
		<h1>LUYA BASIC AUTH</h1>
<p>Please enter your login password here:</p>

    <form method="post">
    	<input type="password" name="authPassword" /><input type="submit" value="submit" />
    </form>	
    
    <?php if ($error): ?>
    	<p style="color:red;">The entered password is wrong.</p>
    <?php endif; ?>
    
	</body>
</html>
