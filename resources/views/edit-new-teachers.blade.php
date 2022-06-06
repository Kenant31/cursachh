<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('First Music School') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('update-teacher', $post->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="name" value="{{$post->name}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Text</label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$post->text}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Genre</label>
                        <textarea name="genre" class="form-control" id="exampleFormControlTextarea2" rows="1">{{$post->genre}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">Price</label>
                        <textarea name="price" class="form-control" id="exampleFormControlTextarea3" rows="1">{{$post->price}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
