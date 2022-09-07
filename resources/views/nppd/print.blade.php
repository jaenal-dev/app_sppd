@extends('layouts.surat')

@section('title', 'Nota Dinas')

@section('judul', 'Nota Dinas')

@section('surat')

    <div class="container-fluid py-2">
        <div class="card" style="border: none">
            <div class="card-body">
                <div class="table-responsive" style="margin-top: -15px">
                    <table>
                        <thead>
                            <tr>
                                <td style="width: 32%;">Kepada Yth</td>
                                <td>: Bapak Sekretaris DPRD Kabupaten Tangerang</td>
                            </tr>
                            <tr>
                                <td style="width: 32%;">Dari.</td>
                                <td>: PPTK Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD</td>
                            </tr>
                            <tr>
                                <td style="width: 32%;">Kode Rekening</td>
                                <td>: {{ $rekening->kode_rekening }}</td>
                            </tr>
                            <tr>
                                <td style="width: 32%;">Tanggal</td>
                                <td>: {{ date('d F Y', strtotime($nppd->created_at)) }}</td>
                            </tr>
                        </thead>
                    </table>
                    <hr>
                    <p style="text-indent: 45px">Disampaikan dengan hormat {{ $nppd->prihal }} untuk melaksanakan tugas dalam rangka melaksanakan {{ $nppd->tujuan }}, yang dilaksanakan pada :</p>
                    <table style="text-indent: 45px">
                        <thead>
                            <tr>
                                <td style="width: 25%;">Hari</td>
                                <td>: {{ $day }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Tanggal</td>
                                <td>: {{ date('d', strtotime($nppd->tgl_pergi)) }} s/d {{ date('d F Y', strtotime($nppd->tgl_pulang)) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Tempat</td>
                                <td>: {{ $locations->name }}</td>
                            </tr>
                        </thead>
                    </table>
                    <p class="mt-2">Adapun rincian biaya perjalanan dinas sebagai berikut :</p>
                    <table class="table table-bordered" style="text-indent: 45px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Volume</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Uang Harian <br> a</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
  </body>
</html> --}}
