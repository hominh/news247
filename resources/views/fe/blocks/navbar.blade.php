<div class="main-nav clearfix">
    <div class="container">
        <div class="row">
            <nav class="site-navigation navigation">
                <div class="site-nav-inner pull-left">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
                            </li>
                            @foreach($parent_categories as $item_parent)
                                <?php $alias_parent = $item_parent["alias"]; $id_parent = $item_parent["id"]; ?>
                                <?php
                                    $dropdown = "";
                                    if($item_parent["hassub"] != 0) {
                                        $dropdown = "dropdown";
                                    }
                                    else if($item_parent["hassub"] == 0) {
                                        $dropdown = "";
                                    }
                                ?>
                                <li class="{!! $dropdown !!}">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $item_parent["name"] !!}</a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach($sub_categories as $item_sub)
                                            <?php $alias_sub = $item_sub["alias"]; $id_sub = $item_sub["id"]; ?>
                                            @if($item_parent["id"] == $item_sub["parent_id"])
                                                <li><a href="#">{!! $item_sub["name"] !!}</a></li>
                                            @endif()
                                        @endforeach()
                                    </ul>
                                </li>
                            @endforeach()
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="nav-search">
                <span id="search"><i class="fa fa-search"></i></span>
            </div>
            <div class="search-block" style="display: none;">
                <input type="text" class="form-control" placeholder="Type what you want and enter">
                <span class="search-close">&times;</span>
            </div>
        </div>
    </div>
</div>
