<h1>Lista post</h1>
<form>
    <label>Ricerca per titolo</label>
    <input type="text" name="search" value="{{Request::get('search')}}" />
    <button>Cerca</button>
</form>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Descrizione Lunga</th>
            <th>Data creazione</th>
            <th>Ultimo Aggiornamento</th>
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
            </tr>
        @endforeach
    </tbody>
</table>