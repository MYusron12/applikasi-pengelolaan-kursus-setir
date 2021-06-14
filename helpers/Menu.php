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
			'label' => 'Tambah Jadwal ', 
			'icon' => '<i class="fa fa-plus-circle "></i>'
		),
		
		array(
			'path' => 'jadwal_kursus', 
			'label' => 'Laporan Jadwal ', 
			'icon' => '<i class="fa fa-calendar-plus-o "></i>'
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
			'label' => 'Tambah Formulir', 
			'icon' => '<i class="fa fa-plus-circle "></i>'
		),
		
		array(
			'path' => 'formulir_pendaftaran', 
			'label' => 'Laporan Formulir', 
			'icon' => '<i class="fa fa-calendar-plus-o "></i>'
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
			'label' => 'Tambah User', 
			'icon' => '<i class="fa fa-plus-circle "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'Laporan User', 
			'icon' => '<i class="fa fa-calendar-plus-o "></i>'
		),
		
		array(
			'path' => 'role_permissions', 
			'label' => 'Role Permisions', 
			'icon' => '<i class="fa fa-plug "></i>'
		),
		
		array(
			'path' => 'roles', 
			'label' => 'Roles Id', 
			'icon' => '<i class="fa fa-user-plus "></i>'
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