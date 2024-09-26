@extends('frontend.layouts.master')
@section('content')

<section class="stock-rules gradient-custom py-5 body-bg-img ">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-2-strong card-rules" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center text-white">Rules of the competition</h3>                    
                       {!! $data[0]->rule_of_competition !!} 
                        <!-- <h4 class="text-white">1. General Rules</h4>
                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque luctus metus ac sapien convallis, nec interdum tortor suscipit. Integer fringilla, massa non vehicula sodales, eros ipsum commodo tortor, a vulputate dui odio a nibh.</p>
                        
                        <h4 class="text-white">2. Trading Hours</h4>
                        <p class="text-white">Suspendisse potenti. Phasellus quis lacus fermentum, tempus neque a, vestibulum turpis. Donec nec libero at magna vestibulum varius. In consequat metus et lacus tincidunt, a feugiat sapien ultricies. Cras a tincidunt augue.</p>
                        
                        <h4 class="text-white">3. Market Conduct</h4>
                        <p class="text-white">Nam bibendum est ac libero condimentum, ac tempus dui laoreet. Proin ac eros a eros fringilla scelerisque non a orci. Nulla facilisi. Nam non nunc vel sapien cursus bibendum eget quis sapien. Suspendisse potenti.</p>
                        
                        <h4 class="text-white">4. Securities Regulations</h4>
                        <p class="text-white">Sed feugiat lacus sit amet ligula ullamcorper, non gravida purus vestibulum. Vivamus in erat nec turpis viverra lacinia. Nullam at augue pharetra, fermentum tortor quis, consectetur massa. Nullam non est orci. Maecenas ac semper lectus.</p>
                        
                        <h4 class="text-white">5. Reporting Requirements</h4>
                        <p class="text-white">Mauris ultricies nulla a libero sollicitudin, sit amet facilisis dolor iaculis. Nulla facilisi. Duis id risus cursus, suscipit magna sit amet, bibendum mauris. Quisque malesuada orci non lacus condimentum, vitae venenatis augue luctus.</p> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
