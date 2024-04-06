@extends('layouts.master')

@section('custom-css')
@endsection

@section('main-content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">
                <a href="{{ route('blade.customer.index') }}">
                    Customer
                </a>
            </h2>
            <p>Add, edit or delete a Customer</p>
        </div>
        <form action="{{ route('blade.customer.index') }}" class="form-control" style="display:contents; width:50%">
            <div class="input-group w-50">
                <input type="text" placeholder="Search" name="search" class="form-control"
                    value="{{ old('search') ?? $searchData }}" />
                <button class="btn btn-primary bg" type="submit">Search</button>
                @if (!empty($searchData))
                    <a class="btn btn-danger bg" href="{{ route('blade.customer.index') }}">Reset</a>
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
                    {{-- Form for Storing Institute Data --}}
                    <form action="{{ route('blade.customer.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Customer Name</label>
                            <input type="name" id="name" placeholder="Customer Name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') ?? '' }}" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="mobile" title="mobile" placeholder="mobile"
                                class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile"
                                value="{{ old('mobile') ?? '' }}" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" id="phone" title="phone" placeholder="phone"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') ?? '' }}" />
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" title="email" placeholder="email" class="form-control"
                                name="email" value="{{ old('email') ?? '' }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" title="address" placeholder="address" class="form-control"
                                name="address" value="{{ old('address') ?? '' }}" />
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="business_name" id="business_name" title="business_name" placeholder="business_name"
                                class="form-control" name="business_name" value="{{ old('business_name') ?? '' }}" />
                            @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email2" class="form-label">Other Email</label>
                            <input type="email" id="email2" placeholder="email 2" class="form-control"
                                name="other_email" value="{{ old('other_email') ?? '' }}" />
                            @error('other_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" placeholder="desc" class="form-control"
                                name="desc" value="{{ old('desc') ?? '' }}" />
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary d-block">Add Customer Info</button>
                        </div>
                    </form>
                @else
                    {{-- Form for Updating Customer information  --}}
                    <form action="{{ route('blade.customer.update', $editData->id) }}" method="POST">
                        @csrf @method('put')
                        <div class="mb-4">
                            <label for="name" class="form-label">Customer Name</label>
                            <input type="name" placeholder="Customer Name" class="form-control" name="name"
                                value="{{ empty($editData->name) ? old('name') : $editData->name }}" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="mobile" title="mobile" placeholder="mobile" class="form-control"
                                name="mobile"
                                value="{{ empty($editData->mobile) ? old('mobile') : $editData->mobile }}" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" title="phone" placeholder="phone" class="form-control"
                                name="phone" value="{{ empty($editData->phone) ? old('phone') : $editData->phone }}" />
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" title="email" placeholder="email" class="form-control"
                                name="email" value="{{ empty($editData->email) ? old('email') : $editData->email }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="address" title="address" placeholder="address" class="form-control"
                                name="address"
                                value="{{ empty($editData->address) ? old('address') : $editData->address }}" />
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="business_name" id="business_name" title="business_name"
                                placeholder="business_name" class="form-control" name="business_name"
                                value="{{ empty($editData->business_name) ? old('business_name') : $editData->business_name }}" />
                            @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email2" class="form-label">Other Email</label>
                            <input type="email" id="email2" placeholder="email 2" class="form-control"
                                name="other_email"
                                value="{{ empty($editData->other_email) ? old('other_email') : $editData->other_email }}" />
                            @error('other_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" placeholder="desc" class="form-control"
                                name="desc" value="{{ empty($editData->desc) ? old('desc') : $editData->desc }}" />
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary d-block">Update Customer Info</button>
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

                                <th>Customer Name</th>
                                <th width="1%">Slug</th>
                                <th>Mobile</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Business Name</th>
                                <th>Email 2</th>
                                <th>Description</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input checkitem" type="checkbox"
                                                value="{{ $customer->id }}" name="id" />
                                        </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $customer->name ?? '--' }}</b></td>
                                    <td width="1%">{{ $customer->slug ?? '--' }}</td>
                                    <td>{{ $customer->mobile ?? '--' }}</td>
                                    <td>{{ $customer->phone ?? '--' }}</td>
                                    <td>{{ $customer->email ?? '--' }}</td>

                                    <td>{{ $customer->address ?? '--' }}</td>
                                    <td>{{ $customer->business_name ?? '--' }}</td>
                                    <td>{{ $customer->other_email ?? '--' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($customer->desc, 150, $end = '...') }}</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown"
                                                class="btn btn-light rounded btn-sm font-sm"> <i
                                                    class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('blade.customer.index', $customer->id) }}">Edit
                                                    info</a>
                                                <a class="dropdown-item text-danger delete-btn"
                                                    data-id="{{ $customer->id }}" href="#">Delete</a>
                                            </div>
                                        </div>
                                        <!-- dropdown //end -->
                                    </td>
                                </tr>
                            @endforeach
                            @if ($customers->count() > 0)
                                <tr>
                                    <td colspan="13">
                                        <button id="multiple_delete_btn" class="btn btn-xs btn-danger mr-2 d-none"
                                            type="submit">
                                            Delete all
                                        </button>

                                        <form action="{{ route('blade.customer.delete') }}" method="post"
                                            id="delete_form">
                                            @csrf @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="pagination-area mt-15 mb-50">
                    {{ $customers->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
