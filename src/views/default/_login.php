<html>
	<head>
		<title><?= Yii::$app->siteTitle; ?> Auth</title>
	</head>
	<body>
		<div style="margin:20px; padding:20px; width:500px; background-color:#F0F0F0; border:1px solid #CCC;">
    		<h1 style="font-size:20px;"><?= Yii::$app->siteTitle; ?></h1>
    		<p>Please enter a valid password to access this website:</p>
    
            <form method="post">
            	<input type="password" name="authPassword" style="padding:4px; width:200px;" autofocus /> <input type="submit" value="Login" style="padding:4px;" />
            </form>	
        
            <?php if ($error): ?>
            	<p style="color:red;">&raquo; The provided password is not correct.</p>
            <?php endif; ?>
    	</div>
    
	</body>
</html>
