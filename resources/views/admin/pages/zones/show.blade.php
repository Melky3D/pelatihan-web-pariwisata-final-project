@extends('admin.master')
@section('content')


<a href="{{ route('admin.zones.index') }}">Back to Zones</a><p>
    <!-- Detail Content -->
    <section class="pb-5">
        <div class="container">
            <div class="detail-card">
                <h2><i class="bi bi-info-circle-fill text-primary"></i> Informasi Destinasi</h2>

                @if ($zones->image)
                    <div class="detail-image">
                        <img src="{{ asset('storage/' . $zones->image) }}" alt="Gambar {{ $zones->name }}">
                    </div>
                @else
                    <div class="detail-placeholder">
                        Tidak ada gambar destinasi tersedia.
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-plus"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Name</div>
                                <div class="info-value">{{ $zones->name }}</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-card-text"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Deskripsi</div>
                                <div class="info-value">{{ $zones->description }}</div>
                            </div>
                        </div>


                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-plus"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Price Range</div>
                                <div class="info-value">{{ $zones->price_range }}</div>
                            </div>
                        </div>


                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-plus"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Created At</div>
                                <div class="info-value">{{ $zones->created_at }}</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Updated At</div>
                                <div class="info-value">{{ $zones->updated_at }}</div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
