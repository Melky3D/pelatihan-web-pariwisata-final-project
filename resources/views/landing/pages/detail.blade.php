@extends('landing.master')
@section('content')

	<!-- START SECTION TOP -->
	<section class="section-top">
		<div class="container">
			<div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
				<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
					data-wow-offset="0">
					<h1>Single Property</h1>
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
						<img src="{{ asset('storage/landing/assets/img/2.jpg') }}" class="img-fluid" alt="About-Slide">
					</div>
					<div class="property_single_details_price">
						<h1>2045 B Street</h1>
						<h4>$235,254</h4>
						<p>2369 Robinson Lane Jackson, OH 45640</p>
						<ul>
							<li><i class="fa fa-check"></i> 4 bed rooms</li>
							<li><i class="fa fa-check"></i> 1 garage</li>
							<li><i class="fa fa-check"></i> 960 sq ft</li>
						</ul>
					</div>
					<div class="property_single_details_description">
						<h4>Property description</h4>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
							been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
							galley of type and scrambled it to make a type specimen book. It has survived not only five
							centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
							It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
							passages, and more recently with desktop publishing software like Aldus PageMaker including
							versions of Lorem Ipsum.</p>
					</div>
					<div class="property_info">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="single_property_list">
									<h4>Amenities</h4>
									<ul class="single_property_list_mr">
										<li><i class="fa fa-check"></i> Video</li>
										<li><i class="fa fa-check"></i> Hairdryer</li>
										<li><i class="fa fa-check"></i> Cot</li>
										<li><i class="fa fa-check"></i> Dishwasher</li>
										<li><i class="fa fa-check"></i> Parquet</li>
										<li><i class="fa fa-check"></i> Iron</li>
									</ul>
									<ul class="single_property_list_mr">
										<li><i class="fa fa-check"></i> Air conditioning</li>
										<li><i class="fa fa-check"></i> Cable TV</li>
										<li><i class="fa fa-check"></i> Grill</li>
										<li><i class="fa fa-check"></i> Juicer</li>
										<li><i class="fa fa-check"></i> Use of pool</li>
										<li><i class="fa fa-check"></i> Toaster</li>
									</ul>
									<ul>
										<li><i class="fa fa-check"></i> Video</li>
										<li><i class="fa fa-check"></i> Hairdryer</li>
										<li><i class="fa fa-check"></i> Cot</li>
										<li><i class="fa fa-check"></i> Dishwasher</li>
										<li><i class="fa fa-check"></i> Parquet</li>
										<li><i class="fa fa-check"></i> Iron</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				
				</div><!--- END COL -->
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="single_property_form">
						<h4>Enquire here</h4>
						<form class="form" name="enq" method="post" action="contact.php"
							onsubmit="return validation();">
							<div class="row">
								<div class="form-group col-md-12">
									<input type="text" name="name" class="form-control" id="first-name"
										placeholder="Name" required="required">
								</div>
								<div class="form-group col-md-12">
									<input type="email" name="email" class="form-control" id="email" placeholder="Email"
										required="required">
								</div>
								<div class="form-group col-md-12">
									<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
										required="required">
								</div>
								<div class="form-group col-md-12 mbnone">
									<textarea rows="6" name="message" class="form-control" id="description"
										placeholder="Your Message" required="required"></textarea>
								</div>
								<div class="col-md-12">
									<div class="actions">
										<input type="submit" value="Send message" name="submit" id="submitButton"
											class="btn btn-lg btn-contact-bg" title="Submit Your Message!" />
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