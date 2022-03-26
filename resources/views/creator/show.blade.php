@extends('layouts.default')

@section('title')
    School Library - Creator
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Creator</h2>
                <p class="dashboard-subtitle">
                    Detail of {{ $creator->name }}
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- {{ $creator->books->name }} --}}
                                <h3 class="card-title">{{ str($creator->name)->upper() }}</h3>
                                <hr>
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">{{ $creator->email }}</p>
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">{{ $creator->phone }}</p>
                                <h5 class="card-title">Address</h5>
                                <p class="card-text">{{ $creator->address }}</p>
                                <h5 class="card-title">Books</h5>
                                @forelse ($creator->books as $book)
                                    <p class="card-text">{{ $loop->iteration . '. ' . $book->title }}</p>
                                @empty
                                    <p class="card-text">Belum ada buku</p>
                                @endforelse

                                <a href="{{ route('creator.index') }}" class="btn btn-primary">Go to Creators</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
