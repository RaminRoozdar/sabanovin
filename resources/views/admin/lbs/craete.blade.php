<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">   اضافه کردن مکان جدید </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="{{ route('admin.lbs.location.store') }}" method="post">
            @Csrf
            @method('post')
            <div class="col-md-12 form-group row">
                <div class="col-md-12">
                    <label for="operator">  نام مکان : </label>
                </div>
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} contact-form" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">  ذخیره </button>
        </form>
      </div>
    </div>
  </div>
</div>
