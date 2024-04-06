@extends('layouts.master')

@section('custom-css')
@endsection

@section('main-content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">
                <a href="{{ route('blade.payment.method.index') }}">
                    Payment Method
                </a>
            </h2>
        </div>
        <form action="{{ route('blade.payment.method.index') }}" class="form-control" style="display:contents; width:50%">
            <div class="input-group w-50">
                <input type="text" placeholder="Search" name="search" class="form-control"
                    value="{{ old('search') ?? $searchData }}" />
                <button class="btn btn-primary bg" type="submit">Search</button>
                @if (!empty($searchData))
                    <a class="btn btn-danger bg" href="{{ route('blade.payment.method.index') }}">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 offset-md-4 pb-4">
                    <p class="feedback-fadeout">
                        @if (session('success'))
                            <span class="feedback d-block text-success fw-bold">
                                {{ session('success') }}
                            </span>
                        @elseif(session('error'))
                            <span class="invalid-feedback d-block fw-bold">
                                {{ session('error') }}
                            </span>
                        @enderror
                </p>
            </div>
            <div class="col-md-3">
                @empty($editData)
                    {{-- Form for Storing Payment Method Data --}}
                    <form action="{{ route('blade.payment.method.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" id="name" placeholder="Name"
                                class="form-control @error('name')is-invalid @enderror" name="name"
                                value="{{ old('name') ?? '' }}" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="account_no" class="form-label">Account No</label>
                            <input type="account_no" title="account_no" placeholder="account_no"
                                class="form-control @error('account_no')is-invalid @enderror" name="account_no"
                                id="account_no" value="{{ old('account_no') ?? '' }}" />
                            @error('account_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary d-block">Add Payment Method Info</button>
                        </div>
                    </form>
                @else
                    {{-- Form for Updating Payment Method information  --}}
                    <form action="{{ route('blade.payment.method.update', $editData->id) }}" method="POST">
                        @csrf @method('put')
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" placeholder="Name" class="form-control @error('name')is-invalid @enderror"
                                name="name" value="{{ empty($editData->name) ? old('name') : $editData->name }}" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="account_no" class="form-label">Account No</label>
                            <input type="account_no" title="account_no" placeholder="account_no"
                                class="form-control @error('account_no')is-invalid @enderror" name="account_no"
                                value="{{ empty($editData->account_no) ? old('account_no') : $editData->account_no }}" />
                            @error('account_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary d-block">Update Payment Method Info</button>
                        </div>
                    </form>
                @endempty
            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="check_all_box" />
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Account No</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentMethods as $paymentMethod)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input checkitem" type="checkbox"
                                                value="{{ $paymentMethod->id }}" name="id" />
                                        </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $paymentMethod->name ?? '--' }}</b></td>
                                    <td>{{ $paymentMethod->account_no ?? '--' }}</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown"
                                                class="btn btn-light rounded btn-sm font-sm"> <i
                                                    class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('blade.payment.method.index', $paymentMethod->id) }}">Edit
                                                    info</a>
                                                <a class="dropdown-item text-danger delete-btn"
                                                    data-id="{{ $paymentMethod->id }}" href="#">Delete</a>
                                            </div>
                                        </div>
                                        <!-- dropdown //end -->
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="10">
                                    <button id="multiple_delete_btn" class="btn btn-xs btn-danger mr-2 d-none"
                                        type="submit">
                                        Delete all
                                    </button>

                                    <form action="{{ route('blade.payment.method.delete') }}" method="post"
                                        id="delete_form">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="pagination-area mt-15 mb-50">
                    {{ $paymentMethods->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
