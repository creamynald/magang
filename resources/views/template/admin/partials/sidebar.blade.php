<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/assets') }}/images/logo/logo.png" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/assets') }}/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      @include('template.admin.partials.sidebar-menu')
    </nav>
  </div>