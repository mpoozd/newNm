<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81665853-1', 'auto');
  ga('send', 'pageview');

</script>

    <script type="text/javascript">
      window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
        heap.load("13771043");
  </script>
  
<!-- start Mixpanel --><script type="text/javascript">(function(e,a){if(!a.__SV){var b=window;try{var c,l,i,j=b.location,g=j.hash;c=function(a,b){return(l=a.match(RegExp(b+"=([^&]*)")))?l[1]:null};g&&c(g,"state")&&(i=JSON.parse(decodeURIComponent(c(g,"state"))),"mpeditor"===i.action&&(b.sessionStorage.setItem("_mpcehash",g),history.replaceState(i.desiredHash||"",e.title,j.pathname+j.search)))}catch(m){}var k,h;window.mixpanel=a;a._i=[];a.init=function(b,c,f){function e(b,a){var c=a.split(".");2==c.length&&(b=b[c[0]],a=c[1]);b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,
0)))}}var d=a;"undefined"!==typeof f?d=a[f]=[]:f="mixpanel";d.people=d.people||[];d.toString=function(b){var a="mixpanel";"mixpanel"!==f&&(a+="."+f);b||(a+=" (stub)");return a};d.people.toString=function(){return d.toString(1)+".people (stub)"};k="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(h=0;h<k.length;h++)e(d,k[h]);a._i.push([b,c,f])};a.__SV=1.2;b=e.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";c=e.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}})(document,window.mixpanel||[]);
mixpanel.init("6a488ebf16e386083ff9464a733e59ba");

$(document).ready(function(){
mixpanel.track('Viewed' + document.title , {
    'page name' : document.title,
    'url' : window.location.pathname
});

});


</script><!-- end Mixpanel -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
<script>
window['_fs_debug'] = false;
window['_fs_host'] = 'www.fullstory.com';
window['_fs_org'] = '1J9VQ';
window['_fs_namespace'] = 'FS';
(function(m,n,e,t,l,o,g,y){
  if (e in m && m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].'); return;}
  g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
  o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
  y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
  g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
  g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
  g.clearUserCookie=function(d,i){d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
  ';path=/;expires='+new Date(0);i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}
})(window,document,window['_fs_namespace'],'script','user');
</script>


  </head>

<div class="pull-right">

      <div class="dropdown user-account">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
        
        
         <?php
          if($this->session->userdata('jobseeker_login')!=''){
			  $jos_id = get_info('user_info','jos_id');
			   $image= $this->General_model->get_field_value('jos_id',$jos_id,'image','jobseekers');
			   if($image!=''){
				   
				   ?>
                    <img src="<?=base_url()?>uploads/jobseekers/<?=$image?>" alt="avatar">
                      
				   <?php }else{
			  ?>
            <img src="<?=base_url()?>assets/img/logo-envato.png" alt="avatar">
          <?php }?>
          <?php } else if($this->session->userdata('company_login')!=''){
			  $com_id = get_info('company_info','com_id');
			   $com_logo= $this->General_model->get_field_value('com_id',$com_id,'com_logo','companies');
			   if($com_logo!=''){
				   ?>
                              <img src="<?=base_url()?>uploads/company_logo/<?=$com_logo?>" alt="avatar">
				   <?php }else{
			  ?>
           <img src="<?=base_url()?>assets/img/logo-google.jpg" alt="avatar">
         <?php }}
		  else{?>
			      
			  <?php }
		  ?>
        
         
        </a>
<?php $login_bit_y = $this->session->userdata('company_login');
if($login_bit_y!=''){
							
								
										$com_id = get_info('company_info','com_id');?>
                                        
                                        <ul class="dropdown-menu dropdown-menu-right">
          
           <li><a <?php if(isset($post_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job"><?=$this->lang->line('post_job')?></a></li>
<!--            <li><a <?php  if(isset($pack_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Package"><?=$this->lang->line('pkg_pur')?></a></li>--> 
              <li><a <?php if(isset($mng_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job/manage_jobs"><?=$this->lang->line('manage_job')?></a></li>
              <li><a <?php if(isset($res_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job/manage_resume"><?=$this->lang->line('manage_resume')?></a></li>
<li><a <?php  if(isset($po_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Profilec"><?=$this->lang->line('profile_comp')?></a></li>
          <li><a  href="<?=base_url()?>logout"><?=$this->lang->line('logout')?></a></li>
       
        </ul>
								<?php
								
								 }else if($this->session->userdata('jobseeker_login')!=''){?>
									
									   <ul class="dropdown-menu dropdown-menu-right">
          <li><a <?php if(isset($po_bits)){ ?> class="active" <?php }?> href="<?=base_url()?>Sprofile"><?=$this->lang->line('profile_name')?></a></li>
           <li><a <?php if(isset($resm_bits)){ ?> class="active" <?php }?> href="<?=base_url()?>Resume"><?=$this->lang->line('edit_resume')?></a></li>
          <li><a <?php  if(isset($reg_bits)){ ?> class="active" <?php }?> href="<?=base_url()?>Sjob"><?=$this->lang->line('job_name')?></a></li>
          <li><a  href="<?=base_url()?>logout"><?=$this->lang->line('logout')?></a></li>
       
        </ul>
									 
								<?php	 }
									 else{?>
										 
        <div class="pull-right user-login">
          <a class="btn btn-sm btn-primary" href="<?=base_url()?>Sregister">سجل الآن</a> أو &rlm; <a href="<?=base_url()?>Login">تسجيل دخول</a>
        </div>
						<?php			 }
									 ?>
        
      </div>

    </div>