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
	//	$title    = $page_row->page_meta_title;
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
  <div class="login-block"> <img src="assets/img/logo.png" alt="">
    <h1>
      <?=$this->lang->line('forget_label')?>
    </h1>
    <div id="forget_error" style="color:#ef4d42;"></div>
    <form action="#" name="forget_form" id="forget_form" method="post">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input type="text" class="form-control" placeholder="Email" name="user_email">
        </div>
      </div>
      <button class="btn btn-primary btn-block" type="submit" onClick="return forget_pass();">
      <?=$this->lang->line('submit')?>
      </button>
    </form>
  </div>
  <div class="login-links">
    <p class="text-center"><a href="<?=base_url()?>Login">
      <?=$this->lang->line('back_login')?>
      </a></p>
  </div>
</main>

<!-- Scripts --> 
<script src="<?=base_url()?>assets/js/app.min.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script> 
<script type="text/javascript">
function forget_pass(){
$('#error').html('');
$('#success').html('');

$.ajax({

		type: "post",
		url: "<?=base_url()?>Login/forget_pass",
		data : $( "#forget_form").serialize(), 
		cache: false,
		success: function(html){
	   var  r=JSON.parse(html);                                                                                                     
		var  bo=r['log_error'];		
		if(bo=='no'){
		document.location.href='<?=base_url()?>Login';
		}
		
		else{
			$('#forget_error').html(jQuery(bo).text());
			//$('#error').html(bo);
		}
		}		
});
return false;
}
</script>
</body>
</html>
