<div class="container">
        <div class="row center">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">English</a></li>
                    <li><a href="#profile" data-toggle="tab">Khmer</a></li>
                </ul>
                <?php
                	echo form_open_multipart('con_product/add_product');
                ?>
                <div class="tab-content">

                    <div class="tab-pane active container" id="home">
                    	<div style="padding:8px;" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-3">
                              <input type="file" value="" name="img_product" class="form-control" />
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-3">
                              <input type="text" value="" name="pro_name_en" class="form-control" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-3">
                              <textarea class="form-control" rows="5" name="txt_des_en"></textarea>
                            </div>
                          </div>
						          </div>
                    </div>
                    <div class="tab-pane container" id="profile">
                    	<div style="padding:8px;" class="form-horizontal">
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Product Name</label>
                          <div class="col-sm-3">
                            <input type="text" value="" name="pro_name_kh" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-3">
                            <textarea class="form-control" rows="5" name="txt_des_kh"></textarea>
                          </div>
                        </div>
						          </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                    	<button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                    <br/>
                </div>
                <?php
                	echo form_close();
                ?>
            </div>
        </div>
</div>
