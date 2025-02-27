<h1>Modifica post</h1>
<form method="POST" action="{{url('update-post/'.$post->id)}}">
    @csrf
    <div>
        <label>Titolo</label>
        <input type="text" name="title" value="{{$post->title}}" />
        <span>{{$errors->first('title')}}</span>
    </div>
    

    <div>
        <label>Description</label>
        <textarea name="description">{{$post->description}}</textarea>
    </div>
    

    <div>
        <label>Descrizione lunga</label>
        <textarea name="long_description">{{$post->long_description}}</textarea>
    </div>

    <div>
        <label>Tag</label>
        <select name="tags[]" multiple>
            @foreach(App\Models\Tag::get() as $tag)
                <option value="{{$tag->id}}" {{in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} >{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    

    <button>Aggiorna post</button>
</form>