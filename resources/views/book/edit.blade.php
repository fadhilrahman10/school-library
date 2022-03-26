@extends('layouts.default')

@section('title')
    School Library - Book - Edit
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Book</h2>
                <p class="dashboard-subtitle">
                    Update Book {{ $book->title }}
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('book.update', $book) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Judul Buku</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                    id="title" name="title" value="{{ $book->title, old('title') }}"
                                                    required autofocus>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="creator">Penulis</label>
                                                <select name="creator_id" id="creator"
                                                    class="form-control @error('creator_id') is-invalid @enderror">
                                                    {{-- Kurang fitur searching --}}
                                                    <option value="{{ $book->creator->id }}">{{ $book->creator->name }}
                                                    </option>
                                                    @foreach ($creators as $creator)
                                                        <option value="{{ $creator->id }}">{{ $creator->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('creator_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="publication_year">Terbit</label>
                                                <input type="number" min="1900" max="2099" step="1"
                                                    value="{{ $book->publication_year }}"
                                                    class="form-control @error('publication_year') is-invalid @enderror"
                                                    id="publication_year" name="publication_year" required>
                                                @error('publication_year')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="quantity">Jumlah</label>
                                                <input type="number"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    id="quantity" name="quantity"
                                                    value="{{ $book->quantity, old('quantity') }}" required>
                                                @error('quantity')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success mx-5">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
