@extends('layouts.app')

@section('content')
	<div class="title m-b-md">
        Employee Availability Result
    </div>

    <div class="links">
    	<a class="backLink" href={{ route('home') }}>Back </a> <br /> <br />

    	<?php
    		if(isset($result)){
    			foreach($result as $slot){
    				echo $slot . "<br />";
    			}
    		}
    	?>
	</div>
@endsection