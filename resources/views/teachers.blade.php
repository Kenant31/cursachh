<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                @if(auth()->user()->can('add teacher'))
                    <a href="{{route('add-teacher')}}" class="btn btn-success mb-4">Add new teacher</a>
                @endif
                @if(auth()->user()->can('show teacher'))
                        <nav class="navbar navbar-light bg-light">
                            <form action="{{url('search')}}" method="get" class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_name">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </nav>
                        <p>Sort by genres: </p>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard">All</a></button>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard?genre=Rap">Rap</a></button>
                        <a class="btn btn-primary"  style="color:white" href="http://localhost/c/public/dashboard?genre=Rock">Rock</a></button>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard?genre=Metal">Metal</a></button>
                        <br><br>
                    @foreach($posts as $post)
                        <div class="card mb-4">
                            <h5 class="card-header">{{$post->name}}</h5>
                            <div class="card-body">
                                <p>{{$post->genre}}</p>
                                <p>{{$post->text}}</p>
                                <p>{{$post->price}} р.</p>
                                <p>{{$post->created_at}}</p>
                                @if(auth()->user()->can('edit teacher'))
                                    <a href="{{route('edit-teacher', $post->id)}}" class="btn btn-primary">Edit</a>
                                @endif
                                @if(auth()->user()->can('delete teacher'))
                                    <form action="{{route('delete-teacher', $post->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
