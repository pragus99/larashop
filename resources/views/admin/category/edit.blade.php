@extends('admin.layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</div>

{{-- message pop up when successfully submit the form --}}
<div class="justify-content-center row">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif
</div>

<div class="col-lg-10">
    <form action="{{ route('category.update', [$category->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card mb-6">

            <div class="card-header py-3 d-flex flex-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"
                        class="form-control @error('description') is-invalid @enderror">{{ $category->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">

                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose File</label>
                        <input type="file" id="customFile" name="image"
                            class="custom-file-input @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <img src="{{ Storage::url($category->image) }}" alt="gambar category" width="150">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
</div>
@endsection