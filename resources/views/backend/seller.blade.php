@extends('layouts.master')

@section('custom-css')
@endsection

@section('main-content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">
                <a href="{{ route('blade.seller.index') }}">
                    Seller
                </a>
            </h2>
            <p>Add, edit or delete a Seller</p>
        </div>
        <form action="{{ route('blade.seller.index') }}" class="form-control" style="display:contents; width:50%">
            <div class="input-group w-50">
                <input type="text" placeholder="Search" name="search" class="form-control"
                    value="{{ old('search') ?? $searchData }}" />
                <button class="btn btn-primary bg" type="submit">Search</button>
                @if (!empty($searchData))
                    <a class="btn btn-danger bg" href="{{ route('blade.seller.index') }}">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 offset-md-4 pb-4">
                    <p class="feedback-fadeout">
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
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
                    <form action="{{ route('blade.seller.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="business_name" id="business_name" placeholder="Business Name" class="form-control"
                                name="business_name" value="{{ old('business_name') ?? '' }}" />
                            @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="mobile" title="mobile" placeholder="mobile" class="form-control" name="mobile"
                                id="mobile" value="{{ old('mobile') ?? '' }}" />
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" id="phone" title="phone" placeholder="phone" class="form-control"
                                name="phone" value="{{ old('phone') ?? '' }}" />
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
                            <label for="proprietor" class="form-label">Proprietor</label>
                            <input type="proprietor" id="proprietor" title="proprietor" placeholder="proprietor"
                                class="form-control" name="proprietor" value="{{ old('proprietor') ?? '' }}" />
                            @error('proprietor')
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
                            <button class="btn btn-primary d-block">Add Seller Info</button>
                        </div>
                    </form>
                @else
                    {{-- Form for Updating Seller information  --}}
                    <form action="{{ route('blade.seller.update', $editData->id) }}" method="POST">
                        @csrf @method('put')
                        <div class="mb-4">
                            <label for="business_name" class="form-label">Business Name</label>
                            <input type="business_name" placeholder="Business Name" class="form-control"
                                name="business_name"
                                value="{{ empty($editData->business_name) ? old('business_name') : $editData->business_name }}" />
                            @error('business_name')
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
                            <label for="proprietor" class="form-label">Proprietor</label>
                            <input type="proprietor" id="proprietor" title="proprietor" placeholder="proprietor"
                                class="form-control" name="proprietor"
                                value="{{ empty($editData->proprietor) ? old('proprietor') : $editData->proprietor }}" />
                            @error('proprietor')
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
                            <button class="btn btn-primary d-block">Update Seller Info</button>
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

                                <th>Business Name</th>
                                <th width="1%">Slug</th>
                                <th>Mobile</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Proprietor</th>
                                <th>Email 2</th>
                                <th>Description</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $seller)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input checkitem" type="checkbox"
                                                value="{{ $seller->id }}" name="id" />
                                        </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $seller->business_name ?? '--' }}</b></td>
                                    <td width="1%">{{ $seller->slug ?? '--' }}</td>
                                    <td>{{ $seller->mobile ?? '--' }}</td>
                                    <td>{{ $seller->phone ?? '--' }}</td>
                                    <td>{{ $seller->email ?? '--' }}</td>

                                    <td>{{ $seller->address ?? '--' }}</td>
                                    <td>{{ $seller->proprietor ?? '--' }}</td>
                                    <td>{{ $seller->other_email ?? '--' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($seller->desc, 150, $end = '...') }}</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown"
                                                class="btn btn-light rounded btn-sm font-sm"> <i
                                                    class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('blade.seller.index', $seller->id) }}">Edit
                                                    info</a>
                                                <a class="dropdown-item text-danger delete-btn"
                                                    data-id="{{ $seller->id }}" href="#">Delete</a>
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

                                    <form action="{{ route('blade.seller.delete') }}" method="post"
                                        id="delete_form">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="pagination-area mt-15 mb-50">
                    {{ $sellers->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
