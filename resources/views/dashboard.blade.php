@extends('layouts.default')

@section('title')
    School Library - Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                    Administrator Panel
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Book
                                </div>
                                <div
                                    class="
                                        dashboard-card-subtitle
                                    ">
                                    20
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Creator
                                </div>
                                <div
                                    class="
                                        dashboard-card-subtitle
                                    ">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    User
                                </div>
                                <div
                                    class="
                                        dashboard-card-subtitle
                                    ">
                                    5
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">
                            Recent Transactions
                        </h5>
                        <a class="card card-list d-block" href="/dashboard-transactions-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-1.png" alt="" />
                                    </div>
                                    <div class="col-md-4">
                                        Shirup Marzzan
                                    </div>
                                    <div class="col-md-3">
                                        Angga Risky
                                    </div>
                                    <div class="col-md-3">
                                        12 Januari, 2020
                                    </div>
                                    <div
                                        class="
                                            col-md-1
                                            d-none d-md-block
                                        ">
                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="card card-list d-block" href="/dashboard-transactions-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-2.png" alt="" />
                                    </div>
                                    <div class="col-md-4">
                                        LeBrone X
                                    </div>
                                    <div class="col-md-3">
                                        Masayoshi
                                    </div>
                                    <div class="col-md-3">
                                        11 January, 2020
                                    </div>
                                    <div
                                        class="
                                            col-md-1
                                            d-none d-md-block
                                        ">
                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="card card-list d-block" href="/dashboard-transactions-details.html">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/images/dashboard-icon-product-3.png" alt="" />
                                    </div>
                                    <div class="col-md-4">
                                        Soffa Lembutte
                                    </div>
                                    <div class="col-md-3">
                                        Shayna
                                    </div>
                                    <div class="col-md-3">
                                        11 January, 2020
                                    </div>
                                    <div
                                        class="
                                            col-md-1
                                            d-none d-md-block
                                        ">
                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
