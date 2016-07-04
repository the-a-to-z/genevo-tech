<a class="logo" href="">
    <img src="<?php echo base_url(); ?>templates/front_end/img/header/logo1-default.png" alt="Logo">
</a>
<div class="topbar">
    <ul class="loginbar pull-right">
        <li>
         	<?php
         		echo anchor('pages/about', "About US");
         	?>
        </li>  
        
        <li>
        	<?php
        		echo anchor('pages/product', 'PRODUCT');
        	?>
        </li>  
      
        <li><a href="">Contuct US</a></li>  
       
        <li><span class="icon_serch_btn"><i  class="icon_search fa fa-search" ></i></span><input type="text" class="input_search"  /> </li>  
    </ul>
</div>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="fa fa-bars"></span>
</button>