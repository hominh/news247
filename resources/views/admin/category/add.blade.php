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
        <form role="form" action="{!! route('admin.category.store') !!}"  method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="col-md-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Add category</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label required">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <label class="">Parent</label>
                                <select class="form-control" name="parent">
                                    <option value="0">Select Category</option>
                                   <?php cate_parent($parentCategory); ?>
                                </select>
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
                                <input type="text" class="form-control" placeholder="Title" name="title">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Title tags are displayed on search engine results pages (SERPs) as the clickable headline for a given result, and are important for usability, SEO, and social sharing. The title tag of a web page is meant to be an accurate and concise description of a page's content.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO keyword</label>
                                <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> Your SEO keywords are the key words and phrases in your web content that make it possible for people to find your site via search engines. A website that is well optimized for search engines "speaks the same language" as its potential visitor base with keywords for SEO that help connect searchers to your site.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO description</label>
                                <input type="text" class="form-control" placeholder="Description" name="description">
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
                                <option value="1">Actived</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>


@endsection()
