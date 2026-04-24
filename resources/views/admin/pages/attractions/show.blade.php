@extends('admin.master')
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Atraksi
                </a>
            </div>

            <!-- Detail Content -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title mb-0">
                        <i class="bi bi-info-circle-fill"></i> Informasi Atraksi
                    </h2>
                </div>
                <div class="card-body">
                    @if ($attractions->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $attractions->image) }}" alt="Gambar {{ $attractions->name }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                        </div>
                    @else
                        <div class="text-center mb-4">
                            <div class="bg-light p-4 rounded">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2">Tidak ada gambar atraksi tersedia.</p>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon me-3">
                                        <i class="bi bi-tag-fill text-primary"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label fw-bold">Nama Atraksi</div>
                                        <div class="info-value">{{ $attractions->name }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon me-3">
                                        <i class="bi bi-card-text text-primary"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label fw-bold">Deskripsi</div>
                                        <div class="info-value">{{ $attractions->description }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon me-3">
                                        <i class="bi bi-cash text-primary"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label fw-bold">Harga Tiket</div>
                                        <div class="info-value">{{ $attractions->ticket_price }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon me-3">
                                        <i class="bi bi-calendar-plus text-success"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label fw-bold">Dibuat Pada</div>
                                        <div class="info-value">{{ $attractions->created_at->format('d M Y, H:i') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon me-3">
                                        <i class="bi bi-calendar-check text-warning"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label fw-bold">Diperbarui Pada</div>
                                        <div class="info-value">{{ $attractions->updated_at->format('d M Y, H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
