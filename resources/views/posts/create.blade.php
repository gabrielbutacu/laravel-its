<h1>Nuovo post</h1>
<form method="POST" action="{{url('create-post')}}">
    @csrf
    <div>
        <label>Titolo</label>
        <input type="text" name="title" />
    </div>
    

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>
    

    <div>
        <label>Descrizione lunga</label>
        <textarea name="long_description"></textarea>
    </div>
    

    <button>Crea post</button>
</form>