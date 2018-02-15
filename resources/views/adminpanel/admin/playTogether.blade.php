@extends('share.default')
@section('title', 'Dashbord')
@section('id', 'dashbord')
@section('content')
@include('adminpanel.partial.header')
<main class="adminpanel">
  <div class="col-md-2">
    @include('adminpanel.partial.navigation')
  </div>
  <div class="col-md-10">
      <form action="{{ url('/playTogether/create') }}"">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group{{ $errors->has('') ? ' has-error': ''}}">
                    <label>SVENSKA</label><br>
                      <input type="text" name="title" id="title" class="form-control input-lg floatlabel" placeholder="Title">
                      @if($errors->has('title'))
                      <span class="help-block">{{ $errors->first('title') }}</span>
                      @endif
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <label>SVENSKA</label><br>
                  <div class="form-group{{ $errors->has('') ? ' has-error': ''}}">
                      <input type="text" name="tags" id="title" class="form-control input-lg floatlabel" placeholder="Tags">
                      @if($errors->has('tags'))
                      <span class="help-block">{{ $errors->first('tags') }}</span>
                      @endif
                  </div>
              </div>
              <h3 id="gard">Playbord</h3>
              <div class="col-xs-12 col-sm-12 col-md-12 playbord">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 1</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 2</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 3</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 4</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 5</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 6</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 7</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 8</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 9</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <label>CONTENT 10</label><br>
                      <div class="form-group{{ $errors->has('content') ? ' has-error': ''}}">
                          <textarea name="content" id="content" class="form-control input-lg floatlabel summernote" placeholder="content"></textarea>
                          @if($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                          @endif
                      </div>
                  </div>
              </div>
            </div>      
      </form>
  </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
        $('.summernote').on('click', function(){
          $('.playbord').toggle();
        });

    });
</script>
@endsection
