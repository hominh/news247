@extends('fe.master')
@section('content')
	<div class="gap-40"></div>
	<section class="featured-post-area no-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-xs-12 pad-r">
					<div id="featured-slider" class="owl-carousel owl-theme featured-slider">
						@foreach($hotposttop as $item)
							<div class="item" style="background-image:url({!! asset($item->image)  !!})">
								<div class="featured-post">
									<div class="post-content">
										<a class="post-cat" href="#">{!! $item->cname !!}</a>
										<h2 class="post-title title-extra-large"><a href="#">{!! $item->intro !!}</a></h2>
										<span class="post-date">{!!  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y.m.d')  !!}</span>
									</div>
								</div>
							</div>
						@endforeach()
					</div><!-- Featured owl carousel end-->
				</div>
				<div class="col-md-5 col-xs-12 pad-l">
					<div class="row">
						<div class="col-sm-12">
							<div class="post-overaly-style contentTop hot-post-top clearfix">
								<div class="post-thumb">
									<a href="#"><img class="img-responsive" src="{!! $hotpost[0]->image !!}" alt="{!! $hotpost[0]->name !!}" /></a>
								</div>
								<div class="post-content">
						 			<a class="post-cat" href="#">{!! $hotpost[0]->cname  !!}</a>
						 			<h2 class="post-title title-large">
						 				<a href="#">{!! $hotpost[0]->name !!}</a>
						 			</h2>
						 			<span class="post-date">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y.m.d') !!}</span>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly end -->
						</div><!-- Col end -->
						<?php $stt = 0; ?>
						@foreach($hotpost as $item)
							<?php $stt = $stt + 1; ?>
							@if($stt != 1)
								<div class="col-sm-6 pad-r-small">
									<div class="post-overaly-style contentTop hot-post-bottom clearfix">
										<div class="post-thumb">
												<a href="#"><img class="img-responsive" src="{!! $item->image !!}" alt="{!! $hotpost[0]->name !!}" /></a>
										</div>
										<div class="post-content">
											<a class="post-cat" href="#">{!! $item->cname  !!}</a>
											<h2 class="post-title title-medium">
												<a href="#">{!! $item->name !!}</a>
											</h2>
										</div><!-- Post content end -->
									</div><!-- Post Overaly end -->
								</div><!-- Col end -->
							@endif()
						@endforeach()
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="latest-news block color-red">
						<h3 class="block-title"><span>Latest News</span></h3>
						<div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
							@foreach($lastestpost as $item)
							<div class="item">
								<ul class="list-post">
									<li class="clearfix">
											<div class="post-block-style clearfix">
												<div class="post-thumb">
													<a href="#"><img class="img-responsive" src="{!! $item->image !!}" alt="{!! $item->name !!}" /></a>
												</div>
												<a class="post-cat" href="#">{!! $item->cname !!}</a>
												<div class="post-content">
													<h2 class="post-title title-medium">
														<a href="#">{!! $item->name !!}</a>
													</h2>
													<div class="post-meta">
														<span class="post-author"><a href="#">{!! $item->uname !!}</a></span>
														<span class="post-date">{!!  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y.m.d') !!}</span>
													</div>
												</div><!-- Post content end -->
											</div><!-- Post Block style end -->
										</li><!-- Li end -->
										<div class="gap-30"></div>
								</ul>
							</div>
							@endforeach()
						</div>
					</div>
					<div class="gap-50"></div>

					<div class="featured-tab color-blue">
						<h3 class="block-title"><span>Technology</span></h3>
						<ul class="nav nav-tabs">
							<?php $stt = 0; ?>
							@foreach($subcategories_tech as $item)
							<?php $stt = $stt + 1; $class = ""; ?>
							@if($stt == 1)
								<li class="active">
							@endif()
							@if($stt > 1)
								<li>
							@endif()
								<a class="animated fadeIn" href="#{!! $item->name !!}" data-toggle="tab">
									<span class="tab-head">
										<span class="tab-text-title">{!! $item->name !!}</span>
									</span>
								</a>
							</li>
							@endforeach()
						</ul>
						<div class="tab-content">
							@if(count($gadgetposts) > 0)
							<div class="tab-pane active animated fadeInRight" id="{!! $gadgetposts[0]->cname !!}">
							@endif()
							@if(count($gadgetposts) == 0)
							<div class="tab-pane active animated fadeInRight" id="tab_a">
							@endif()
								<div class="row">
									@foreach($gadgetposts as $item)
									<div class="col-md-6 col-sm-6">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#"><img class="img-responsive" src="{!! $item->image !!}" alt="{!! $item->name !!}" /></a>
											</div>
											<a class="post-cat" href="#">{!! $item->cname !!}</a>
											<div class="post-content">
												<h2 class="post-title">
									 				<a href="#">{!! $item->name !!}</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">{!! $item->uname !!}</a></span>
									 				<span class="post-date">{!! $item->created_at !!}</span></span>
									 			</div>
									 			<p>{!! $item->intro !!}</p>
											</div>
										</div>
									</div>
									@endforeach()
								</div>
							</div>
							<div class="tab-pane animated fadeInRight" id="tab_b">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="images/news/tech/game1.jpg" alt="" />
												</a>
											</div>
											<a class="post-cat" href="#">Games</a>
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="#">Historical heroes and robot dinosaurs: New games on our... </a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="#">John Doe</a></span>
									 				<span class="post-date">Feb 24, 2017</span>
									 			</div>
									 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
								 			</div><!-- Post content end -->
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="list-post-block">
											<ul class="list-post">
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="images/news/tech/game2.jpg" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Lindie game plonks players in front of huge starship command cent…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="images/news/tech/game2.jpg" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Lindie game plonks players in front of huge starship command cent…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="images/news/tech/game2.jpg" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
												 			<h2 class="post-title title-small">
												 				<a href="#">Lindie game plonks players in front of huge starship command cent…</a>
												 			</h2>
												 			<div class="post-meta">
												 				<span class="post-date">Feb 13, 2017</span>
												 			</div>
											 			</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->
												<li class="clearfix">
													<div class="post-block-style post-float clearfix">
														<div class="post-thumb">
															<a href="#">
																<img class="img-responsive" src="images/news/tech/game2.jpg" alt="" />
															</a>
														</div><!-- Post thumb end -->

														<div class="post-content">
															<h2 class="post-title title-small">
																<a href="#">Lindie game plonks players in front of huge starship command cent…</a>
															</h2>
															<div class="post-meta">
																<span class="post-date">Feb 13, 2017</span>
															</div>
														</div><!-- Post content end -->
													</div><!-- Post block style end -->
												</li><!-- Li 1 end -->
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">
						<div class="widget">
							<h3 class="block-title">
								<span>Follow Us</span>
							</h3>
							<ul class="social-icon">
								<li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>
								<div class="post-overaly-style clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-responsive" src="{!! $popularnews[0]->image !!}" alt="{!! $popularnews[0]->name !!}"  />
										</a>
									</div>

									<div class="post-content">
							 			<a class="post-cat" href="#">{!! $popularnews[0]->cname !!}</a>
							 			<h2 class="post-title">
							 				<a href="#">{!! $popularnews[0]->name !!}</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-date">{!! $popularnews[0]->created_at !!}</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div>
							<div class="list-post-block">
								<ul class="list-post">
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="images/news/tech/gadget3.jpg" alt="">
												</a>
												<a class="post-cat" href="#">Gadgets</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Mar 13, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li>
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-responsive" src="images/news/tech/gadget3.jpg" alt="">
												</a>
												<a class="post-cat" href="#">Gadgets</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Mar 13, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li>
								</ul>
							</div>
						</div>
						<div class="widget text-center">
							<img class="banner img-responsive" src="images/banner-ads/ad-sidebar.png" alt="">
						</div>
						<div class="widget color-default m-bottom-0">
							<h3 class="block-title"><span>Trending News</span></h3>
							<div id="post-slide" class="owl-carousel owl-theme post-slide">
								<div class="item">
									<div class="post-overaly-style text-center clearfix">
									   <div class="post-thumb">
									      <a href="#">
									         <img class="img-responsive" src="images/news/tech/gadget1.jpg" alt="" />
									      </a>
									   </div><!-- Post thumb end -->

									   <div class="post-content">
									      <a class="post-cat" href="#">Gadgets</a>
									      <h2 class="post-title">
									         <a href="#">The best MacBook Pro alternatives in 2017 for Appl…</a>
									      </h2>
									      <div class="post-meta">
									         <span class="post-date">Feb 06, 2017</span>
									      </div>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article 1 end -->
									<div class="post-overaly-style text-center clearfix">
									   <div class="post-thumb">
									      <a href="#">
									         <img class="img-responsive" src="images/news/tech/gadget1.jpg" alt="" />
									      </a>
									   </div><!-- Post thumb end -->

									   <div class="post-content">
									      <a class="post-cat" href="#">Gadgets</a>
									      <h2 class="post-title">
									         <a href="#">The best MacBook Pro alternatives in 2017 for Appl…</a>
									      </h2>
									      <div class="post-meta">
									         <span class="post-date">Feb 06, 2017</span>
									      </div>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article 1 end -->
								</div>
								<div class="item">
									<div class="post-overaly-style text-center clearfix">
									   <div class="post-thumb">
									      <a href="#">
									         <img class="img-responsive" src="images/news/tech/gadget1.jpg" alt="" />
									      </a>
									   </div><!-- Post thumb end -->

									   <div class="post-content">
									      <a class="post-cat" href="#">Gadgets</a>
									      <h2 class="post-title">
									         <a href="#">The best MacBook Pro alternatives in 2017 for Appl…</a>
									      </h2>
									      <div class="post-meta">
									         <span class="post-date">Feb 06, 2017</span>
									      </div>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article 1 end -->
									<div class="post-overaly-style text-center clearfix">
									   <div class="post-thumb">
									      <a href="#">
									         <img class="img-responsive" src="images/news/tech/gadget1.jpg" alt="" />
									      </a>
									   </div><!-- Post thumb end -->

									   <div class="post-content">
									      <a class="post-cat" href="#">Gadgets</a>
									      <h2 class="post-title">
									         <a href="#">The best MacBook Pro alternatives in 2017 for Appl…</a>
									      </h2>
									      <div class="post-meta">
									         <span class="post-date">Feb 06, 2017</span>
									      </div>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article 1 end -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
			  	<div class="col-md-4">
					<div class="block color-dark-blue">
						<h3 class="block-title">
							<span>Travel</span>
						</h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-responsive" src="images/news/lifestyle/travel1.jpg" alt="">
								</a>
							</div>
							<div class="post-content">
								<h2 class="post-title">
									<a href="#">10 Hdrenaline fuelled activities that will chase the…</a>
								</h2>
								<div class="post-meta">
									<span class="post-date">Mar 03, 2017</span>
								</div>
							</div>
						</div>
						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block color-dark-blue">
						<h3 class="block-title">
							<span>Travel</span>
						</h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-responsive" src="images/news/lifestyle/travel1.jpg" alt="">
								</a>
							</div>
							<div class="post-content">
								<h2 class="post-title">
									<a href="#">10 Hdrenaline fuelled activities that will chase the…</a>
								</h2>
								<div class="post-meta">
									<span class="post-date">Mar 03, 2017</span>
								</div>
							</div>
						</div>
						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block color-dark-blue">
						<h3 class="block-title">
							<span>Travel</span>
						</h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-responsive" src="images/news/lifestyle/travel1.jpg" alt="">
								</a>
							</div>
							<div class="post-content">
								<h2 class="post-title">
									<a href="#">10 Hdrenaline fuelled activities that will chase the…</a>
								</h2>
								<div class="post-meta">
									<span class="post-date">Mar 03, 2017</span>
								</div>
							</div>
						</div>
						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="images/news/lifestyle/travel2.jpg" alt="">
											</a>
										</div>
										<div class="post-content">
											<h2 class="post-title title-small">
												<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
											</h2>
											<div class="post-meta">
												<span class="post-date">Mar 13, 2017</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="block-wrapper video-block">
		<div class="container">
			<div class="row">
				<div class="video-tab clearfix">
					<h2 class="video-tab-title">Watch Now</h2>
					<div class="col-md-7 pad-r-0">
						<div class="tab-content">
							<?php $stt = 0; ?>
							@foreach($videos as $item)
								<?php $stt = $stt + 1; $active = ""; ?>
								@if($stt == 1)
									<div class="tab-pane active animated fadeIn" id="video{!! $item->id !!}">
								@endif()

								@if($stt > 1)
									<div class="tab-pane animated fadeIn" id="video{!! $item->id !!}">
								@endif()
									<div class="post-overaly-style clearfix">
									   <div class="post-thumb">
											<img class="img-responsive" src="{!! $item->thumb !!}" alt="{!! $item->name !!}"  />
											<a class="popup" href="{!! $item->url !!}">
						                  <div class="video-icon">
						                  	<i class="fa fa-play"></i>
						               	</div>
						            	</a>
									   </div><!-- Post thumb end -->
									   <div class="post-content">
									      <a class="post-cat" href="#">Video</a>
									      <h2 class="post-title">
									         <a href="#">{!! $item->name !!}</a>
									      </h2>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article end -->
								</div>
							@endforeach()
						</div>
					</div>
					<div class="col-md-5 pad-l-0">
						<ul class="nav nav-tabs">
							<?php $stt = 0; ?>
							@foreach($videos as $item)
								<?php $stt = $stt + 1; ?>
								<?php $active = ""; ?>	
								@if($stt == 1)
									<li class="active">
								@endif()

								@if($stt > 1)
									<li>
								@endif()
										<a class="animated fadeIn" href="#video{!! $item->id !!}" data-toggle="tab">
								  			<div class="post-thumb">
										        <img class="img-responsive" src="{!! $item->thumb !!}" alt="{!! $item->name !!}"  />
										   </div><!-- Post thumb end -->
								  			<h3>{!! $item->name !!}</h3>
								  		</a>
									</li>
							@endforeach()
						</ul>
					</div><!--Tab nav col end -->
				</div>
			</div>
		</div>
	</section>
	<section class="block-wrapper p-bottom-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="more-news block color-default">
						<h3 class="block-title"><span>Feature News</span></h3>
						<div id="more-news-slide" class="owl-carousel owl-theme more-news-slide">
							<div class="item">
								@foreach($featureposts as $item)
									<div class="post-block-style post-float-half clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-responsive" src="{!! $item->image !!}" alt="{!! $item->name !!}"  />
											</a>
										</div>
										<a class="post-cat" href="#">{!! $item->cname !!}</a>
										<div class="post-content">
								 			<h2 class="post-title">
								 				<a href="#">{!! $item->name !!}</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-author"><a href="#">{!! $item->uname !!}</a></span>
								 				<span class="post-date">{!! $item->created_at !!}</span>
								 			</div>
								 			<p>{!! $item->intro !!}</p>
							 			</div><!-- Post content end -->
									</div><!-- Post Block style 1 end -->
									<div class="gap-30"></div>
								@endforeach()
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">
						<div class="widget color-default">
							<h3 class="block-title"><span>Latest Reviews</span></h3>
							<div class="list-post-block">
								<ul class="list-post review-post-list">
									@foreach($reviews as $item)
										<li class="clearfix">
											<div class="post-block-style post-float clearfix">
												<div class="post-thumb">
													<a href="#">
														<img class="img-responsive" src="{!! $item->image !!}" alt="{!! $item->name !!}"  />
													</a>
												</div><!-- Post thumb end -->

												<div class="post-content">
										 			<h2 class="post-title">
										 				<a href="#">{!! $item->name !!}</a>
										 			</h2>
										 			<div class="post-meta">
										 				<div class="review-stars">
										 					<i class="fa fa-star"></i>
										 					<i class="fa fa-star"></i>
										 					<i class="fa fa-star"></i>
										 					<i class="fa fa-star-half-o"></i>
										 					<i class="fa fa-star-o"></i>
										 				</div>
										 			</div><!-- Post meta end -->
									 			</div><!-- Post content end -->
											</div><!-- Post block style end -->
										</li><!-- Li 1 end -->

									@endforeach()
								</ul><!-- List post end -->
							</div>
						</div>
						<div class="widget m-bottom-0">
							<h3 class="block-title"><span>Newsletter</span></h3>
							<div class="ts-newsletter">
								<div class="newsletter-introtext">
									<h4>Get Updates</h4>
									<p>Subscribe our newsletter to get the best stories into your inbox!</p>
								</div>

								<div class="newsletter-form">
									<form action="#" method="post">
										<div class="form-group">
											<input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off">
											<button class="btn btn-primary">Subscribe</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ad-content-area text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img class="img-responsive" src="images/banner-ads/ad-content-two.png" alt="">
				</div>
			</div>
		</div>
	</section>

@endsection
