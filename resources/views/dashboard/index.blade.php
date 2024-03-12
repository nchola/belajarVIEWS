<!-- @extends('layouts.index')

@section('content')
    <div class="container-fluid" style="padding:0px;position: relative;">
        <div
            style="height:100%;width:100%;background-color:rgba(0,0,0,0.5);position: absolute;z-index:10; padding: 32px;color:white">
            <h3>Visi</h3>
            <p>
                Menjadi perusahaan asuransi profesional yang handal dan terbaik serta mampu berkembang secara
                berkesinambungan
            </p>
            <h3>Misi</h4>
            <p>
                Menjadi perusahaan yang memiliki kinerja yang sehat dan mampu bertumbuh secara berkesinambungan (Sustainable
                Growth).
                <br />
                Berkomitmen tinggi dalam memberikan layanan dan nilai tambah kepada nasabah dan stakeholder melalui produk
                yang
                inovatif dan solutif.
                <br />
                Meningkatkan kompetensi dan produktivitas sumber daya manusia yang berkualitas.
            </p>
        </div>
        <img src="{{ url('bg.jpg') }}" style="width:100%;height:calc(100% - 70px);">
    </div>
@endsection -->

@extends('layouts.index')

@section('content')
<div class="container-fluid p-0 position-relative">
    <!-- Background Image -->
    <img src="{{ url('bg.jpg') }}" style="width:100%;height:100vh;object-fit:cover;">

    <!-- Overlay Content -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center px-5">
        <!-- Shadowed Box for Visi & Misi -->
        <div class="bg-white bg-opacity-75 p-5 rounded shadow-lg text-center" style="max-width: 800px;">
            <!-- Visi Section -->
            <div class="mb-4">
                <h3 class="fw-bold">Visi</h3>
                <p>
                    Menjadi perusahaan asuransi profesional yang handal dan terbaik serta mampu berkembang secara berkesinambungan.
                </p>
            </div>

            <!-- Misi Section -->
            <div>
                <h3 class="fw-bold">Misi</h3>
                <p>
                    Menjadi perusahaan yang memiliki kinerja yang sehat dan mampu bertumbuh secara berkesinambungan (Sustainable Growth).<br>
                    Berkomitmen tinggi dalam memberikan layanan dan nilai tambah kepada nasabah dan stakeholder melalui produk yang inovatif dan solutif.<br>
                    Meningkatkan kompetensi dan produktivitas sumber daya manusia yang berkualitas.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection


