<?php 

Route::set('index.php', function (){
	Welcome::view('index');
});

Route::set('about-us', function (){
	$data = AboutUsContrl::listUser();
	AboutUsContrl::view('about-us',$data);
});

Route::set('contact-us', function (){
	AboutUs::view('contact-us');
});