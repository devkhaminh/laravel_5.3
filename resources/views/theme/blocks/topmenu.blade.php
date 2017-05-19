			<div id="top-bar" class="container">
				<div class="row">
					<div class="span4">
						<form method="POST">
							<input type="text" class="input-block-level search-query" placeholder="Ví dụ: Áo">
						</form>
					</div>
					<div class="span8">
						<div class="account pull-right">
							<ul class="user-menu">
								@if(Auth::guest())			
								<li><a href="{!! url('login') !!}">Đăng nhập để xem chi tiết</a></li>
								@endif
								<li><a href="cart.html">Giỏ Hàng</a></li>
								<!-- <li><a href="checkout.html">Checkout</a></li>					 -->
								<!-- <li><a href="register.html">Login</a></li>		 -->
							</ul>
						</div>
					</div>
				</div>
			</div>