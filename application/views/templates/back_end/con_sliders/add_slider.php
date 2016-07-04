<script type="text/javascript">
	function CheckColors(val)
	{
	 var elementColorCode=document.getElementById('bgColorDiv');
	 var elementUrl=document.getElementById('urlDiv');
	 var elementColorCodebg2=document.getElementById('bgColorDiv2');
	 var elementUrl2=document.getElementById('urlDiv2');
	 var elementTextButton2=document.getElementById('textButtonDiv2');
	 var elementColorCode2=document.getElementById('ColorDiv2');
	 
		 if(val=='button')
		 {
			elementColorCode.style.display='block';
			elementUrl.style.display='block';
			elementColorCodebg2.style.display='none';
			elementUrl2.style.display='none';
			elementTextButton2.style.display='none';
			elementColorCode2.style.display='none';
		 }
		 else if(val=='button_one'){
		    elementColorCode.style.display='block';
			elementUrl.style.display='block';
			elementColorCodebg2.style.display='block';
			elementUrl2.style.display='block';
			elementTextButton2.style.display='block';
			elementColorCode2.style.display='block';
		}
		else{
		   elementColorCode.style.display='none';
		   elementUrl.style.display='none';
		   elementColorCodebg2.style.display='none';
			elementUrl2.style.display='none';
			elementTextButton2.style.display='none';
			elementColorCode2.style.display='none';
		}
	}

</script> 
<div class="container">
	<div class="page-header">
        <h1 style="font-size: 20px;">
            Add SlideShow
        </h1>
    </div>
	<div class="col-md-12">
	<?php
		echo form_open_multipart('con_sliders/add_slider','class="form-horizontal"');
	?>     
	
		<!--Image SlideShow-->
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Image</label>
			<div class="col-sm-3">
			  <input type="file" value="" name="img_slider" class="form-control" />
			</div>
		 </div>
		 <!--title SlideShow-->
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Title</label>
			<div class="col-sm-7">
			  <input type="text" value="" name="titleSlider" class="form-control" />
			</div>
		 </div>
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Title Text Color</label>
			<div class="col-sm-3">
			  <input type="color" value="#000000" name="titleSliderColor" class="form-control" />
			</div>
		 </div>
		 <!--Label SlideShow-->
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Label</label>
			<div class="col-sm-7">
			  <input type="text" value="" name="labelSlider" class="form-control" />
			</div>
		 </div>
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Label Text Color</label>
			<div class="col-sm-3">
			  <input type="color" value="#000000" name="labelSliderColor" class="form-control" />
			</div>
		 </div>
		 <!--text line 3 SlideShow-->
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Text Type</label>
			<div class="col-sm-3">
			  <input type="text" name="colorCode" id="color" style='display:none;'/>
			  <select name="type" class="form-control" onchange='CheckColors(this.value);'/>
				<option value="text">text</option>
				<option value="button">button</option>
				<option value="button_one">button_one</option>
			  </select>
			</div>
		 </div>
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Text</label>
			<div class="col-sm-7">
			  <input type="text" value="Text" name="textButton" id="textButton" class="form-control" />
			</div>
		 </div>
		 <div class="form-group" id="urlDiv" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">URL</label>
			<div class="col-sm-7">
			  <input type="text" value="" name="url" id="url" class="form-control" />
			</div>
		 </div>
		 <div class="form-group" id="bgColorDiv" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">Background Color</label>
			<div class="col-sm-3">
			  <input type="color" value="" name="bgColor" id="bgColor" class="form-control" />
			</div>
		 </div>
		 <div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Text Color</label>
			<div class="col-sm-3">
			  <input type="color" value="#000000" name="colorCode" class="form-control" />
			</div>
		 </div>
		 <!--Text Button 2-->
		 <div class="form-group" id="textButtonDiv2" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">Text Button</label>
			<div class="col-sm-7">
			  <input type="text" value="Button" name="textButton" id="textButton" class="form-control" />
			</div>
		 </div>
		 <div class="form-group" id="urlDiv2" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">URL</label>
			<div class="col-sm-7">
			  <input type="text" value="" name="url" id="url" class="form-control" />
			</div>
		 </div>
		 <div class="form-group" id="bgColorDiv2" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">Background Color</label>
			<div class="col-sm-3">
			  <input type="color" value="" name="bgColor" id="bgColor" class="form-control" />
			</div>
		 </div>
		 <div class="form-group" id="ColorDiv2" style="display: none;">
			<label for="inputPassword3" class="col-sm-3 control-label">Text Color</label>
			<div class="col-sm-3">
			  <input type="color" value="#000000" name="colorCode" class="form-control" />
			</div>
		 </div>
		 
		 
		 
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Menu</label>
			<div class="col-sm-2">
			  <?php
				foreach($get_menu_en->result() as $valueMenu){
					echo '<div class="checkbox"><label><input name="menu_name[]" value="'.$valueMenu->men_id.'" type="checkbox" />&nbsp;'.$valueMenu->men_name.'</label></div>';
				}
			  ?>
			</div>
			<div class="col-sm-2">
			  <?php
				foreach($get_menu_kh->result() as $valueMenuKh){
					
					echo '<div class="checkbox"><label><input name="menu_name[]" value="'.$valueMenuKh->men_id.'" type="checkbox" />&nbsp;'.$valueMenuKh->men_name.'</label></div>';
				}
			  ?>
			</div>
		</div> 
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
			</div>
		</div>
		<br/>        
	<?php
		echo form_close();
	?>   
	</div>
</div>
