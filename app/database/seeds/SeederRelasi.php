<?php

# Sesuaikan nama class dengan nama file yang dibuat
class SeederRelasi extends Seeder {

	public function run() {

		# Kosongin isi tabel
		DB::table('mahasiswa')->delete();
		DB::table('wali')->delete();

		/***********************************
		 *** SIAPKAN SEEDER DOSEN DISINI ***
		 ***********************************/
		DB::table('dosen')->delete();

		# Tambahkan data dosen
		$dosen = Dosen::create(array(
			'nama' => 'Yulianto',
			'nipd' => '1234567890'));

		$this->command->info('Data dosen telah diisi!');

		# Kemudian tambahkan nilai id_dosen ditiap record mahasiswa 

		/* Kita akan membuat 3 orang mahasiswa sebagai sampel
		 * Disinilah alasan kenapa saya membuat model terlebih dahulu
		 * Karena saya memanfaatkan model untuk mengcreate record
		 */

		# Mahasiswa Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
		$novay = Mahasiswa::create(array(
			'nama' => 'Noviyanto Rachmadi',
			'nim'  => '1015015072',
			'id_dosen' => $dosen->id));

		# Mahasiswa Kedua bernama Djaffar. Dengan NIM 1015015088.
		$dije = Mahasiswa::create(array(
			'nama' => 'Djaffar',
			'nim'  => '1015015088',
			'id_dosen' => $dosen->id));

		# Mahasiswa Ketiga bernama Puji Rahayu. Dengan NIM 1015015078.
		$ayu = Mahasiswa::create(array(
			'nama' => 'Puji Rahayu',
			'nim'  => '1015015078',
			'id_dosen' => $dosen->id));

		# Informasi ketika mahasiswa telah diisi.
		$this->command->info('Mahasiswa telah diisi!');

		/* 
		 * Disini kita akan menggunakan ketiga variabel yang kita 
		 * deklarasikan diatas, '$novay', '$dije', '$ayu'
		*/

		# Ciptakan wali si $novay
		Wali::create(array(
			'nama'  => 'Achmad S',
			'id_mahasiswa' => $novay->id
		));
		# Ciptakan wali si $dije
		Wali::create(array(
			'nama'  => 'Entahlah',
			'id_mahasiswa' => $dije->id
		));
		# Ciptakan wali si $ayu
		Wali::create(array(
			'nama'  => 'Arianto',
			'id_mahasiswa' => $ayu->id
		));

		# Informasi ketika semua wali telah diisi.
		$this->command->info('Data mahasiswa dan wali telah diisi!');


		/***********************************
		 *** SIAPKAN SEEDER HOBI DISINI  ***
		 ***********************************/

		# Bersihkan tabel yang dibutuhkan
		DB::table('hobi')->delete();
		DB::table('mahasiswa_hobi')->delete();

		# Isi tabel hobi
		$mandi_hujan = Hobi::create(array('hobi' => 'Mandi Hujan'));
		$baca_buku = Hobi::create(array('hobi' => 'Baca Buku'));

		# Hubungkan Mahasiswa dengan Hobinya masing-masing
		$novay->hobi()->attach($mandi_hujan->id);
		$novay->hobi()->attach($baca_buku->id);
		$dije->hobi()->attach($mandi_hujan->id);
		$ayu->hobi()->attach($baca_buku->id);

		# Tampilkan pesan ini bila berhasil diisi
		$this->command->info('Mahasiswa beserta Hobi telah diisi!');

	}
}