$(function () {
	//kamar
	$('.tombolTambahDataKamar').on('click', function () {

		$('#formModalLabelKamar').html('Tambah Kamar baru');
		$('#no_kamar').attr('readonly', false);
		$('.modal-footer button[type=submit]').html('Add');
		$('.modal-body form').attr('action', 'http://localhost/asrama/kamar');
		$('#no_kamar').val('');
		$('#kapasitas').val('');
		$('#id').val('');

	});

	$('.tampilModalUbahKamar').on('click', function () {

		$('#formModalLabelKamar').html('Edit Data Kamar');
		$('#no_kamar').attr('readonly', true);
		$('.modal-footer button[type=submit]').html('Edit Data');
		$('.modal-body form').attr('action', 'http://localhost/asrama/kamar/editkamar');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/asrama/kamar/getubahkamar',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#no_kamar').val(data.no_kamar);
				$('#kapasitas').val(data.kapasitas);
				$('#id').val(data.id);

			}
		});

	});
});
