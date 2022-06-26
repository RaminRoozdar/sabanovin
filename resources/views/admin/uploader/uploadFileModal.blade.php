<!-- Modal -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">   آپلود فایل  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="{{ route('admin.uploader.fileStore') }}" method="post" enctype="multipart/form-data">
            @Csrf
            @method('post')
            <div class="col-md-12 form-group row">
                <div class="col-md-12">
                    <label for="operator"> عنوان فایل : </label>
                </div>
                <div class="col-md-12">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} contact-form" name="title" value="{{ old('title') }}">
                </div>
            </div>

            <div class="col-md-12 form-group row">
                <div class="col-md-12">
                    <label for="source">  انتخاب فایل : </label>
                </div>
                <div class="col-md-12">
                    <input id="source" type="file" class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }} contact-form" name="source" value="{{ old('source') }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary"> آپلود فایل </button>
        </form>
      </div>
    </div>
  </div>
</div>
