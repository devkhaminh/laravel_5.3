@extends('theme.master')
@section('content')
<section class="main-content">
	
	<div class="row">						
		<div class="span9">								
			<ul class="thumbnails listing-products">
				@foreach($tag as $item)
				<li class="span3">
					<div class="product-box">
						<span class="sale_tag"></span>												
						<a href="{!! url('thong-tin-san-pham',[$item['id'],$item['alias']]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item['image']) !!}"></a><br/>
						<a href="#" class="title">{!! $item['name'] !!}</a><br/>
						<a href="#" class="category">{!! $item['intro'] !!}</a>
						<p class="price">{!! number_format($item["price"],0,",",".") !!} VNĐ</p>
					</div>
				</li>   
				@endforeach    
			</ul>								
			<hr>
		</div>
		<div class="span3 col">
			<div class="block">	
				<ul class="nav nav-list">
					<li class="nav-header">Đồ nữ</li>
					<?php
					$menu_level_1_nu = DB::table('cates')->where('parent_id',1)->get();
					?>
					@foreach($menu_level_1_nu as $item_level_1_nu)
					<li><a href="{!! url('san-pham',[$item_level_1_nu->alias]) !!}">{!! $item_level_1_nu->name !!}</a></li>
					@endforeach
					<li class="nav-header">Đồ nam</li>
					<?php
					$menu_level_1_nam = DB::table('cates')->where('parent_id',2)->get();
					?>
					@foreach($menu_level_1_nam as $item_level_1_nam)
					<li><a href="{!! url('san-pham',[$item_level_1_nam->alias]) !!}">{!! $item_level_1_nam->name !!}</a></li>
					@endforeach	
				</ul>
				<br/>
			</div>
		</div>
	</div>
</section>
@endsection