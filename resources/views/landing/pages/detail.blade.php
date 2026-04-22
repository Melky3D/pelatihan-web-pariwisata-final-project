@extends('landing.master')
@section('content')

	<!-- START SECTION TOP -->
	<section class="section-top">
		<div class="container">
			<div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
				<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
					data-wow-offset="0">
					<h1>{{ $item->name }}</h1>
				</div><!-- //.HERO-TEXT -->
			</div><!--- END COL -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END SECTION TOP -->

	<!-- START SINGLE PROPERTY DETAILS -->
	<section class="property_single_details section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="property_single_details_slide">
						<img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="About-Slide">
					</div>
					<div class="property_single_details_price">
						<h1>{{ $item->name }}</h1>
						<h4>Rp. {{ $itemType === 'attraction' ? number_format((float)$item->ticket_price, 0, ',', '.') : number_format((float)$item->price_range, 0, ',', '.') }}</h4>
						<ul>
							<li><i class="fa fa-check"></i> {{ ucfirst($itemType) }} Rating</li>
							<li><i class="fa fa-check"></i> Type: {{ ucfirst($itemType) }}</li>
						</ul>
					</div>
					<div class="property_single_details_description">
						<h4>About This {{ ucfirst($itemType) }}</h4>
						<p>{{ $item->description }}</p>
					</div>
					<div class="property_info">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="single_property_list">
									<h4>Reviews</h4>
									@if($approvedReviews->count() > 0)
										@foreach($approvedReviews as $review)
											<div class="review-item" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
												<div style="margin-bottom: 10px;">
													<strong>{{ $review->visitor_name }}</strong>
													<div style="color: #ffc107;">
														@for($i = 0; $i < $review->rating; $i++)
															<i class="fa fa-star"></i>
														@endfor
														@for($i = $review->rating; $i < 5; $i++)
															<i class="fa fa-star-o"></i>
														@endfor
													</div>
												</div>
												<p style="margin: 0; color: #666;">{{ $review->comment }}</p>
												<small style="color: #999;">{{ $review->created_at->format('d M Y') }}</small>
											</div>
										@endforeach
									@else
										<p style="color: #999;">No reviews yet. Be the first to share your experience!</p>
									@endif
								</div>
							</div>
						</div>
					</div>
				
				</div><!--- END COL -->
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="single_property_form">
						<h4>Share Your Review</h4>
						@if($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						@if(session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
						@endif
						<form class="form" method="POST" action="{{ route('reviews.store') }}">
							@csrf
				
							<input type="hidden" name="reviewable_type" value="{{ $itemType === 'attraction' ? 'App\\Models\\Attractions' : 'App\\Models\\Zone' }}">
							<input type="hidden" name="reviewable_id" value="{{ $item->id }}">
							<div class="row">
								<div class="form-group col-md-12">
									<input type="text" name="visitor_name" class="form-control" id="first-name"
										placeholder="Name" required="required" value="{{ old('visitor_name') }}">
								</div>
								<div class="form-group col-md-12">
									<input type="email" name="visitor_email" class="form-control" id="email" placeholder="Email"
										required="required" value="{{ old('visitor_email') }}">
								</div>
								<div class="form-group col-md-12">
									<label>Rating</label>
									<div class="rating-input">
										@for($i = 1; $i <= 5; $i++)
											<input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
												{{ old('rating') == $i ? 'checked' : '' }}>
											<label for="star{{ $i }}" title="{{ $i }} star(s)">
												<i class="fa fa-star"></i>
											</label>
										@endfor
									</div>
									@error('rating')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group col-md-12 mbnone">
									<textarea rows="6" name="comment" class="form-control" id="description"
										placeholder="Your Review" required="required">{{ old('comment') }}</textarea>
									@error('comment')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-12">
									<div class="actions">
										<input type="submit" value="Submit Review" name="submit" id="submitButton"
											class="btn btn-lg btn-contact-bg" title="Submit Your Review!" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div><!--- END COL -->
			</div>
		</div>
	</section>
	<!-- START SINGLE PROPERTY DETAILS -->


@endsection