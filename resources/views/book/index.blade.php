@extends('layouts.default')

@section('title')
    School Library - Book
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Book</h2>
                <p class="dashboard-subtitle">
                    List of Books
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="book/create" class="btn btn-primary mb-4">
                                    + Create new book
                                </a>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}.
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="tabel">
                                        <thead>
                                            <tr class="font-weight-bold">
                                                <td>Judul</td>
                                                <td>Penulis</td>
                                                <td>Terbit</td>
                                                <td>Jumlah</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'creator.name',
                        name: 'creator.name'
                    },
                    {
                        data: 'publication_year',
                        name: 'publication_year'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searcable: false,
                        width: '15%'
                    }
                ]
            });
        });
    </script>
@endpush
