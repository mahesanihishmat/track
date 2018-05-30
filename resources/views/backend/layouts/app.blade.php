<html lang="{{ app()->getLocale() }}">
@include('backend.partials._head')
@yield('styles')


<!-- end::Body -->
    <body  class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default"  >

        
        
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            @include('backend.partials._header')

            <!-- begin::Body -->
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                     
                     @include('backend.partials._aside_left')
                     <div class="m-grid__item m-grid__item--fluid m-wrapper">
                        @include('backend.partials._subheader')


                     @yield('content')

                     </div>
                 </div>
                      
                @include('backend.partials._footer')

                @include('backend.partials._scripts')

                @yield('scripts')
                {{-- @yield('toaster') --}}
                @include('backend.components.toastr')
                    
           
        </div>
    </body>

</html>

