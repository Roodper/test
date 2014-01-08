<?php error_reporting(0);
session_start();
$INSTALL = FALSE;
$ERROR ;
$con ;
$host;
$db;
$username;
$password;
$site;

if(isset($_POST['install'])){

	$host 	  = trim($_POST['host']    );
	$db 	  = trim($_POST['database']);
	$username =	trim($_POST['username']);
	$password = trim($_POST['password']);
	$site 	  = trim($_POST['site']);

	if(!empty($host) && !empty($username) && !empty($password) && !empty($site)){
		$con=mysqli_connect($host,$username,$password,$db);
		if (mysqli_connect_errno($con))
	 	{
	 		$ERROR ="Failed to connect to MySQL: ";
		}else{
			$INSTALL = TRUE;
			$_SESSION['host']=$host ;
			$_SESSION['db']=$db ;
			$_SESSION['username']=$username ;
			$_SESSION['password']=$password ;
			$_SESSION['site']=$site ;
		}
	}else{
		$ERROR = "Please DO NOT leave the fields blank";
	}


}
if(isset($_GET['part2']) || isset($_GET['part3']) || isset($_GET['part4']))$INSTALL = TRUE;

if($INSTALL == FALSE){
?>
<html>
<head><title>Installation of Document Sharing Utility | By Soheil Barzegar Marvasti</title></head>
<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: 100;
	}
	body{
		background-image: url(data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MSA2NC4xNDA5NDksIDIwMTAvMTIvMDctMTA6NTc6MDEgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjBCMjI1N0RGRDcyODExRTI4MDVFQTU1RUI3NTM3Qjc5IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjBCMjI1N0UwRDcyODExRTI4MDVFQTU1RUI3NTM3Qjc5Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MEIyMjU3RERENzI4MTFFMjgwNUVBNTVFQjc1MzdCNzkiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MEIyMjU3REVENzI4MTFFMjgwNUVBNTVFQjc1MzdCNzkiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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) ;

		-webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
	}
	.wrap{
		width: 600px;
		background-color: rgba(255,255,255,0.9);
		margin: 40px auto;
		position: relative;
	}
	.holder{
		padding: 30px;
	}



.container {
}

.wrap {
}

.holder {
}

.holder > hr {
    border: none;
    border-top: 1px solid rgb(224, 216, 216);
    margin: 10px 0;
}

.holder > br {
}

.welcome {
}

.welcome > h2 {
    text-align: center;
    margin-bottom: 20px;
    color: rgb(47, 90, 104);
}

.welcome > h4 {
    font-size: 16px;
    text-align: center;
}

.welcome > h4 > small {
    display: block;
    color: rgb(24, 124, 163);
    font-size: 14px;
}

.welcome > p {
    background: rgb(213, 213, 213);
    padding: 10px;
    font-size: 15px;
    margin-top: 38px;
    margin-bottom: -10px;
    color: black;
}

.welcome > textarea {
    margin: 10px 0px;
    width: 100%;
    border: 2px solid rgb(213, 213, 213);
    padding: 10px;
    font-size: 13px;
    background-color: white;
    resize: vertical;
    height: 111px;
    background-position: initial initial;
    background-repeat: initial initial;
}

.install {
}

.install > h4 {
    text-align: center;
    font-size: 19px;
    margin-bottom: 22px;
    color: rgb(34, 49, 111);
}

.install > p {
    font-size: 14px;
    margin-bottom: 13px;
}

.install > br {
}

.install > form {
    background: rgba(70, 68, 68, 0.96);
    color: white;
    padding: 20px;
}

.install > form > fieldset {
    border: none;
    margin: 10px 0;
}

.install > form > fieldset > label {

	font-weight: 100;
	margin: 11px 0;
	float: left;

}

.install > form > fieldset > input {
	border:none;
	padding: 7px 10px;
	width: 141px;
	float: right;
	margin-right: 210px;
	font-size: 12px;

}
.install button{
	-webkit-appearance: none;
	-moz-appearance: none;
	border: none;
	padding: 16px 20px;
	background: rgb(42, 174, 185);
	font-size: 19px;
	border-radius: 4px;
	color: white;
}

.install button:hover{

	background: rgb(37, 190, 202);

}

.install small{
	display: block;
	float: left;
	margin: 17px 41px;
}

.error{
	background: rgba(141, 19, 19, 0.43);
	padding: 20px;
	font-size: 16px;
	color: white;
}



</style>
<body>
<div class="container">
	<div class="wrap">
		<div class="holder">
			<div class="welcome">
			<h2>Welcome</h2>
			<h4>Installation of Document Sharing Utility <small>By Soheil BarzegarMarvasti</small></h4>
			<p>Before installing this application, please take a few minutes of your time and read the user agreement for using this application.</p>
			<textarea>The license of this software is a legal agreement between you and The Developer ( Soheil BarzegarMarvasti) for the use
