<div class="form-group">
	<label class="field"><strong><?= $field['name'] ?></strong> 
		<?php if(isset($stored_data) && !empty($stored_data->{$field['complete_name']})){ ?>
			<small><strong>&nbsp;&nbsp;<a href="<?= base_url() ?>uploads/files/<?= $stored_data->{$field['complete_name']} ?>" target="_blank"><i class="pe-7s-file"></i> <?= $this->lang->line('current_file') ?></a> <button class="btn btn-default btn-sm delete-file" rel="tooltip" data-original-title="Delete file" data-delete="<?= $field['complete_name'] ?>"><i class="pe-7s-close"></i></button></strong></small>
		<?php } ?>
		
	</label>
	<br>
	<input id="<?= $field['complete_name'] ?>" class="path-file form-control" placeholder="<?= $field['name'] ?>" disabled="disabled" />
	<button class="btn btn-default btn-sm clear-file" rel="tooltip" data-original-title="Delete file" data-clear="<?= $field['complete_name'] ?>"><i class="pe-7s-close"></i></button>
	<div class="fileUpload btn btn-default btn-fill">
	    <span><?= $this->lang->line('select_a_file') ?></span>
	    <input id="upload-<?= $field['complete_name'] ?>" type="file" data-type="file" class="upload" name="<?= $field['complete_name'] ?>" />
	</div>
</div><hr>
<script>
	$("#upload-<?= $field['complete_name'] ?>").on('change', function(){
		$("#<?= $field['complete_name'] ?>").val( $(this).val() );
	})

	$('.clear-file').click(function(e){
		e.preventDefault();
		var name = $(this).attr('data-clear'),
			input = $('#upload-'+name)
		input.replaceWith(input.val('').clone(true));
		$('#'+name).val('');
	})

	$('.delete-file').click(function(e) {
		e.preventDefault();

		var data = {},
			icon = $(this);

		data['table'] = $('input[name="current_table"]').val();
		data['record'] = $('input[name="record_id"]').val();
		data['field'] = $(icon).data('delete');
		
		$.ajax({
		  	url: $('#base_url').val()+'administrable_tables/delete_field_file',
		  	method: 'post',
		  	data: data
		}).done(function() {
			$(icon).parent().parent().fadeOut(0);
		})
		
	});
</script>