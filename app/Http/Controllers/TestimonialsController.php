<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\RedirectResponse;
use App\Mail\TestimonialMail;
use Mail;
class TestimonialsController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial:: get(); 
        return view('admin.testimonial', compact ('testimonials')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request): RedirectResponse
     {
        $data = $request->validate([
             'testimonialName'=>'required|string',
             'image'=>'required|mimes:png,jpg,jpeg|max:2048',
             'review'=>'required|string',
             'subject'=>'required|string',
         ]);
         if ($request ->hasFile('image')){

            $fileName = $this->uploadFile( $request->image, 'assets/img');
            $data['image']=$fileName;}
            Mail::to('rofidaali44@gmail.com')->send(new TestimonialMail($request));
         Testimonial::create($data);
         return redirect('admin/testimonial');
     }
    /**
     * Display the specified resource.
     */

    //  public function testimonial_mail(Request $request) //send
    // {
    //    Mail::to('rofidaali44@gmail.com')->send(new TestimonialMail($request));
    //    return "Your message is sent Successfully";
    // }
    public function show(string $id)
    {
        
        
    }
    public function DashboradView()
    {
        
        $testimonials = Testimonial:: get(); 
        return view('dashboard/testimonialAdmin', compact ('testimonials')); 
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $testimonial = Testimonial::findOrFail($id);
        return view('dashboard/editTestimonial', compact ('testimonial'));     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