of " Document Sharing Utility (DSU)" Software. DSU is holding the GNU lincense. The GNU General Public License is a free, copyleft license for
software and other kinds of works. You are permitted to use, copy, modify, and distribute the Software and its
documentation, with or without modification, for any purpose, provided that
the following conditions are met: 

1. A copy of this license agreement must be included with the distribution.

2. Redistributions of source code must retain the above copyright notice in
   all source code files.

For more information about GNU License please refer to http://www.gnu.org/licenses/gpl.txt .
</textarea>
			</div>
			<hr/>
			<br/>
			<div class="install">
			<h4>Installation System</h4>
			<p>Follow below steps in order to create a fully functional system.</p>
			<p>1) Make sure that the zip file ( DSU.zip ) is in a folder with full privilage.</p>
			<p>2) Make sure that this install.php file has full privilage to read and write.</p>
			<p>3) Last but not least create a database with full privilage, and then add the mysql connection data in below forms</p>
			<p>4) The installation would normally take a few seconds. You will redirected to main page if installation done successfully</p>
			
			<?php if(isset($ERROR)){?><div class="error"><?php echo $ERROR; ?></div><?php }?>
			
			<br/>
			<form  action="install.php" method="POST">
				<fieldset>
					<label>Mysql Host</label>
					<input type="text" name="host" placeholder="Host" maxlength="50" value="<?php if(isset($_POST['host']))echo $_POST['host'];?>" />
				</fieldset>
				<fieldset>
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" maxlength="50" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>"/>
				</fieldset>
				<fieldset>
					<label>Password</label>
					<input type="text" name="password" placeholder="Password" maxlength="50" value="<?php if(isset($_POST['password']))echo $_POST['password'];?>"/>
				</fieldset>
				<fieldset>
					<label>Database</label>
					<input type="text" name="database" placeholder="Database" maxlength="50" value="<?php if(isset($_POST['database']))echo $_POST['database'];?>"/>
				</fieldset>
				<fieldset>
					<label>Full Site Name </label>
					<input type="text" name="site" maxlength="50" value="<?php if(isset($_POST['site']))echo $_POST['site'];else{ $path = $_SERVER['PHP_SELF']; $path = pathinfo($path); echo "http://".$_SERVER['HTTP_HOST'].$path['dirname']."/";} ?>" />
					<br/>
					<small >(e.g http://example.com/ )</small>
				</fieldset>
				<button type="submit" name="install">Install</button>
			</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
exit();
}

// extracting the zip (DSU.zip)
if(isset($_GET['part2'])){
	$zip = new ZipArchive;
	 if ($zip->open('dsu.zip') === TRUE) {
	     $zip->extractTo(getcwd());
	     $zip->close();

	     chmod(getcwd()."/application/config", 0777); 
	     chmod(getcwd()."/uploads", 0777); 
	      header("Refresh:2; url=?part3=config", true, 303);
		 exit();
	 }
	exit();
}


// wiring the config file
if(isset($_GET['part3'])){

 $File = getcwd().'/application/config/config.php'; 
 $Handle = fopen($File, 'w');
 $Data = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
\$config['base_url']	= '".$_SESSION["site"]."';
\$config['index_page'] = '';
\$config['uri_protocol']	= 'AUTO';
\$config['url_suffix'] = '';
\$config['language']	= 'english';
\$config['charset'] = 'UTF-8';
\$config['enable_hooks'] = FALSE;
\$config['subclass_prefix'] = 'MY_';
\$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
\$config['allow_get_array']		= TRUE;
\$config['enable_query_strings'] = FALSE;
\$config['controller_trigger']	= 'c';
\$config['function_trigger']		= 'm';
\$config['directory_trigger']	= 'd'; // experimental not currently in use
\$config['log_threshold'] = 0;
\$config['log_path'] = '';
\$config['log_date_format'] = 'Y-m-d H:i:s';
\$config['cache_path'] = '';
\$config['encryption_key'] = '23487fh&$*c._#48yhi';
\$config['sess_cookie_name']		= 'cloud_sessions';
\$config['sess_expiration']		= 7200;
\$config['sess_expire_on_close']	= FALSE;
\$config['sess_encrypt_cookie']	= TRUE;
\$config['sess_use_database']	= TRUE;
\$config['sess_table_name']		= 'cloud_sessions';
\$config['sess_match_ip']		= TRUE;
\$config['sess_match_useragent']	= TRUE;
\$config['sess_time_to_update']	= 300;
\$config['cookie_prefix']	= '';
\$config['cookie_domain']	= '';
\$config['cookie_path']		= '/';
\$config['cookie_secure']	= FALSE;
\$config['global_xss_filtering'] = FALSE;
\$config['csrf_protection'] = FALSE;
\$config['csrf_token_name'] = 'csrf_test_name';
\$config['csrf_cookie_name'] = 'csrf_cookie_name';
\$config['csrf_expire'] = 7200;
\$config['compress_output'] = FALSE;
\$config['time_reference'] = 'local';
\$config['rewrite_short_tags'] = FALSE;
\$config['proxy_ips'] = '';"; 


 fwrite($Handle, $Data);  
 fclose($Handle); 

 // writing database configuration
 $File = getcwd().'/application/config/database.php'; 
 $Handle = fopen($File, 'w');
 
 $Data = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
\$active_group = 'default';
\$active_record = TRUE;

\$db['default']['hostname'] = '".$_SESSION["host"]."';
\$db['default']['username'] = '".$_SESSION["username"]."';
\$db['default']['password'] = '".$_SESSION["password"]."';
\$db['default']['database'] = '".$_SESSION["db"]."';
\$db['default']['dbdriver'] = 'mysqli';
\$db['default']['dbprefix'] = '';
\$db['default']['pconnect'] = TRUE;
\$db['default']['db_debug'] = TRUE;
\$db['default']['cache_on'] = FALSE;
\$db['default']['cachedir'] = '';
\$db['default']['char_set'] = 'utf8';
\$db['default']['dbcollat'] = 'utf8_general_ci';
\$db['default']['swap_pre'] = '';
\$db['default']['autoinit'] = TRUE;
\$db['default']['stricton'] = FALSE;";

 fwrite($Handle, $Data);  
 fclose($Handle); 

 header("Refresh:2; url=?part4=final", true, 303);
		 exit();
}

