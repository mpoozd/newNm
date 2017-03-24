<section class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span><?=$this->lang->line('cat_title_head')?></span>
            <h2><?=$this->lang->line('cat_title_popular')?></h2>
            <p><?=$this->lang->line('cat_title_popular_below')?></p>
          </header>

          <div class="category-grid">
          <?php $cats_show  =  $this->General_model->select_where('cat_name,cat_sef,cat_desc','categories',array('status_id'=>1));
   $cats_showres = $cats_show->result_array();
 ?>
   <?php foreach($cats_showres as $cats_showres): ?>
            
             
            <a href="javascript:;">
              <i class="fa fa-laptop"></i>
              <h6><?=$cats_showres['cat_name']?></h6>
              <p><?=$cats_showres['cat_desc']?></p>
            </a>
<?php endforeach; ?>
          
          </div>

        </div>
      </section>