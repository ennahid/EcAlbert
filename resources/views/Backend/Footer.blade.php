{{-- <script src="{{URL::asset('vendor/echarts/echarts.min.js')}}"></script> --}}
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{URL::asset('vendor/simplebar/simplebar.js')}}"></script>
<script src="{{URL::asset('vendor/text-avatar/jquery.textavatar.js')}}"></script>
<script src="{{URL::asset('vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{URL::asset('vendor/wnumb/wNumb.js')}}"></script>
<script src="{{URL::asset('js/main.js')}}"></script>
<script src="{{URL::asset('js/bootbox.min.js')}}"></script>
<script src="{{URL::asset('js/paginathing.js')}}"></script>
<script src="{{URL::asset('js/printThis.js')}}"></script>
<script src="{{URL::asset('js/jquery.filtertable.min.js')}}"></script>
<script src="{{URL::asset('vendor/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::asset('js/preview/default-dashboard.min.js')}}"></script>




<div class="sidebar-mobile-overlay"></div>

<div class="settings-panel">
 {{--  <div class="settings-panel__header">
    <span class="settings-panel__close iconfont iconfont-modal-close"></span>

    <h5 class="settings-panel__heading">Theme Customizer</h5>
    <div class="settings-panel__desc">Customize & Preview In Real Time</div>
  </div>
</div>
  <div class="settings-panel__body">
    <div class="settings-panel__layout-options">
      <h6 class="settings-panel__block-heading">Layout Options</h6>
      <div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" id="collapse-sidebar">
              <span class="switch-slider">
                <span class="switch-slider__on"></span>
                <span class="switch-slider__off"></span>
              </span>
            </span>
          <span class="switch-inline__text">Collapsed Sidebar</span>
        </label>
      </div> --}}
      <!--<div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" checked>
              <span class="switch-slider">
                <span class="switch-slider__on"></span>
                <span class="switch-slider__off"></span>
              </span>
            </span>
          <span class="switch-inline__text">Fixed Sidebar</span>
        </label>
      </div>-->
    </div>
  </div>


@yield('myscript')