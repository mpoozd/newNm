<section class="bg-img bg-repeat no-overlay section-sm" style="background-image: url(<?=base_url()?>assets/img/bg-pattern.png)">
        <div class="container">

          <div class="row">
            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="<?=$jobs->num_rows()?>"></span><?php if($jobs->num_rows()!=0){ echo '+';} ?></p>
              <h6><?=$this->lang->line('job_name')?></h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="<?=$seekers->num_rows()?>"></span><?php if($seekers->num_rows()!=0){ echo '+';} ?></p>
              <h6><?=$this->lang->line('members')?></h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="<?=$resume->num_rows()?>"></span><?php if($resume->num_rows()!=0){ echo '+';} ?></p>
              <h6><?=$this->lang->line('resume_name')?></h6>
            </div>

            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="<?=$companies->num_rows()?>"></span><?php if($companies->num_rows()!=0){ echo '+';} ?></p>
              <h6><?=$this->lang->line('footer_company')?></h6>
            </div>
          </div>

        </div>
      </section>