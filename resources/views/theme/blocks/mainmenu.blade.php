				<section class="navbar main-menu">
					<div class="navbar-inner main-menu">				
						<a href="index.html" class="logo pull-left"><h1 id="text_logo">Shop <i>Cỏ May</i></h1></a>
						<nav id="menu" class="pull-right">
							<ul>
								<li>
									<a href="{{ url('/') }}">Trang Chủ</a>
								</li>
								<li><a href="{!! url('san-pham-nu') !!}">Đồ Nữ</a>					
									<ul>
										<?php
										$menu_level_1 = DB::table('cates')->where('parent_id',1)->get();
										?>
										@foreach($menu_level_1 as $item_level_1)
										<li><a href="{!! url('san-pham',[$item_level_1->alias]) !!}">{!! $item_level_1->name !!}</a></li>
										@endforeach							
									</ul>
								</li>			
								<li><a href="{!! url('san-pham-nam') !!}">Đồ Nam</a>
									<ul>
										<?php
										$menu_level_1 = DB::table('cates')->where('parent_id',2)->get();
										?>							
										@foreach($menu_level_1 as $item_level_1)
										<li><a href="{!! url('san-pham',[$item_level_1->alias]) !!}">{!! $item_level_1->name !!}</a></li>
										@endforeach	
									</ul>
								</li>
								<li><a href="{!! url('san-pham-moi-nhat') !!}">Sản Phẩm Mới Nhất</a></li>
								<li><a href="{!! url('san-pham-re-nhat') !!}">Sản Phẩm Giá Rẻ</a></li>
							</ul>
						</nav>
					</div>
				</section>