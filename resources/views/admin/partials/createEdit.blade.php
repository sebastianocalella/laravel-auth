
<div class="container my-5">
    <form class="text-white bg-dark py-3 px-4" action="{{route($routeName, $post)}}" method="POST">
        @csrf
        @method($method)
        <h3>Author: {{Auth::user()->name}}</h3>
        <div class="form-group col-8">
            <label for="post-title" class="form-label">post title:</label>
            <input type="text" class="form-control" id="post-title" placeholder="insert post title here" name="title" value="{{old('title', $post->title)}}">
        </div>
        <div class="form-group">
            <label for="post-content">Address 2</label>
            <textarea type="text" class="form-control" id="text-content" placeholder="Once upon a time..." name="content">
                {{old('content', $post->content)}}
            </textarea>
        </div>
        <h4>date: {{now()->format('Y/m/d H:i:s')}}</h4>
        @if ($method == 'POST')
            <button type="submit" class="btn btn-primary">Create Post</button>
        @else
            <button type="submit" class="btn btn-warning">Modify Post</button>
        @endif
    </form>
</div>