// altering pre information for the system
if(isset($_GET['part4'])){
	$con=mysqli_connect($_SESSION['host'],$_SESSION['username'],$_SESSION['password'],$_SESSION['db']);

	mysqli_query($con,"INSERT INTO `groups` (`id`, `name`, `description`) VALUES (1, 'admin', 'Administrator')")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `groups` (`id`, `name`, `description`) VALUES (2, 'members', 'General User')")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `paypal`, `total_stored`, `total_num_stored`) VALUES (1, '\0\0', 'administrator', '$2a$08\$TP33GIO9Xe1zU6sclk96ROZbzwfkB6jIFin7EcKdjkbO3ntNYHh4m', '67f8d9ca9b', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1377523225, 1, 'Admin', 'istrator', 'ADMIN', NULL, '0', 0)")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `paypal`, `total_stored`, `total_num_stored`) VALUES (15, '\0\0', 'soheilbm', '$2a$08\$TP33GIO9Xe1zU6sclk96ROZbzwfkB6jIFin7EcKdjkbO3ntNYHh4m', '67f8d9ca9b', 'soheilbm@hotmail.com', NULL, NULL, NULL, NULL, 1375743674, 1377537970, 1, 'david Jay', 'henrie', 'ADMIN', 'soheilbm@hotmail.com', '0', 0)")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `paypal`, `total_stored`, `total_num_stored`) VALUES (16, '\0\0', 'anderson7171', '$2a$08\$DCN82DWSvz3BkxCsib2mjeallSimN4NgMLpfgqCMEC8d83GHYoJ0e', 'b7a8bfa347', 'anderson7171@gmail.com', NULL, NULL, NULL, NULL, 1377383767, 1377443719, 1, 'anderson', 'bm', 'ADMIN', NULL, '0', 0)")or die(mysql_error());


	mysqli_query($con,"INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES (1, 1)")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES (15, 1)")or die(mysql_error());

	mysqli_query($con,"INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES (16, 2)")or die(mysql_error());

	header("Refresh:2; url=index.php", true, 303);
	die('System installed successfully !');
}

// create the queries into database

if($INSTALL==TRUE){
mysqli_query($con,"CREATE TABLE IF NOT EXISTS `cloud_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stored_name` varchar(200) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `download` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `stored_name` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `request_pay_out` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requested_money` varchar(50) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `share_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `stored_name` varchar(200) NOT NULL,
  `shared_email` varchar(100) NOT NULL,
  `bought` tinyint(1) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `stored_name` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paypal_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1")or die(mysql_error());


mysqli_query($con,"CREATE TABLE IF NOT EXISTS `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `stored_name` varchar(200) NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `ext` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT '0',
  `modified_date` timestamp NULL DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `share` tinyint(4) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `paypal` varchar(100) DEFAULT NULL,
  `total_stored` varchar(10) DEFAULT '0',
  `total_num_stored` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `paypal` (`paypal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2")or die(mysql_error());

mysqli_query($con,"CREATE TABLE IF NOT EXISTS `users_groups` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `user_id` int(11) unsigned NOT NULL,
	  `group_id` mediumint(8) unsigned NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
	  KEY `fk_users_groups_users1_idx` (`user_id`),
	  KEY `fk_users_groups_groups1_idx` (`group_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1")or die(mysql_error());

	 header("Refresh:2; url=?part2=query", true, 303);
	exit();

}



?>

