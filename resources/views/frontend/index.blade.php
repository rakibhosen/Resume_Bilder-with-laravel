@extends('frontend.layouts.master')
@section('content')
<section id="header">
@foreach(App\models\Designation::orderBy('id','asc')->get() as $designation)
                <div class="user-box">
                <img  src="{{ asset('img/designation/'.$designation->image) }}" alt="{{ $designation->name }}"/>
                    <h1 class="text-center">{{ $designation->name }}</h1>
                    <p class="text-center">{{ $designation->title }}</p>
                </div>
                @endforeach
            </div>
            <div class="scroll-btn">
                <div class="scroll-bar">
                    <a href="#about"><span></span></a>
                </div>
            </div>
        </section>
<!-- ----------user info section------------ -->

<section id="user-info">
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-dark">
                <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#about">About Me</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#resume"> Resume</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
            
                  </ul>
                </div>
              </nav>
            </div>

<!-- --------about------------ -->

<div class=" container about" id="about">
    <div class="row">
    @foreach(App\models\Introduction::orderBy('id','asc')->get() as $introduction)
            <div class="col-md-6 text-center">
            <img  src="{{ asset('img/introduction/'.$introduction->image) }}" alt="{{ $introduction->name }}" height="350px"/>
            </div>
     @endforeach

        <div class="col-md-6">
        @foreach(App\models\Introduction::orderBy('id','asc')->get() as $introduction)
            <h3>    {{$introduction->title}}</h3>
            <p>
                {{$introduction->description}}
            </p>
       @endforeach

      
            <div class="skills-bar">
       @foreach(App\models\Skill::orderBy('id','asc')->get() as $skill)
                <p>{{$skill->title}}</p>
                <div class="progress">
                    <div class="progress-bar" style="width:{{$skill->level}}%;">{{$skill->level}}%</div>
                </div>
                @endforeach
            </div>
        
        </div>
    </div>
</div>

<!-- -----social icon -->
<div class="social-icon">
  <ul>
      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-google"></i></a></li>
      <li><a href="#"><i class="fa fa-youtube"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
  </ul>
</div>


<!-- -------resume------- -->

<div class="resume" id="resume">
  <div class="container">
      <div class="row">
          <!-- experiences -->
          <div class="col-md-6">
              <h3 class="text-center">My Experiences</h3>
              <ul class="timeline">
              @foreach(App\models\Experience::orderBy('id','asc')->get() as $experience)
                  <li>
                      <h4><span>{{$experience->year}} - </span>{{$experience->title}}</h4>
                      <p>
                      {{$experience->description}}<br>
                            <b>location</b> - {{$experience->location}}
                      </p>
                  </li>
                  @endforeach


              </ul>
          </div> 
          <!-- education-------------------------------------- -->
          <div class="col-md-6">
                <h3 class="text-center">My Education</h3>
                <ul class="timeline">
                @foreach(App\models\Education::orderBy('id','asc')->get() as $education)
                    <li>
                        <h4><span>{{$education->year}} - </span>{{$education->title}}</h4>
                        <p>
                        {{$education->description}}
                            <br>
                            <b>Institute</b> - {{$education->institute}}<<br>
                            <b>Session</b> - {{$education->session}}<br>
                            <b>Aggregate</b> - {{$education->aggregate}}%
                            
                        </p>
                    </li>
                    @endforeach
  
                    
                </ul>
            </div>
      </div>
  </div>
</div>

<!-- ------services area----------- -->
<div class="services" id="services">
    <div class="container">
        <h1 class="text-center"> Services</h1>
        @foreach(App\models\Service::orderBy('id','asc')->get() as $service)
        <p class="text-center">
          {{$service->heading}}
        </p>
        @endforeach
        <div class="row">

        @foreach(App\models\Service::orderBy('id','asc')->get() as $service)
            <div class="col-md-4">
                <div class="services-box">
                <img  src="{{ asset('img/service/'.$service->image) }}" alt="{{ $service->title }}" height="300px"  width="100%"/>
                    <h4>{{$service->title}}</h4>
                    <p class="text-justify">
                      {{$service->description}}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<!-- -------contact--------- -->

<div class="contact" id="contact">
    <div class="container text-center">
        <h1 class="text-center">Contact Me</h1>
        @foreach(App\models\Contact::orderBy('id','asc')->get() as $contact)
        <p class="text-center">{{$contact->title}}<br>
        
        </p>
        <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-phone"></i>
                    <p>{{$contact->phone}}</p>
                </div>
                <div class="col-md-4">
                        <i class="fa fa-envelope"></i>
                        <p>{{$contact->gmail}}</p>
                    </div>

                    <div class="col-md-4">
                            <i class="fa fa-internet-explorer"></i>
                            <p><a href="http://{{$contact->web}}">{{$contact->web}}</a></p>
                        </div>
        </div>
        <a href="file/cv.pdf"  class="btn btn-primary" target="_blank"><i class="fa fa-download"></i>Download Resume</a>
        <a href="https://{{$contact->web}}" class="btn btn-primary" ><i class="fa fa-rocket"></i>Hire Me</a>
        @endforeach
    </div>
    <div class="footer text-center" id="footer">
    @foreach(App\models\Footer::orderBy('id','asc')->get() as $footer)
            <p>{{$footer->first_title}}<i class="fa fa-heart"></i>{{$footer->second_title}}</p>
     @endforeach
    </div>

</div>
</section>
@endsection