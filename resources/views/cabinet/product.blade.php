@extends('cabinet.layout')

@section('main')

    <div class="row">

        <div class="col-12">

        <form action="{{ route('create-product') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="text" class="form-control" cols="30" rows="10" required>{{ old('text') }}</textarea>
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Price enter in UAH after system convert to (USD, EUR)</label>
                        <input type="number" name="price" class="form-control" min="1" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6 col-xs-12">
                    <div class="form-group">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="">Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control-file" required>
                        <label class="shot" for="photo">
                            <div class="shot-wrap">
                                <span class="shot-img">+</span>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </div>

            </div>

        </form>

        </div>

    </div>

@endsection