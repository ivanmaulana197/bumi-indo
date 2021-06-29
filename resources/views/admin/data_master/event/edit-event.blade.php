@extends('admin.template.master')

@section('title', 'Edit Event')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                    custom styles,
                    sizing, focus states, and more.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Styles</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p>To set rounded border to input box, use <code>.round</code> class and
                                    to set square border to input box, use <code>.sqaure</code> class
                                    alongwith
                                    <code>.form-control</code> class.
                                </p>
                            </div>
                            <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data" name="formName">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">
                                        <h6>Title</h6>
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Input Title event" value="{{ $event->title }}">
                                        <small class="text-danger">@error('title') {{$message}} @enderror</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">
                                        <h6>Deskripsi</h6>
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea class="textarea_editor form-control border-radius-0 mb-30 @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Enter text ...">{{$event->deskripsi}}
                                        </textarea>
                                        <small class="text-danger">@error('deskripsi') {{$message}} @enderror</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <h6>Select Category:</h6>
                                            </label>
                                            <select class="selectpicker form-control @error('category_id') is-invalid @enderror" name="category_id" data-style="btn-outline-primary" data-size="5">
                                                @foreach ($category as $data)
                                                @if($data->id==$event->category_id)
                                                <option value={{$data->id}} selected>{{$data->nama_category}}</option>
                                                @else
                                                <option value={{$data->id}}>{{$data->nama_category}}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                            <small class="text-danger">@error('category_id') {{$message}} @enderror</small>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <h6>Inputkan poster anda</h6>
                                            </label>
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                                            <!-- <label class="custom-file-label">Choose file</label> -->
                                            <small class="text-danger">@error('gambar') {{$message}} @enderror</small>
                                            @if(strlen($event->gambar)>0)
                                            <img src="{{$event->gambar}}" alt="" width="200px">
                                            @endif
                                            <!-- <label class="custom-file-label">Choose file</label> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <h6>Tanggal Mulai event:</h6>
                                            </label>
                                            <input class="date-picker form-control @error('start_date') is-invalid @enderror" name="start_date" , type="date" value="{{$event->start_date}}">
                                            </input>
                                            <small class="text-danger">@error('start_date') {{$message}} @enderror</small>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                <h6>Tanggal berakhir event:</h6>
                                            </label>
                                            <input class="date-picker form-control @error('end_date') is-invalid @enderror" name="end_date" , type="date" value="{{$event->end_date}}">
                                            </input>
                                            <small class="text-danger">@error('end_date') {{$message}} @enderror</small>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <fieldset class="form-group">
                                        <label>
                                            <h6>Inputkan poster anda</h6>
                                        </label>
                                        <select class="form-select form-control @error('status') is-invalid @enderror" name="status" data-style="btn-outline-primary" data-size="5">
                                            @if($event->status=='Draft')
                                            <option selected>Draft</option>
                                            <option>Published</option>
                                            @else
                                            <option>Draft</option>
                                            <option selected>Published</option>
                                            @endif
                                        </select>
                                        <small class="text-danger">@error('status') {{$message}} @enderror</small>

                                    </fieldset>
                                </div>
                                <a onClick="goBack()" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">
                                    Tambahkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
