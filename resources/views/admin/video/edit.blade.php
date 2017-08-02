@extends('admin.master')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        {{ Form::open(array('route' => ['admin.video.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditVideo')) }}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="col-md-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Edit video</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label required">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Intro</label>
                                <input type="text" class="form-control" placeholder="Name" name="intro" value="{!! old('intro',isset($data) ? $data['intro']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Url</label>
                                <input type="text" class="form-control" placeholder="Url" name="url" value="{!! old('intro',isset($data) ? $data['url']:null ) !!}">
                            </div>
                            <div class="form-group">
                              <label class="">Thumb</label>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>

                                     <a href="javascript:void(0)" type="button" id="delImageVideo" class="btn btn-primary"><i class="fa fa-times"></i>Delete image</a>
                                  </span>
                                  <input id="thumbnail" class="form-control" type="text" name="image" value="{!! old('thumb',isset($data) ? $data['thumb']:null ) !!}">

                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;" src="{!! asset($data['thumb'])  !!}" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Search Engine Optimize</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">SEO title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value="{!! old('title',isset($data) ? $data['title']:null ) !!}">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Title tags are displayed on search engine results pages (SERPs) as the clickable headline for a given result, and are important for usability, SEO, and social sharing. The title tag of a web page is meant to be an accurate and concise description of a page's content.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO keyword</label>
                                <input type="text" class="form-control" placeholder="Keyword" name="keyword" value="{!! old('keyword',isset($data) ? $data['keyword']:null ) !!}">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> Your SEO keywords are the key words and phrases in your web content that make it possible for people to find your site via search engines. A website that is well optimized for search engines "speaks the same language" as its potential visitor base with keywords for SEO that help connect searchers to your site.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO description</label>
                                <input type="text" class="form-control" placeholder="Description" name="description" value="{!! old('description',isset($data) ? $data['description']:null ) !!}">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> The meta description is a ~160 character snippet, a tag in HTML, that summarizes a page's content. Search engines show the meta description in search results mostly when the searched for phrase is contained in the description. Optimizing the meta description is a very important aspect of on-page SEO.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Publish</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <button type="submit" class="btn blue">Publish & edit</button>
                        </div>
                    </div>
                </div>

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Status</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value={!! $data['status'] !!} selected>{!! $currentnamestatus !!}</option>
                                <option value={!! $otherstatus !!}>{!! $othernamestatus !!}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
      var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>
    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>
    <link href="{{ URL::asset('/admin/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />

@endsection()
