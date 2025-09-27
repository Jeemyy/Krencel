@extends('layouts.master')
@section('content')
<section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Thankes For Review
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="{{route('review.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div>
                <input type="text" name="name" class="form-control" placeholder="Your Name...">
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number...">
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
             <div>
               <input type="text" name="subject" class="form-control" placeholder="Subject...">
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
               <textarea name="message" class="form-control" placeholder="Your Message..." id="" cols="30" rows="10"></textarea>
                <span style="color: red">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
              </div>
              <div>
               <input type="file" name="photo" class="form-control">
              </div>
              <div class="btn_box">
                <input type="submit" name="submit" value="Record" class="btn btn-warning fw-semibold fs-4" style="color: #fff; border-radius: 25px; width: 10rem">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
