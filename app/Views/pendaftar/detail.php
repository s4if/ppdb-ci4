<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Pendaftar</title>
</head>
<body>
	Username: <?=$reg->getUsername();?><br>
<form method="POST" action="<?=base_url('/pendaftar/detail');?>">
	<label>Nomor Induk Kependudukan: </label><input type="text" name="nik" value="<?=$data['nik']?>"><br>
	<label>Nomor Kartu Keluarga: </label><input type="text" name="nkk" value="<?=$data['nkk']?>"><br>
	<label>Nomor Akte Kelahiran: </label><input type="text" name="nak" value="<?=$data['nak']?>"><br>
	<label>Tempat Lahir: </label><input type="text" name="birth_place" value="<?=$data['birth_place']?>"><br>
	<label>Tanggal Lahir: </label><input type="date" name="birth_date"
		min="1998-01-01" max="2020-12-31"  value="<?=(is_null($data['birth_date'])?'':$data['birth_date']->format('Y-m-d'))?>"><br>
	<label>Anak Ke: </label><input type="number" name="child_order" value="<?=$data['child_order']?>"><br>
	<label>Dari Berapa Bersaudara: </label><input type="number" name="siblings_count" value="<?=$data['siblings_count']?>"><br>
	<label>Dusun/Jalan: </label><input type="text" name="street" value="<?=$data['street']?>"><br>
	<label>RT: </label><input type="number" name="rt" value="<?=$data['rt']?>"><br>
	<label>RW: </label><input type="number" name="rw" value="<?=$data['rw']?>"><br>
	<label>Desa/Kelurahan: </label><input type="text" name="village" value="<?=$data['village']?>"><br>
	<label>Kecamatan: </label><input type="text" name="district" value="<?=$data['district']?>"><br>
	<label>Kota/Kabupaten: </label><input type="text" name="city" value="<?=$data['city']?>"><br>
	<label>Provinsi: </label><input type="text" name="province" value="<?=$data['province']?>"><br>
	<label>Negara: </label><input type="text" name="country" value="<?=$data['country']?>"><br>
	<label>Kode Pos: </label><input type="number" name="postal_code" value="<?=$data['postal_code']?>"><br>
	<label>Kondisi Keluarga: </label>
	<select id="family_condition" name="family_condition">
		<option value="lengkap">Lengkap</option>
		<option value="yatim">Ayah Meninggal (yatim)</option>
		<option value="piatu">Ibu Meninggal (piatu)</option>
		<option value="yatim piatu">Yatim piatu</option>
		<option value="cerai ikut ayah">Cerai ikut Ayah</option>
		<option value="cerai ikut ibu">Cerai ikut Ibu</option>
	</select><br>
	<label>Kewarganegaraan: </label>
	<select id="nationality" name="nationality">
		<option value="WNI">Warga Negara Indonesia</option>
		<option value="WNA">Warga Negara Asing</option>
	</select><br>
	<label>Agama: </label><input type="text" name="religion" value="<?=$data['religion']?>"><br>
	<div id="hs_wrap">
		<?php 
			$hss = explode(";", $data['hospital_sheets']);
			$hs1 = array_shift($hss);
		?>
		<div>
		<label>Riwayat Penyakit: </label><input type="text" name="hospital_sheets[]" value="<?=$hs1?>"><button id="hs_add">+</button><br></div>
	</div>
	<div id="pa_wrap">
		<?php 
			$pas = explode(";", $data['physical_abnormalities']);
			$pa1 = array_shift($pas);
		?>
		<div>
		<label>Kebutuhan Khusus: </label><input type="text" name="physical_abnormalities[]" value="<?=$pa1?>"><button id="pa_add">+</button><br></div>
	</div>
	<label>Tinggi Badan: </label><input type="number" name="height" value="<?=$data['height']?>"><br>
	<label>Berat Badan: </label><input type="number" name="weight" value="<?=$data['weight']?>"><br>
	<label>Lingkar Kepala: </label><input type="number" name="head_size" value="<?=$data['head_size']?>"><br>
	<label>Tinggal Bersama: </label>
	<select id="stay_with" name="stay_with">
		<option value="kedua orang tua">Kedua Orang Tua</option>
		<option value="ayah">Ayah</option>
		<option value="ibu">Ibu</option>
		<option value="saudara">Saudara (Kakak/Adik Kandung)</option>
		<option value="kakek dan nenek">Kakek dan Nenek</option>
		<option value="kakek">Kakek</option>
		<option value="nenek">Nenek</option>
		<option value="kerabat">Kerabat (Pak Dhe/Bu Dhe/Sepupu/Ipar)</option>
		<option value="wali">Wali</option>
	</select><br>
	<div id="hb_wrap">
		<?php 
			$hobbies = explode(";", $data['hobbies']);
			$hobby1 = array_shift($hobbies);
		?>
		<div><label>Hobi: </label><input type="text" name="hobbies[]" value="<?=$hobby1?>"><button id="hb_add">+</button><br></div>
	</div>
	<div id="ac_wrap">
		<?php 
			$acs = explode(";", $data['achievements']);
			$ac1 = array_shift($acs);
		?>
		<div>
		<label>Prestasi: </label><input type="text" name="achievements[]" value="<?=$ac1?>"><button id="ac_add">+</button><br></div>
	</div>
	<input type="submit" value="Simpan"> &nbsp; <a href="<?=base_url('/pendaftar')?>">Kembali</a>
