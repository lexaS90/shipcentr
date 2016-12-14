@foreach($files as $file)
    <a href="{{ asset('upload/'.$file) }}" style="display:block">{{ $file }}</a>
@endforeach