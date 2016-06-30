<div class="container">
        <div class="row center">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">English</a></li>
                    <li><a href="#profile" data-toggle="tab">Khmer</a></li>
                </ul>
                <?php
                	echo form_open('con_articles/do_add_article');
                ?>
                <div class="tab-content">
                	
                    <div class="tab-pane active container" id="home">
                    	<div style="padding:8px;" class="form-horizontal">
                    		<div class="form-group">
							    <label for="inputPassword3" class="col-sm-3 control-label">Title</label>
							    <div class="col-sm-3">
								    <input type="text" name="txt_article_title_en" class="form-control" />
							    </div>
						   	</div>
						   	<div class="form-group">
							    <label for="inputEmail3" class="col-sm-3 control-label">Information Title English<sup style="color:red; font-weight:bold;">*</sup></label>
							    <div class="col-sm-3">
							    	<select name="info_title_en" class="form-control" required>
							    		<option value="">select</option>
							    		<?php
							    			foreach ($get_menu_en->result() as $list_en) {
							    				echo '<option value="'. $list_en->men_id .'">'. $list_en->men_name .'</option>';
							    			}
							    		?>
							    	</select>
							    </div>
						   	</div>
						   
						  
						   	<div class="form-group">
							    <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
							    <div class="col-sm-3">
								    <textarea class="form-control" name="txt_des_en"></textarea>
							    </div>
						   	</div>
						   	
						</div>
                    </div>

                    <div class="tab-pane container" id="profile">
                    	<div style="padding:8px;" class="form-horizontal">
                    		<div class="form-group">
							    <label for="inputPassword3" class="col-sm-3 control-label">Title</label>
							    <div class="col-sm-3">
								    <input type="text" name="txt_article_title_kh" class="form-control" />
							    </div>
						   	</div>
						   	<div class="form-group">
							    <label for="inputEmail3" class="col-sm-3 control-label">Information Title Khmer<sup style="color:red; font-weight:bold;">*</sup></label>
							    <div class="col-sm-3">
							    	<select name="info_title_kh" class="form-control" required>
							    		<option value="">select</option>
							    		<?php
							    			foreach ($get_menu_kh->result() as $list_kh) {
							    				echo '<option value="'. $list_kh->men_id .'">'. $list_kh->men_name .'</option>';
							    			}
							    		?>
							    	</select>
							    </div>
						   	</div>
						   
						   
						   	<div class="form-group">
							    <label for="inputPassword3" class="col-sm-3 control-label">Description</label>
							    <div class="col-sm-3">
									<textarea class="form-control" name="txt_des_kh"></textarea>
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