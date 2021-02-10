@extends('dashboard.global')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Template Surat</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surat Kesiswaan</li>
    </ol>
    </div>
    <div class="container rounded bg-white">
        <div class="col-md-12">
            <div class="p-3 py-5 mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="text-center">Template Surat Kesiswaan</h3>
              </div>
              <div class="table-responsive p-3 ">
                <table class="table table-borderless align-items-center table-flush table-hover">
                  <tbody>
                    
                    <tr>
                      <td width="90%">1. Surat Panggilan Orang Tua </td>
                      <td><a href="tatausaha/suratrekomendasi" type="button" class="btn btn-primary float-left"> Buat</a> </td>
                    </tr>
                    <tr>
                      <td width="90%">2. Surat Perjanjian Siswa </td>
                      <td><a href="tatausaha/suratberkelakuanbaik" type="button" class="btn btn-primary float-left"> Buat</a> </td>
                    </tr>
                    </tbody>
                </table>    
            </div>
            </div>
        </div>
    </div>





@endsection