@extends('landing.master')
@section('content')

	<!-- START SECTION TOP -->
	<section class="section-top">
		<div class="container">
			<div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
				<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
					data-wow-offset="0">
					<h1>
									{{ $item->name }}<br>
									Type : <span class="text-primary">{{ ucfirst($itemType) }}</span>
								</h1>
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
					<div class="property_single_details_slide" style="width: 100%; height: 500px; overflow: hidden; border-radius: 8px;">
						<img src="{{ Storage::url($item->image) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="About-Slide">
					</div>
					<div class="property_single_details_price">
<h1>{{ $item->name }}</h1>
							@php
								$price = $itemType === 'attraction' ? $item->ticket_price : $item->price_range;
							@endphp
							<h4>Rp. {{ number_format((float) $price, 0, ',', '.') }}</h4>
						
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
				
							<input type="hidden" name="reviewable_type" value="{{ $modelClass }}">
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
									<div class="rating-input" style="display: flex; gap: 8px; font-size: 28px; margin: 10px 0;">
										@for($i = 1; $i <= 5; $i++)
											<input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
												style="display: none;" {{ old('rating') == $i ? 'checked' : '' }}>
											<label for="star{{ $i }}" title="{{ $i }} star(s)" 
												style="cursor: pointer; color: #ddd; transition: all 0.2s ease; display: flex; align-items: center; padding: 5px; border-radius: 4px;"
												onmouseover="ratingHover({{ $i }})"
												onmouseout="ratingOut()">
												<i class="fa fa-star"></i>
											</label>
										@endfor
									</div>
									<script>
										function ratingHover(rating) {
											const container = document.querySelector('.rating-input');
											const labels = container.querySelectorAll('label');
											labels.forEach((label, index) => {
												const labelRating = index + 1;
												if (labelRating <= rating) {
													label.style.color = '#ffc107';
													label.style.backgroundColor = 'rgba(255, 193, 7, 0.1)';
												} else {
													label.style.color = '#ddd';
													label.style.backgroundColor = 'transparent';
												}
											});
										}
										function ratingOut() {
											const container = document.querySelector('.rating-input');
											const labels = container.querySelectorAll('label');
											const checkedInput = container.querySelector('input[type="radio"]:checked');
											labels.forEach((label, index) => {
												const labelRating = index + 1;
												if (checkedInput && labelRating <= parseInt(checkedInput.value)) {
													label.style.color = '#ffc107';
													label.style.backgroundColor = 'rgba(255, 193, 7, 0.1)';
												} else {
													label.style.color = '#ddd';
													label.style.backgroundColor = 'transparent';
												}
											});
										}
										// Set initial state untuk rating yang sudah dipilih
										document.addEventListener('DOMContentLoaded', function() {
											const container = document.querySelector('.rating-input');
											const checkedInput = container.querySelector('input[type="radio"]:checked');
											if (checkedInput) {
												const rating = parseInt(checkedInput.value);
												const labels = container.querySelectorAll('label');
												labels.forEach((label, index) => {
													const labelRating = index + 1;
													if (labelRating <= rating) {
														label.style.color = '#ffc107';
														label.style.backgroundColor = 'rgba(255, 193, 7, 0.1)';
													}
												});
											}
										});
									</script>
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