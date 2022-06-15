<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<style type="text/css">
		html, body {
			margin: 0;
			padding: 0;
			font-family: Arial, Helvetica, sans-serif;
		}
		* {
			box-sizing: border-box;
		}
		#wrapper {
			width: 500px;
			max-width: 100%;
			margin: 0 auto;
			padding-bottom: 20px;
			padding-top: 20px;
		}
		img {
			width: 100%;
			max-width: 100%;
		}
		#top-logo {
			width: 200px;
			margin: 0 auto;
			padding-bottom: 30px;
		}
		#content-section {
			width: 100%;
			display: block;
			margin-top: 20px;
			padding: 50px;
			box-sizing: border-box;
			background: #FFFFFF 0% 0% no-repeat padding-box;
			box-shadow: 0px 5px 15px #00000029;
		}
		#content-section h2 {
			margin-top: 0;
			margin-bottom: 0;
			font-size: 20px;
			line-height: 30px;
		}
		#content-section .spacer-img {
			display: block;
			margin-top: 30px;
			margin-bottom: 30px;
			width: 100%;
		} 
		#content-html {
			font-size: 12px;
			line-height: 21px;
			margin-top: 30px;
			margin-bottom: 30px;
		}
		#title {
			text-align: left;
		}
		#content-sectionFooter {
			font-size: 12px;
			text-align: center;
			margin-top: 20px;
		}
		#content-sectionFooter label {
			display: block;
		}

		#social-icons {
			margin-top: 30px;
			text-align: center;
		}
		#social-icons a {
			margin: 0 7px;
			font-size: 0;
		}

		ul {
			list-style: none;
			margin-left: 0;
			padding-left: 0;
			display: flex;
    		align-items: center;
    		justify-content: center;
		}
		ul li {
			font-size: 12px;
			font-weight: bold;
			margin: 0 10px;
			display: inline-block;
		}
		ul li a {
			color: #FF473E;
		}
		ul li span {
			display: block;
			width: 1px;
			height: 15px;
			background-color: #FF473E;
			border-radius: 500rem;
			-webkit-border-radius: 500rem;
		}
		.divider {
			width: 100%;
			height: 1px;
			background-color: #FF473E;
			margin: 5px 0;
		}
		#content-footer {
			width: 100%;
			text-align: center;
		}
		#content-footer label {
			display: block;
			font-size: 12px;
			margin-top: 30px;
			text-align: center;
		}
		a,
		a:hover,
		a:link,
		a:active,
		a:visited {
			color: #FF473E;
			font-size: 12px;
			text-decoration: none;
		}
		#button-link {
			display: inline-block;
			margin: auto;
			width: 50%;
			height: 42px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #ffffff;
			background-color: #FF473E;
			text-decoration: none;
			margin-top: 30px;
			font-size: 12px;
			margin-bottom: 30px;
		}
		.button-link {
			margin: auto;
			color: #ffffff !important;
			text-decoration: none;
		}
	</style>
</head>
<body style="background: #f6fafd 0% 0% no-repeat padding-box;">
	<div id="wrapper">
		<div id="content-section">
			<div id="top-logo">
				<img src="{{ config('app.url') }}/logo/casper-logo.png" alt="logo"/>
			</div>
			<h2 id="title">Reset Pasword</h2>
			<div class="divider"></div>
			<div id="content-html">
				You are receiving this email because we received a password reset request for your account.
			</div>
			<div id="button-link">
				<a class="button-link" href="{{ $url }}">
					Reset Pasword
				</a>
			</div>

			<div class="divider"></div>
			<div id="content-sectionFooter">
				<label>Thanks for being a part of Casper's future.<br/><br/>Casper Association Team</label>
			</div>
		</div>
		<div id="content-footer">
			<label>&copy; 2022 Casper Association</label>
			<label>
				<a href="{{ config('app.site_url') }}/privacy-policy">Privacy Policy</a>
				<span style="margin-left:10px;margin-right:10px;">|</span>
				<a href="{{ config('app.site_url') }}/terms-of-service">Terms of Service</a>
			</label>
		</div>
	</div>
</body>
</html>