<div id="main" role="main">
    <div id="ribbon">
        @yield('breadcrumb')
    </div>

    <div id="content">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    @yield('title')
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                @yield('header-buttons')
            </div>
        </div>

        <section id="widget-grid" class="">
                    
            <!-- row -->
            <div class="row">
                
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
                    <div class="jarviswidget jarviswidget-color-blueDark" id="{{uniqid()}}"
                        data-widget-colorbutton="false" 
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="false" 
                        data-widget-sortable="false"
                    >
                        <header>
                            @yield('widget-title')              
                        </header>
                        <div>
                            <div class="widget-body no-padding">
                                @yield('widget-body')
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            @yield('extra-content')
        </section>
    </div>

</div>