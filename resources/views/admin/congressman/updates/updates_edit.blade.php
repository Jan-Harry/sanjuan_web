@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-header">
                    <h3>
                        Title : {{$news->title}}
                    </h3>
                 </div>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                  <form method="post" action="{{action('UpdatesCongressman@update', $id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH" />
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Select</label>
                        <div class="col-sm-10">    
                          <select class="form-control" name="content_tag" id="exampleFormControlSelect1">
                            <option value="{{$news->content_tag}}">
                                @if($news->content_tag == "cong")
                                    <?php echo "Congressman Zamora" ?>
                                @endif
                                @if($news->content_tag == "atty_b" )
                                    <?php echo "Atty Bel" ?>
                                @endif
                            </option>
                            <option value="cong">Congressman Zamora</option>
                            <option value="atty_b">Atty Bel</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="staticEmail" class="col-sm-4 col-form-label"><b>Title</b></label>
                        <div class="col-sm-8">
                          <input type="text" name ="title" class="form-control" value="{{$news->title}}">
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label"><b>Article / Description</b></label>
                        <div class="col-sm-8">                            
                            <div id="editor">
                                <?php echo $news->desc; ?>
                            </div>
                              <textarea  rows="10" id="description" hidden name ="description" class="form-control">{{$news->desc}}</textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label"><b>Image</b></label>
                        <div class="col-sm-8">
                         <img src="{{asset("uploads/" . $news->filename) }}" width="200px"  height="140px"/>
                         <input type="file" name ="filename" class="form-control" value="{{$news->filename}}">
                         <input type="hidden" name ="filename_" class="form-control" value="{{$news->filename}}">
                          
                        </div>
                    </div>                    
                    <div class="form-group">
                      <input type="submit" class="btn btn-success" value="Submit" />
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
