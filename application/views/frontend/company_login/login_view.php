<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<?php
$met_des     = $met_des; 
	$met_key     = $met_des; 
	$title       = $title; 

if(!isset($page_data))
{


$met_des     = $met_des; 
	$met_key     = $met_des; 
	$title       = $title; 
}
else
{
	if($page_data->num_rows()>0)
	{
		$page_row=$page_data->row();
		
		$met_des  = $page_row->page_meta_desc;
		$met_key  = $page_row->page_meta_keywords;
		$title    = $page_row->page_meta_title;
	}
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=$met_des?>">
<meta name="keywords" content="<?=$met_key?>">
<title>
<?=$title?>
</title>
<!-- Styles -->
<link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

<!-- Favicons -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">
</head>

<body class="login-page">
<main>
  <div class="login-block"> <img src="<?=base_url()?>assets/img/logo.png" alt="">
    <h1>
      <?=$this->lang->line('login_txt')?>
    </h1>
    <div id="login_error" style="color:#ef4d42;"></div>
    <?php if($this->session->flashdata('msg') != "") {?>
    <div id="login_error" style="color:#32740E;"><?php echo $this->session->flashdata('msg'); ?></div>
    <?php 
	$this->session->set_flashdata('msg', "");
 } ?>
    <form action="#" name="login_form" id="login_form" method="post">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input type="text" class="form-control" placeholder="Email" name="user_email">
        </div>
      </div>
      <hr class="hr-xs">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="user_password">
        </div>
      </div>
      <button class="btn btn-primary btn-block" type="submit" onClick="return user_login();">
      <?=$this->lang->line('login')?>
      </button>
      <div class="login-footer"> 
        <!-- <h6>Or login with</h6>
            <ul class="social-icons">
              <li><a class="facebook" href=""><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>--> 
      </div>
    </form>
  </div>
  <div class="login-links"> <a class="pull-left" href="<?=base_url()?>forget_password">
    <?=$this->lang->line('forget')?>
    </a> <a class="pull-right" href="<?=base_url()?>Sregister">
    <?=$this->lang->line('reg_txt')?>
    </a> </div>
</main>

<!-- Scripts --> 
<script src="<?=base_url()?>assets/js/app.min.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script> 
<script>

function user_login(){
$('#error').html('');
$('#success').html('');
$.ajax({

		type: "post",
		url: "<?=base_url()?>Login/login_user",
		data : $( "#login_form").serialize(), 
		cache: false,
		success: function(html){
	    var r=JSON.parse(html); 
		                                                                                                    
        var  bo=r['log_error'];		
		
		if(bo=='no'){
	
		document.location.href='<?=base_url()?>Home';
		
		}
		else{
				$('#login_error').html(bo);
		}
		}		
});
return false;
}
</script>
</body>
</html>
