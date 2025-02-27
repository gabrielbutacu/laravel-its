<h1>Profilo utente</h1>
<p>ID: {{$user->id}}</p>
<p>Nome: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
<p>Post associati</p>
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
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->posts as $post)
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