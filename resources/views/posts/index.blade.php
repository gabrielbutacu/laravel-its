<h1>Lista post</h1>
<form>
    <label>Ricerca per titolo</label>
    <input type="text" name="search" value="{{Request::get('search')}}" />
    <button>Cerca</button>
</form>
<a href="{{url('create-post')}}">Nuovo post</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Descrizione Lunga</th>
            <th>Data creazione</th>
            <th>Ultimo Aggiornamento</th>
            <th>Creato da</th>
            <th>Tag</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->long_description}}</td>
                <td>{{$post->created_at->format('d/m/Y H:i')}}</td>
                <td>{{$post->updated_at->format('d/m/Y H:i')}}</td>
                <!--  <td>{{$post->user_id ? $post->user->name : '-'}}</td> -->
                <td>{{$post->user->name ?? '-'}}</td>
                <td>
                    {{$post->tags->pluck('name')->join(',')}}
                </td>
                <!--
                <td>
                    @foreach($post->tags as $tag)
                        <span>{{$tag->name}}</span>
                    @endforeach
                </td>
                -->
                <td>
                    <a href="{{url('edit-post/'.$post->id)}}">Modifica</a>
                    <form method="POST" action="{{url('delete-post/'.$post->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>