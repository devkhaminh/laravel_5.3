@extends('theme.master')
@section('content')
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<a href="{!! asset('resources/upload/'.$detail->image) !!}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{!! asset('resources/upload/'.$detail->image) !!}"></a>												
					<ul class="thumbnails small">
					@foreach($image as $img_detail)								
						<li class="span1">
							<a href="{!! asset('resources/upload/detail/'.$img_detail->image) !!}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{!! asset('resources/upload/detail/'.$img_detail->image) !!}" alt=""></a>
						</li>
					@endforeach
					</ul>
				</div>
				<div class="span5">
					<address>
						<strong>Tên Sản Phẩm:</strong> <span>{!! $detail->name !!}</span><br>
						<strong>Sản phẩm dành cho:</strong> <span>{!! $detail->keywords !!}</span><br>		
					</address>									
					<h4><strong>Giá: {!! number_format($detail["price"],0,",",".") !!} VNĐ</strong></h4>
				</div>					
			</div>
			<div class="row">
				<div class="span9">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Mô Tả Sản Phẩm</a></li>
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home">{!! $detail->description !!}</div>
						<div class="tab-pane" id="profile">
							<table class="table table-striped shop_attributes">	
								<tbody>
									<tr class="">
										<th>Size</th>
										<td>Large, Medium, Small, X-Large</td>
									</tr>		
									<tr class="alt">
										<th>Colour</th>
										<td>Orange, Yellow</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>							
				</div>						
				<div class="span9">	
					<br>
					<h4 class="title">
						<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
						</span>
					</h4>
{{-- 					<div id="myCarousel-1" class="carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/6.jpg"></a><br/>
											<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
											<a href="#" class="category">Suspendisse aliquet</a>
											<p class="price">$341</p>
										</div>
									</li>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/5.jpg"></a><br/>
											<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
											<a href="#" class="category">Phasellus consequat</a>
											<p class="price">$341</p>
										</div>
									</li>       
									<li class="span3">
										<div class="product-box">												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
											<a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
											<a href="#" class="category">Erat gravida</a>
											<p class="price">$28</p>
										</div>
									</li>												
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a><br/>
											<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
											<a href="#" class="category">Phasellus consequat</a>
											<p class="price">$341</p>
										</div>
									</li>       
									<li class="span3">
										<div class="product-box">												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
											<a href="product_detail.html">Praesent tempor sem</a><br/>
											<a href="#" class="category">Erat gravida</a>
											<p class="price">$28</p>
										</div>
									</li>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a><br/>
											<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
											<a href="#" class="category">Suspendisse aliquet</a>
											<p class="price">$341</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
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