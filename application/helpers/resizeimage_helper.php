<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function resizeImage($source_image_path,$source_image_name,$width,$height)
      {    
            $CI = &get_instance(); 
            $config['image_library']  =  'gd2';
            $config['source_image']   =  $source_image_path.$source_image_name;
            $config['create_thumb']   =  false;
            $config['maintain_ratio'] =  TRUE;
            $config['quality']        =  '100%';
            $config['thumb_maker']    =  '';
            $config['new_image']      =  $source_image_path.'thumbs/'.$source_image_name;   
            $config['width']          =  $width;
            $config['height']         =  $height;
            $CI->load->library('image_lib', $config);
            $CI->image_lib->initialize($config);
            if ( ! $CI->image_lib->resize())
            {
              echo $CI->image_lib->display_errors();
            }
      }        


/* End of file resizeImage_helper.php */
/* Location: ./application/helpers/resizeimage_helper.php */
