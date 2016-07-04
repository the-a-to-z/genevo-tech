
<div class="row">
	<div class="col-xs-12">
		<?php
			echo anchor('con_product/add_product', '<span class="btn btn-primary btn-sm">Add New</span>');
		?>

		<div style="clear: both;margin-bottom: 5px;"></div>
		<table  class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No</th>
          <th>Image</th>
					<th>Product Name</th>
					<th>Description</th>
					<th>Language</th>
					<th>Date Created</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
			</thead>
      <tbody>
        <?php
          $i = 1;
          foreach ($get_product->result() as $row) {
        ?>
        <tr>
          <td class="center"><?php echo $i; ?></td>
          <td><img src="<?php echo base_url().'templates/front_end/img/body/'.$row->pro_image; ?>" class="img-responsive" alt="img"/></td>
          <td><?php echo $row->pro_name; ?></td>
          <td width="300"><?php echo $row->pro_detail; ?></td>
          <td><?php echo $row->pro_lang; ?></td>
          <td><?php echo substr($row->pro_date_created, 0, -9); ?></td>
          <td><?php echo ( $row->pro_status ) ? '<span class="label label-primary" >Active</span>' : '<span class="label label-warning	">Disactive</span>' ; ?></td>
          <td>
						<div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="<?php echo site_url('con_product/edit_product').'/'.$row->pro_id.'/'.$row->pro_lang ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a onclick="return confirm('Are you sure?')" class="red" href="<?php echo site_url('con_product/delete_product').'/'.$row->pro_id; ?>">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>


					</td>
        </tr>
        <?php
          $i++;
          } ?>
      </tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
