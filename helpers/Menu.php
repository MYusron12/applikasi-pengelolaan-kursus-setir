<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'alur_pendaftaran', 
			'label' => 'Alur Pendaftaran', 
			'icon' => '<i class="fa fa-align-center "></i>'
		),
		
		array(
			'path' => '', 
			'label' => 'Jadwal Kursus', 
			'icon' => '<i class="fa fa-table "></i>','submenu' => array(
		array(
			'path' => 'jadwal_kursus/add', 
			'label' => 'Tambah Jadwal Kursus', 
			'icon' => ''
		),
		
		array(
			'path' => 'jadwal_kursus', 
			'label' => 'Laporan jadwal kursus', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'profile_tempat_kursus', 
			'label' => 'Profile Tempat Kursus', 
			'icon' => '<i class="fa fa-globe "></i>'
		),
		
		array(
			'path' => '', 
			'label' => 'Formulir Pendaftaran', 
			'icon' => '<i class="fa fa-pencil-square-o "></i>','submenu' => array(
		array(
			'path' => 'formulir_pendaftaran/add', 
			'label' => 'Tambah Formulir Pendaftaran', 
			'icon' => ''
		),
		
		array(
			'path' => 'formulir_pendaftaran', 
			'label' => 'Laporan Formulir Pendaftaran', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'paket_kursus', 
			'label' => 'Paket Kursus', 
			'icon' => '<i class="fa fa-comment-o "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'Pengelolaan User', 
			'icon' => '<i class="fa fa-smile-o "></i>','submenu' => array(
		array(
			'path' => 'user/add', 
			'label' => 'Tambah User Baru', 
			'icon' => ''
		),
		
		array(
			'path' => 'user', 
			'label' => 'Laporan User', 
			'icon' => ''
		),
		
		array(
			'path' => 'role_permissions', 
			'label' => 'Role Permisions', 
			'icon' => ''
		),
		
		array(
			'path' => 'roles', 
			'label' => 'Roles Id', 
			'icon' => ''
		)
	)
		)
	);
		
	
	
			public static $act_pertemuan_1 = array(
		array(
			"value" => "Tidak Ada Jadwal", 
			"label" => "Tidak Ada Jadwal", 
		),
		array(
			"value" => "Belum Selesai", 
			"label" => "Belum Selesai", 
		),
		array(
			"value" => "Sudah Selesai", 
			"label" => "Sudah Selesai", 
		),);
		
}