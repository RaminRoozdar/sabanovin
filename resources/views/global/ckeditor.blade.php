<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    var csrf = '{{csrf_token()}}';
    @foreach($editors as $editor)
    CKEDITOR.replace('{{$editor}}',{
        language: 'fa',
        contentsCss: "body {font-family: Vazir,Tahoma;}",
    });
    @endforeach
</script>