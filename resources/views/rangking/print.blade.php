<html>

<head>
    <!-- Custom CSS -->
    <link href="{{ asset('template') }}/css/style.min.css" rel="stylesheet">

</head>

<body>
    <h5>Nilai</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <thead>
            <tr>
                <th>Pelanggan</th>
                @foreach ($kriteria as $item)
                    <th>{{ $item->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $item)
                <tr>
                    <td style="min-width: 120px">{{ $item->nama }}</td>
                    @foreach ($item->penilaian as $penilaian)
                        <td>{{ $penilaian->nilai }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>Matriks Keputusan Ternormalisasi</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <thead>
            {{-- <tr style="font-size: 12px;background-color:rgba(0,255,255,0.5)">
                                    <th>Pembagi</th>
                                    @foreach ($pembagi as $item)
                                        <th>{{ $item }}</th>
                                    @endforeach
                                </tr> --}}
            <tr>
                <th>Pelanggan</th>
                @foreach ($kriteria as $item)
                    <th>{{ $item->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $item)
                <tr>
                    <td style="min-width: 120px">{{ $item->nama }}</td>
                    @foreach ($item->matriks_ternormalisasi as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>Matriks Keputusan Ternormalisasi & Terbobot</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <thead>
            <tr>
                <th>Pelanggan</th>
                @foreach ($kriteria as $item)
                    <th>{{ $item->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $item)
                <tr>
                    <td style="min-width: 120px">{{ $item->nama }}</td>
                    @foreach ($item->matriks_terbobot as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>Solusi Ideal Positif(Max) dan Solusi Ideal Negatif(Min)</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <tbody>
            <tr>
                <td style="font-weight: bold">Max</td>
                @foreach ($max as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
            <tr>
                <td style="font-weight: bold">Min</td>
                @foreach ($min as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <hr>
    <h5>D+ dan D-</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <thead>
            <tr>
                <th>Pelanggan</th>
                <th>D+</th>
                <th>D-</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $item)
                <tr>
                    <td style="min-width: 120px">{{ $item->nama }}</td>
                    <td>{{ $item->dPlus }}</td>
                    <td>{{ $item->dMin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <h5>Rangking</h5>
    <table style="font-size:12px" class="table table-bordered table-hover table-compact">
        <thead>
            <tr>
                <th>Rangking</th>
                <th>Pelanggan</th>
                <th>Preferensi(V)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($pelanggan->sortByDesc('preferensi') as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->preferensi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print()
    </script>
</body>

</html>
