<!DOCTYPE html>
<html lang="en">

<head>
	@include('landing.components.css')
</head>

<body data-spy="scroll" data-offset="80">

	<!-- START PRELOADER -->
	<div class="preloader">
		<div class="status">
			<div class="status-mes"></div>
		</div>
	</div>
	<!-- END PRELOADER -->

    <!-- START NAVBAR -->
	@include('landing.partial.navbar')
    <!-- END NAVBAR -->

    <!-- START BLOG -->
    @yield('content')
    <!-- END BLOG -->

	<!-- START FOOTER -->
	@include('landing.partial.footer')
	<!-- END FOOTER -->

	@include('landing.components.js')
</body>

</html>