</form>
<div style="display: none;">

	<!-- Template Hobi -->
	<div id="hb_tpl"><label>Hobi tambahan: </label><input type="text" class="hb_inp" name="hobbies[]"><button class="hb_del">-</button><br></div>
	
	<!-- Template Prestasi -->
	<div id="ac_tpl"><label>Prestasi tambahan: </label><input type="text" class="ac_inp" name="achievements[]"><button class="ac_del">-</button><br></div>

	<!-- Template Hospital Sheet -->
	<div id="hs_tpl"><label>Riwayat tambahan: </label><input type="text" class="hs_inp" name="hospital_sheets[]"><button class="hs_del">-</button><br></div>

	<!-- Template Physical Abnormalities -->
	<div id="pa_tpl"><label>Kebutuhan tambahan: </label><input type="text" class="pa_inp" name="physical_abnormalities[]"><button class="pa_del">-</button><br></div>
</div>
<script type="text/javascript">
window.addEventListener('load', function () { // execute when ready
	let fc_opt = document.querySelector('#family_condition');
	fc_opt.value = "<?=(is_null($data['family_condition'])?"":$data['family_condition']);?>";
	let nat_opt = document.querySelector('#nationality');
	nat_opt.value = "<?=(is_null($data['nationality'])?"":$data['nationality']);?>";
	let sw_opt = document.querySelector('#stay_with');
	sw_opt.value = "<?=(is_null($data['stay_with'])?"":$data['stay_with']);?>";
	// hobbies
	let hb_wrap = document.querySelector('#hb_wrap');
	let hb_add = document.querySelector('#hb_add');
	let insert_hb_addons = function (inp_value) {
		let hb_tpl = document.querySelector('#hb_tpl').cloneNode(true);
		let hb_del = hb_tpl.querySelector('.hb_del');
		let hb_inp = hb_tpl.querySelector('.hb_inp');
		hb_inp.value = inp_value;
		hb_del.onclick = function(e) {
			e.preventDefault();
			hb_del.parentElement.remove();
		};
		hb_wrap.appendChild(hb_tpl);
	};
	hb_add.onclick = function(e){
		e.preventDefault();
		insert_hb_addons("");
	};
	<?php 
	foreach ($hobbies as $hobby) {
		echo 'insert_hb_addons("'.$hobby.'");';
	}
	?>
	// end hobbies

	// achievements
	let ac_wrap = document.querySelector('#ac_wrap');
	let ac_add = document.querySelector('#ac_add');
	let insert_ac_addons = function (inp_value) {
		let ac_tpl = document.querySelector('#ac_tpl').cloneNode(true);
		let ac_del = ac_tpl.querySelector('.ac_del');
		let ac_inp = ac_tpl.querySelector('.ac_inp');
		ac_inp.value = inp_value;
		ac_del.onclick = function(e) {
			e.preventDefault();
			ac_del.parentElement.remove();
		};
		ac_wrap.appendChild(ac_tpl);
	};
	ac_add.onclick = function(e){
		e.preventDefault();
		insert_ac_addons("");
	};
	<?php 
	foreach ($acs as $ac) {
		echo 'insert_ac_addons("'.$ac.'");';
	}
	?>
	// end achievements

	// hospital_sheets
	let hs_wrap = document.querySelector('#hs_wrap');
	let hs_add = document.querySelector('#hs_add');
	let insert_hs_addons = function (inp_value) {
		let hs_tpl = document.querySelector('#hs_tpl').cloneNode(true);
		let hs_del = hs_tpl.querySelector('.hs_del');
		let hs_inp = hs_tpl.querySelector('.hs_inp');
		hs_inp.value = inp_value;
		hs_del.onclick = function(e) {
			e.preventDefault();
			hs_del.parentElement.remove();
		};
		hs_wrap.appendChild(hs_tpl);
	};
	hs_add.onclick = function(e){
		e.preventDefault();
		insert_hs_addons("");
	};
	<?php 
	foreach ($hss as $hs) {
		echo 'insert_hs_addons("'.$hs.'");';
	}
	?>
	// end hospital_sheets

	// physical_abnormalities
	let pa_wrap = document.querySelector('#pa_wrap');
	let pa_add = document.querySelector('#pa_add');
	let insert_pa_addons = function (inp_value) {
		let pa_tpl = document.querySelector('#pa_tpl').cloneNode(true);
		let pa_del = pa_tpl.querySelector('.pa_del');
		let pa_inp = pa_tpl.querySelector('.pa_inp');
		pa_inp.value = inp_value;
		pa_del.onclick = function(e) {
			e.preventDefault();
			pa_del.parentElement.remove();
		};
		pa_wrap.appendChild(pa_tpl);
	};
	pa_add.onclick = function(e){
		e.preventDefault();
		insert_pa_addons("");
	};
	<?php 
	foreach ($pas as $pa) {
		echo 'insert_pa_addons("'.$pa.'");';
	}
	?>
	// end physical_abnormalities

	// TODO: Hospital Sheet & Physical abnormalities
}, false);
</script>
</body>
</html>