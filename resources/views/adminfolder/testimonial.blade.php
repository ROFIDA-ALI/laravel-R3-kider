<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body>
    <div class="container-xxl bg-white p-0">
      @include('includes.header')


<div class="container-xxl py-5">

    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
        </div>
        
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($testimonials as $testimonial)
            <div class="testimonial-item bg-light rounded p-5">
                <p class="fs-5">{{$testimonial->review}}</p>
                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('assets/img/'.$testimonial->image) }}" style="width: 90px; height: 90px;">
                    <div class="ps-3">
                        <h3 class="mb-1">{{$testimonial->testimonialName}}</h3>
                        <span>{{$testimonial->subject}}</span>
                        
                    </div>

                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    
                </div>
                <button type="submit" class="btn btn-default">edit</button>
                <button type="submit" class="btn btn-default">delete</button>

            </div>
            @endforeach

                    {{-- <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                </div>
            </div> --}}
        </div>
    </div>

</div>


@include('includes.footer')
</body>

</html>