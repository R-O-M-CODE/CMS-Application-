<x-admin-master>
    @section('content')
        <h1>Edit</h1>
        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"
                       value="{{$post->title}}"
                       aria-describedby=""
                       placeholder="Enter title">
            </div>
            <div class="form-group d-flex">
                <div>
                    <label for="title">File</label>
                    <input type="file"
                           name="post_image"
                           class="form-control-file"
                           id="file">
                </div>
                @if($post->post_image)
                    <div><img height="40px" class="mt-3" src="{{$post->post_image}}" alt=""></div>
                @endif
            </div>
            <div class="form-group">
                <textarea name="body"
                          class="form-control"
                          cols="30"
                          rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
