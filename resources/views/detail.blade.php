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
                @if(auth()->user()->can('show teacher'))
                    <br><br>
                        <div class="card mb-4">
                            <h5 class="card-header">{{$posts->name}}</h5>
                            <div class="card-body">
                                <p>{{$posts->genre}}</p>
                                <p>{{$posts->text}}</p>
                                <p>{{$posts->price}} р.</p>
                                @if(auth()->user()->can('edit teacher'))
                                    <a href="{{route('edit-teacher', $posts->id)}}" class="btn btn-primary">Edit</a>
                                @endif
                                @if(auth()->user()->can('delete teacher'))
                                    <form action="{{route('delete-teacher', $posts->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif

                            </div>
                            <div class="container">
                                <form style="margin-top: 50px;" class="space-y-5" method="POST" action="{{ route('comment.store', $posts->id) }}">
                                    @csrf
                                    <h5>Comment</h5>
                                    <div style="display: flex;align-items: baseline;">

                                        <input id="comment_body" type="text" name="comment_body" class="block w-1000px py-3 px-3 mt-2 text-gray-800 appearance-none border-3 border-gray-100 ">
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                                        @error('comment_body')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                        @enderror
                                        <button type="submit"  style="height: 58px; margin-left: 20px" class="btn btn-success mb-4">
                                            Create
                                        </button>
                                    </div>
                                </form>


                                <div class="relative overflow-x-auto shadow-md bg-grey-200 sm:rounded-lg py-20" style="margin-top: 50px;">
                                    <table class="w-full text-sm text-left text-grey-500 dark:text-grey-400">
                                        @foreach($posts->comments as $comment)
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    {{ $comment->user->name}}
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>

                                            <thead>
                                            <tbody>
                                            <tr class="bg-white border-b dark:bg-grey-800 dark:border-grey-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-grey-900">
                                                    {{ $comment->comment_body}}
                                                </th>

                                                <td class="px-6 py-4 text-right">
                                                    <div class="flex space-x-2">
                                                        @if ((Auth::check() && Auth::id() == $comment->user_id) || auth()->user()->hasRole('super-user') || auth()->user()->hasRole('moderator'))
                                                            <a href="{{ route('comment.edit', ['id' => $posts->id, 'comm' => $comment->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style="padding-right: 10px">Edit</a>


                                                            <form method="POST" action="{{ route('comment.delete', ['id' => $posts->id, 'comm' => $comment->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                            </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
