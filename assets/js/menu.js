$(function () {

	//menu
	$('.tombolTambahData').on('click', function () {

		$('#formModalLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Add');
		$('#menu').val('');
		$('#id').val('');

	});

	$('.tampilModalUbah').on('click', function () {

		$('#formModalLabel').html('Edit Data');
		$('.modal-footer button[type=submit]').html('Edit Data');
		$('.modal-body form').attr('action', 'http://localhost/asrama/menu/editmenu');

		const id = $(this).data('id');


		$.ajax({
			url: 'http://localhost/asrama/menu/getubahmenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#menu').val(data.menu);
				$('#id').val(data.id);

			}
		});

	});


});
