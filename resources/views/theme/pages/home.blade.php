@extends('theme.master')
@section('content')


<section class="main-content">
	<div class="row">
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Sản Phẩm <strong>Mới Nhất</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">
									@foreach($product1 as $item1)											
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! url('thong-tin-san-pham',[$item1->id,$item1->alias]) !!}"><img src="{!! asset('resources/upload/'.$item1['image']) !!}" alt="" /></a></p>
											<a href="product_detail.html" class="title">{!! $item1['name'] !!}</a><br/>
											<a href="products.html" class="category">{!! $item1->intro !!}</a>
											<p class="price">{!! number_format($item1["price"],0,",",".") !!} VNĐ</p>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails">
									@foreach($product2 as $item2)											
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! url('thong-tin-san-pham',[$item2->id,$item2->alias]) !!}"><img src="{!! asset('resources/upload/'.$item2['image']) !!}" alt="" /></a></p>
											<a href="product_detail.html" class="title">{!! $item2['name'] !!}</a><br/>
											<a href="products.html" class="category">{!! $item2->intro !!}</a>
											<p class="price">{!! number_format($item2["price"],0,",",".") !!} VNĐ</p>
										</div>
									</li>
									@endforeach																															
								</ul>
							</div>
						</div>							
					</div>
				</div>						
			</div>
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Sản Phẩm <strong>Giá Rẻ</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">												
									@foreach($product3 as $item3)											
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! url('thong-tin-san-pham',[$item3->id,$item3->alias]) !!}"><img src="{!! asset('resources/upload/'.$item3['image']) !!}" alt="" /></a></p>
											<a href="product_detail.html" class="title">{!! $item3['name'] !!}</a><br/>
											<a href="products.html" class="category">{!! $item3->intro !!}</a>
											<p class="price">{!! number_format($item3["price"],0,",",".") !!} VNĐ</p>
										</div>
									</li>
									@endforeach	
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails">
									@foreach($product4 as $item4)											
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! url('thong-tin-san-pham',[$item4->id,$item4->alias]) !!}"><img src="{!! asset('resources/upload/'.$item4['image']) !!}" alt="" /></a></p>
											<a href="product_detail.html" class="title">{!! $item4['name'] !!}</a><br/>
											<a href="products.html" class="category">{!! $item4->intro !!}</a>
											<p class="price">{!! number_format($item4["price"],0,",",".") !!} VNĐ</p>
										</div>
									</li>
									@endforeach																																		
								</ul>
							</div>
						</div>							
					</div>
				</div>						
			</div>
			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="{!! url('public/theme/themes/images/feature_img_2.png') !!}" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="{!! url('public/theme/themes/images/feature_img_1.png') !!}" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="{!! url('public/theme/themes/images/feature_img_3.png') !!}" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>		
		</div>				
	</div>
</section>
@endsection