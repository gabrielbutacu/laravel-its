<h1>Il mio form</h1>
<form action="{{url('test-post')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title"></input>
    @if($errors->has('title'))
        <label>{{$errors->first('title')}}</label>
    @endif
    
    <input type="email" name="email"></input>
    @if($errors->has('email'))
        <label>{{$errors->first('email')}}</label>
    @endif

    <input type="file" name="attachment" />
    
    <button type="submit">Invia form</button>
</form>