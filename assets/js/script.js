//sweetalert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
		title: 'Congretulation!',
		text: flashData,
		type: 'success'

	});
}

const flashDataGagal = $('.flash-data-gagal').data('flashdatagagal');

if (flashDataGagal) {
	Swal.fire({
		title: 'Oops!',
		text: flashDataGagal,
		type: 'error'

	});
}

const validationErrors = $('.validation-errors').data('validationerrors');
if (validationErrors) {
	$('#formModal').modal('show');
}

const validationErrorsPk = $('.validation-errors-pk').data('validationerrorspk');

if (validationErrorsPk) {
	$('#formModal').modal('show');
}


$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href')
	Swal.fire({
		title: 'Apakah anda yakin',
		text: "",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});


//image name aktif
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});


// jika kosong tombol add tidk berfungsi
// $(document).ready(function () {
// 	$('.tombolTambahDataPenghuniKamar').on('click', function (e) {
// 		e.preventDefault();
// 	});
// });

// $(document).ready(function () {
// 	$('#tobolTambahDataPenghuniKamar').attr('disabled', true);

// 	$('#name').keyup(function () {
// 		if ($(this).val().length != 0)
// 			$('#tobolTambahDataPenghuniKamar').attr('disabled', false);
// 	});
// });

// autofill/complete
function autofill() {
	var email = $('#email').val();


	$.ajax({
		url: 'http://localhost/asrama/penghuni/getpenghuniajax',
		data: {
			email: email
		},
		method: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#id').val(data.id);
			$('#name').val(data.name);
			$('#semester').val(data.semester);
			$('#universitas').val(data.universitas);
			$('#date_created').val(data.date_created);
		}
	});
	return false
}

function autofill1() {
	var id = $('#no_kamar').val();


	$.ajax({
		url: 'http://localhost/asrama/penghuni/getkamarajaxnokamar',
		data: {
			no_kamar: id
		},
		method: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#id_kamar').val(data.id);

		}
	});
	return false
}

function autofill3() {
	var id = $('#no_kamar').val();

	$.ajax({
		url: 'http://localhost/asrama/pindahkamar/getkamarajaxnokamar',
		data: {
			no_kamar: id
		},
		method: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#id_kamar').val(data.id);

		}
	});
	return false
}


function autofill4() {
	var id = $('#kamar_sekarang').val();
	$.ajax({
		url: 'http://localhost/asrama/pindahkamar/getkamarajaxnokamar',
		data: {
			no_kamar: id
		},
		method: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#id_kamar_sekarang').val(data.id);

		}
	});
	return false
}


function tes() {
	var email = $('#email').val();
	$.ajax({
		url: 'http://localhost/asrama/pembayaran/getpenghunikamarajax',
		data: {
			email: email
		},
		method: 'post',
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#penghuni_kamar').val(data.id);
			$('#name').val(data.name_penghuni);
			$('#no_kamar').val(data.no_kamar_penghuni);
			$('#date_created').val(data.tgl_masuk);

		}
	});
	return false
}
