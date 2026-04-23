@extends('admin.master')

@section('content')

<h1 class="mb-6">Admin Dashboard</h1>


<!-- row -->
        <div class="row row-cols-1 row-cols-xl-4 row-cols-md-2 mb-6 g-6">
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-primary-darker text-primary-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                      <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                  </div>
                  <div>Total Zones</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $totalZones }}</div>
                  <div class="text-success small">
                    <a href="{{ route('admin.zones.index') }}" class="btn btn-sm btn-outline-info d-flex align-items-center gap-1">Go To Zones</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-success-darker text-success-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                      <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                  </div>
                  <div>Total Attractions</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $totalAttractions }}</div>
                  <div class="text-success small">
              <a href="{{ route('admin.attractions.index') }}" class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1">Go To Attractions</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-warning-darker text-warning-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-clock">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9" />
                      <path d="M12 7v5l3 3" />
                    </svg>
                  </div>
                  <div>Pending Reviews</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $totalPendingReviews }}</div>
                  <div class="text-warning small">
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">Go To Reviews</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-info-darker text-info-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-check-circle">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M9 12l2 2l4 -4" />
                    </svg>
                  </div>
                  <div>Approved Reviews</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $totalApprovedReviews }}</div>
                  <div class="text-success small">
                     <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">Go To Reviews</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection