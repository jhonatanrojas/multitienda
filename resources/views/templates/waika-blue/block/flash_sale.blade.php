
@php
if (function_exists('sc_product_flash')) {
    $productFlashSale = sc_product_flash(2);
} else {
    $productFlashSale = [];
}
@endphp
@if (count($productFlashSale))
<!-- START SECTION SHOP -->
<div class="section bg-default">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading_tab_header">
                <div class="heading_s2">

                    <h2 class="wow fadeScale"><a href="{{ sc_route('flash-sale') }}" class="text_default">OFERTAS ESPECIALES</a></h2>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="row row-30 row-lg-50">
                @foreach ($productFlashSale as $product)
                <div class="col-sm-6">
                    @php
                    $modalida_pago='Quincenales';
                       if($product->id_modalidad_pagos==3)
                       $modalida_pago='Mensuales';
                 
                       @endphp
                    <!-- Product-->
                    <div class="deal_wrap">
                        <div class="product_img">
                            <a href="{{ $product->getUrl() }}">
                                <img src="{{ sc_file($product->getThumb()) }}" alt="el_img1">
                            </a>
                        </div>
                        <div class="deal_content">
                            <div class="product_info">
                                <h5 class="product_title"><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h5>
                                @if( $product->monto_inicial > 0 && $product->precio_de_cuota )

                                <span class="stock-sold">  Inicial de  ${!! number_format($product->monto_inicial,0)  !!}</span>
                                 @endif
                                 @if(  $product->precio_de_cuota )
                                 <a href="{{ $product->getUrl() }}">
            
                                    {{ $product->nro_coutas}} cuotas de
                                       
                                     </a>
                                     @endif
                                {!! $product->showPrice() !!}
                                @if(  $product->precio_de_cuota )
                                <div class="product-cuotas">    <a href="{{ $product->getUrl() }}">{!! $modalida_pago !!}     </a>  </div>
                                @endif
                            </div>
                            <div class="deal_progress">
                     
                                <span class="stock-available">{{ sc_language_render('front.flash_stock') }}: <strong>{{ $product->pf_stock }}</strong></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ round($product->pf_sold/$product->pf_stock*100) }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ round($product->pf_sold/$product->pf_stock*100) }}%"> {{ round($product->pf_sold/$product->pf_stock*100) }}% </div>
                                </div>
                            </div>
                            <div class="countdown_time" data-time="{{ $product->promotionPrice->date_end }}"></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
           
        </div>
    </div>
</div>
</div>
<style>
.deal_wrap {
border: 2px solid #FF324D;
border-radius: 20px;
overflow: hidden;
display: -ms-flexbox;
display: flex;
-ms-flex-align: center;
align-items: center;
margin-bottom: 25px;
}
.deal_wrap .product_img {
max-width: 200px;
width: 100%;
}
.deal_wrap .deal_content {
width: 100%;
padding: 30px 30px 30px 0;
}
.deal_wrap .deal_content .product_info {
padding: 0;
}

.deal_wrap .countdown_box_cus {
float: left;
width: 25%;
padding: 5px;
}
.deal_wrap .countdown_box_cus .countdown-wrap-cus {
background: #dad6d6;
}
.deal_wrap .countdown_box_cus .countdown-cus {
font-size: 24px;
display: block;
}
.deal_wrap .countdown_time .cd_text {
font-size: 13px;
display: block;
}
.deal_wrap .deal_content .deal_progress {
padding-top: 5px;
display: block;
}
.deal_wrap .deal_content .deal_progress .stock-available {
float: right;
}
.deal_wrap .deal_content .deal_progress .progress {
margin-top: 5px;
margin-bottom: 20px;
border-radius: 20px;
}
.deal_progress .progress-bar {
background-color: #FF324D;
text-indent: -99999px;
}

</style>
@endif


@push('scripts')
<!-- END SECTION SHOP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
$('.countdown_time').each(function() {
    var endTime = $(this).data('time');
    $(this).countdown(endTime, function(tm) {
        let html = '<div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus days">%D </span><span class="cd_text">Dias</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus hours">%H</span><span class="cd_text">Horas</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus minutes">%M</span><span class="cd_text">Minutos</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus seconds">%S</span><span class="cd_text">Segundos</span></div></div>';
        $(this).html(tm.strftime(html));
    });
});
</script>
@endpush
