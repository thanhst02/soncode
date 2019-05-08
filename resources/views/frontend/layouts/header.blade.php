<div id="headWrapper" class="clearfix">
    <!-- top bar start -->
    @includeif('frontend.layouts.header.top-bar')
    <!-- top bar end -->
    <!-- Logo, global navigation menu and search start -->
    <header class="top-head" data-sticky="true">
        <div class="container">
            <div class="row">
                <div class="logo cell-3">
                    <a href="{{ route('frontend.index') }}"></a>
                </div>
                <div class="cell-9 top-menu">
                    <!-- top navigation menu start -->
                    @includeif('frontend.layouts.header.top-navigation-menu')
                    <!-- top navigation menu end -->
                    <!-- top search start -->
                    @includeif('frontend.layouts.header.top-search')
                    <!-- top search end -->
                </div>
            </div>
        </div>
    </header>
    <!-- Logo, Global navigation menu and search end -->

</div>