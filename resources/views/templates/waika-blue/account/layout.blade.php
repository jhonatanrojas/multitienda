@extends($sc_templatePath.'.layout')

@section('block_main')
<section class="section section-sm section-first bg-default text-md-left">
    <div class="container">
      
      <div class="row">
       
        <div class="col-12 col-md-3 animate__animated animate__fadeInDown">
          @include($sc_templatePath.'.account.nav_customer')
        </div>
        <div class="col-12 col-md-9" style="min-height: 400px;">
          
            @section('block_main_profile')
            @show
            
        </div>
      </div>
    </div>
</section>
@endsection