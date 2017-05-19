				<section id="footer-bar">
					<div class="row">
						<div class="span3">
							<h4>Site</h4>
							<ul class="nav">
								<li><a href="{{ url('/') }}">Trang Chủ</a></li>  
								<li><a href="/contact">Liên Hệ</a></li>
								<li><a href="/cart">Giỏ Hàng</a></li>
								@if(Auth::guest())
									<li><a href="{!! url('login') !!}">Đăng Nhập</a></li>
								@else
								<li><a href="{!! url('home') !!}">Quản Lý</a></li>
								@endif						
							</ul>					
						</div>
						<div class="span5">
							<p class="logo"><h1>Shop Hoa Cỏ May</h1></p>
							<p>Shop được thiết kế dựa trên giao diện có sẵn, ý tưởng đơn giản bởi <strong>Minh IT</strong></p>
							<p><i>Giới thiệu qua : </i><b>Minh IT</b> là 1 người sống <u>NỘI TÂM</u> thích màu <b style="color:purple">Tím</b>, nhưng cũng <u>MẠNH MẼ</u> vì cũng thích màu <b style="color:pink">Hồng</b></p>
						</div>					
					</div>	
				</section>
				<section id="copyright">
					<span>Bản quyền của ai thì kệ mẹ họ</span>
				</section>