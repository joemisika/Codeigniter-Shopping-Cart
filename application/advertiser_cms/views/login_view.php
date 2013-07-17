<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?=$title?> | Simple shopping cart for low income businesses</title>
<meta content = "" name="description">
<meta content = "" name="keywords">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<link href="/css/login.css" media="all" rel="stylesheet" type="text/css" />

<style>
a { color: #CA8E00; }
a:hover, a:focus { color: #feb509; }

div#wrapper { margin-top: 0px; }
h3#title { background-image: url(/images/icons/notable.png); }

body { background: url(/images/meow/body-bg.jpg) 0px 48px repeat-x #e6e6e6; padding-top: 90px; }
</style> 
            
<style>	
body { background-position: 0 0; padding-top: 60px; }
.login-window { background: #fff; padding: 30px 30px 60px 30px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: solid 1px #ddd; -webkit-box-shadow: 0px 2px 5px rgba(0,0,0,0.25); -moz-box-shadow: 0px 2px 5px rgba(0,0,0,0.25); box-shadow: 0px 2px 5px rgba(0,0,0,0.25); position: relative; }
a.forgot { color: #aaa; position: relative; top: 20px; }
a.forgot:hover { color: #555; }
button#loginBtn, button#forgotBtn, button#changePassword { position: absolute; right: 30px; bottom: 30px; }
label, label.focus { font-weight: bold; color: #141414 !important; }

/* Just need to add a couple colors :) */
.footer.button			{ background: #ccc;  }
.yellow.button			{ background: #e5a309;  }
.nice.yellow.button		{ border: 1px solid #ce9205;  }
.yellow.button:hover	{ background-color: #d6990b; 	}
	
.green.button			{ background: #91BD09;  }
.nice.green.button		{ border: 1px solid #91ad52;  }
.green.button:hover	{ background-color: #769926; 	}</style> 

</head>
<body>
<div id="wrapper">
  	<div class="slim container">	    
	    
		<div class="row">
			<div class="six columns offset-by-five">
			
				<div class="login-window">
								
					<div id="header">
						
						<img alt="Logo" src="/images/sessions/notable-logo.gif?1330630422" />
		
						<h1>Company Logo</h1>
					
					</div>
					
					<form action="<?=base_url()?>login/process_login" class="login-form awesome" id="login-form" method="post">
					
						<label for="email" id="email-label">Username</label>
						<input autocorrect="off" class="small input-text" id="email" name="username" type="text" />
						
						<label for="password" id="password-label">Password</label>
		
						<input class="small input-text" id="password" name="password" type="password" />
						<input type="submit" id="loginBtn" class="nice radius button yellow" value="LOGIN &raquo;"><!--</button>-->
					
					</form>
				</div>
			
			</div>
		</div>
	</div>
</div>

</body>
</html>