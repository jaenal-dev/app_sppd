@extends('layouts.surat')

@section('title', 'Surat Tugas')

@section('judul', 'SURAT TUGAS')

@section('nomor', 'Nomor : ' . $get_id->nomor)

@section('surat')

    <div class="container py-2 page-break">
        <div class="card" style="border: none">
            <div class="card-body">
                <p>Yang bertanda tangan dibawah ini :</p>
                <div class="table-responsive" style="margin-top: -15px">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40%;">Nama</th>
                                <th>: H.ASEP SUHERMAN,SH.MBA,MM</th>
                            </tr>
                            <tr>
                                <th style="width: 40%;">NIP .</th>
                                <th>: 197005051997031003</th>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Pangkat/Golongan</th>
                                <th>: Pembina Utama Muda (IV/c)</th>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Jabatan</th>
                                <th>: Sekretaris DPRD</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="text-center py-2">
                        <p><b>Memerintahkan Kepada</b></p>
                    </div>

                    <div class="table-responsive" style="margin-top: -20px">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama</th>
                                    <th>Golongan</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nppd_for as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->pangkat }}</td>
                                        <td>{{ $item->user->esselon }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p class="card-text ms-5">Untuk melaksanakan perintah dalam rangka {{ $get_id->tujuan }}, yang akan dilaksanakan pada :</p>
                    <div class="table-responsive mx-5" style="margin-top: -10px">
                        <table class="table table-borderless table-sm">
                            <thead>
                                <tr>
                                    <td>Hari : {{ $day }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal  : {{ date('d', strtotime($get_id->tgl_pergi)) }} s/d {{ date('d F Y', strtotime($get_id->tgl_pulang)) }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat    : {{ $get_loc->name }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <p class="card-text ms-5" style="margin-top: -10px;">Demikian Surat Perintah ini dibuat dapat dipergunakan sebagaimana mestinya.</p>
                    <p class="card-text ms-5" style="margin-top: -10px">Biaya perjalanan dinas ini dibebankan pada pagu anggaran pada kegiatan Penyelenggaraan Koordinasi dan Konsultasi SKPD dengan Kode Kegiatan : 4.02.01.2.06.09 5.1.02.04.01.0001 </p>

                    <div class="table-responsive">
                        <table class="table table-borderless table-sm text-end">
                            <thead>
                                <tr>
                                    <td style="width: 80%;"><font size="3">Dibuat</font></td>
                                    <td><font size="3">: di Tigaraksa</font></td>
                                </tr>
                                <tr>
                                    <td><font size="3">Pada Tanggal</font></td>
                                    <td><font size="3">: {{ date('d F Y', strtotime($get_id->created_at)) }}</font></td>
                                </tr>
                            </thead>
                        </table>
                        <div class="d-flex">
                            <div class="card ms-auto" style="border: none; margin-top: -30px; background: transparent">
                                <div class="card-body text-center mx-3">
                                    <font size="3"><b>SEKRETARIS DPRD</b></font><br>
                                    <font size="3"><b>KABUPATEN TANGERANG</b></font>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <font size="3"><b>H.ASEP SUHERMAN,SH.MBA,MM</b></font>
                                    <br>
                                    <font size="2">Pembina Utama Muda (IV/c)</font>
                                    <br>
                                    <font size="3">Nip. 1234567890</font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
