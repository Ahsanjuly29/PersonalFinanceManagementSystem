@extends('layouts.master')

@section('custom-css')
@endsection

@section('main-content')
    <form action="{{ route('blade.expense.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Expense</h2>
                    <div>
                        <button class="btn btn-md rounded font-sm hover-up">Create</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Basic</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-4">
                            <label for="product_name" class="form-label">Product title</label>
                            <input type="text" placeholder="Type here" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea id="myeditorinstance" placeholder="Type here" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Regular price</label>
                                    <div class="row gx-2">
                                        <input placeholder="$" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Promotional price</label>
                                    <input placeholder="$" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Currency</label>
                                <select class="form-select">
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>RUBL</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tax rate</label>
                            <input type="text" placeholder="%" class="form-control" id="product_name" />
                        </div>
                        <label class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" />
                            <span class="form-check-label"> Make a template </span>
                        </label>

                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Width</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Height</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Weight</label>
                            <input type="text" placeholder="gam" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Shipping fees</label>
                            <input type="text" placeholder="$" class="form-control" id="product_name" />
                        </div>

                    </div>
                </div>
                <!-- card end// -->
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="assets/imgs/theme/upload.svg" alt="" />
                            <input class="form-control" type="file" />
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option>Automobiles</option>
                                    <option>Home items</option>
                                    <option>Electronics</option>
                                    <option>Smartphones</option>
                                    <option>Sport items</option>
                                    <option>Baby and Tous</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Sub-category</label>
                                <select class="form-select">
                                    <option>Nissan</option>
                                    <option>Honda</option>
                                    <option>Mercedes</option>
                                    <option>Chevrolet</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tags</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <!-- row.// -->
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
    </form>
@endsection



@section('custom-js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
        });
    </script>

    {{-- <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script> --}}
@endsection
