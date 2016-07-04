<div class="container">
  <div class="page-header">
      <h1 style="font-size: 20px;">
          Edit Product
      </h1>
  </div>
	<?php
		foreach ($get_article->result() as $row) {
		echo form_open_multipart('con_product/do_edit_product/'. $row->pro_id.'/'.$row->pro_lang);
	?>
	<div style="padding:8px;" class="form-horizontal">
		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Product Name</label>
		    <div class="col-sm-3">
			    <input type="text" value="<?php echo $row->pro_name; ?>" name="pro_name" class="form-control" />
		    </div>
	   	</div>
      <div class="form-group">
  		    <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
  		    <div class="col-sm-3">
  			    <input type="file" value="" name="img_product" class="form-control" />
            <input type="hidden" name="old_img_product" value="<?php echo $row->pro_image;?>" />

  		    </div>
            <div class="col-sm-3">
              <img src="<?php echo base_url().'templates/front_end/img/body/'.$row->pro_image; ?>" class="img-reponsive" style="width:47px"/>
            </div>
  	   </div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
		    <div class="col-sm-3">
			    <textarea class="form-control" rows="5" name="txt_des_en"><?php echo $row->pro_detail; ?></textarea>
		    </div>
	   	</div>
	   	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">&nbsp;</label>
		    <div class="col-sm-3">
			    <button type="submit" class="btn btn-primary btn-sm">Update</button>
		    </div>
	   	</div>
	</div>
	<?php
		echo form_close();
		}
	?>

</div>
