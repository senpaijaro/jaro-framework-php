<?php 

Route::set('index.php', function (){
	$data = Welcome::ListOfUser();
	Welcome::view('index',$data);
});


