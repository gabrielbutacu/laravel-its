<x-app-layout>
    <h1 class="mt-2 text-sm text-gray-500 dark:text-gray-400">Lista post</h1>
    <form>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ricerca per titolo</label>
        <input type="text" class="class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" value="{{Request::get('search')}}" />
        <button class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cerca</button>
    </form>
    <a href="{{url('create-post')}}">Nuovo post</a>
    <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" >ID</th>
                <th scope="col" class="px-6 py-3">Titolo</th>
                <th scope="col" class="px-6 py-3">Descrizione</th>
                <th scope="col" class="px-6 py-3">Descrizione Lunga</th>
                <th scope="col" class="px-6 py-3">Data creazione</th>
                <th scope="col" class="px-6 py-3">Ultimo Aggiornamento</th>
                <th scope="col" class="px-6 py-3">Creato da</th>
                <th scope="col" class="px-6 py-3">Tag</th>
                <th scope="col" class="px-6 py-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td>{{$post->id}}</td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >{{$post->title}}</td>
                    <td class="px-6 py-4">{{$post->description}}</td>
                    <td class="px-6 py-4">{{$post->long_description}}</td>
                    <td class="px-6 py-4">{{$post->created_at->format('d/m/Y H:i')}}</td>
                    <td class="px-6 py-4">{{$post->updated_at->format('d/m/Y H:i')}}</td>
                    <!--  <td>{{$post->user_id ? $post->user->name : '-'}}</td> -->
                    <td class="px-6 py-4">{{$post->user->name ?? '-'}}</td>
                    <td class="px-6 py-4">
                        {{$post->tags->pluck('name')->join(',')}}
                    </td>
                    <!--
                    <td>
                        @foreach($post->tags as $tag)
                            <span>{{$tag->name}}</span>
                        @endforeach
                    </td>
                    -->
                    <td class="px-6 py-4">
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
    </div>

</x-app-layout>
