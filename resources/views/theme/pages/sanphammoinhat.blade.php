@extends('theme.master')
@section('content')
<style type="text/css">
	@keyframes  random {
		10% { color: red; } 
		20% { color: orange; } 
		30% { color: yellow; } 
		40% { color: green; }
		50% { color: #0CF7E0; }
		60% { color: #0CCCF7; }
		70% { color: #0C66F7; }
		80% { color: #0C2CF7; }
		90% { color: #B90CF7; }
	}
	#title{color: #fff;
		-webkit-animation: random 10s infinite;
		animation: random 10s infinite;
		text-align: center;
		font-size: 150%;
		}
		.title{margin-bottom: 30px; font-size: 120%; text-align: center; color: #F70CCC;}
	</style>
<section class="main-content">
	<p id="title">Mời bạn tham khảo 8 sản phẩm <b>Mới Nhất</b> tại Shop Cỏ May</p>
	<p class="title">Xem thêm nhiều sản phẩm khác ở từng danh mục <br>Đăng nhập để xem chi tiết</p>
	<div class="row">						
		<div class="span9">								
			<ul class="thumbnails listing-products">
				@foreach($tag as $item)
				<li class="span3">
					<div class="product-box">
						<span class="sale_tag"></span>												
						<a href="product_detail.html"><img alt="" src="{!! asset('resources/upload/'.$item['image']) !!}"></a><br/>
						<a href="product_detail.html" class="title">{!! $item['name'] !!}</a><br/>
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