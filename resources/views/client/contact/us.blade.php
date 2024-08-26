@extends('client.layouts.app')

@section('content')


    <!-- Slide 2 -->
    <section id="page-title" class="text-light"
             style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{asset(setting('image_page_title_contact'))}}); background-size: cover; background-position: center center;">
        <div class="container">

            <div class="page-title">
                <h1>ติดต่อเรา</h1>
                <!--                    <span>Simple page title with background parallax image</span>-->
            </div>
        </div>
    </section>
    <!-- end: Slide 2 -->


    <!--=================================
     contact-->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-8 offset-md-2">
                            @if($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <strong></strong> กรุณากรอกข้อมูลให้ครบถ้วนค่ะ
                                </div>
                            @endif

                            @if(session()->get('success'))
                                <div class="alert alert-success mb-4">
                                    <strong></strong> {{session()->get('success')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <address>
                                <strong>
                                    บริษัท ทรัพย์รุ่งเรือง 69 การบัญชี จำกัด
                                </strong>
                                {!! setting('info_address') !!}
                            </address>
                        </div>
                    </div>
                    <div class="social-icons m-t-10 social-icons-colored">
                        <ul>
                            @if(setting('info_facebook_messenger')!='#')
                                <li class="social-messenger"><a target="_blank"
                                                                href="{{setting('info_facebook_messenger')}}"><i
                                            class="fab fa-facebook-messenger"></i></a></li>
                            @endif
                            @if(setting('info_facebook')!='#')
                                <li class="social-facebook"><a target="_blank" href="{{setting('info_facebook')}}"><i
                                            class="fab fa-facebook-f"></i></a></li>
                            @endif

                            @if(setting('info_twitter')!='#')
                                <li class="social-twitter"><a target="_blank" href="{{setting('info_twitter')}}"><i
                                            class="fab fa-twitter"></i></a></li>
                            @endif

                            @if(setting('info_line')!='#')
                                <li class="social-line"><a target="_blank" href="{{setting('info_line')}}"><i
                                            class="fab fa-line"></i></a></li>
                            @endif
                            @if(setting('info_youtube')!='#')
                                <li class="social-youtube"><a target="_blank" href="{{setting('info_youtube')}}"><i
                                            class="fab fa-youtube"></i></a></li>
                            @endif

                            @if(setting('info_google')!='#')
                                <li class="social-gplus"><a target="_blank" href="{{setting('info_google')}}"><i
                                            class="fab fa-google-plus-g"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    {!! Form::open(['url' => route('contact.us.store'),'files' => true,'id'=>'formStore','class'=>'']) !!}
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="name" style="font-size: 18px;">ชื่อ-นามสกุล</label>
                            <input style="font-size: 16px; height: 50px" type="text" aria-required="true" name="name" required
                                   class="form-control form-control-lg required name @error('name') is-invalid @enderror"
                                   placeholder="..." value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" style="font-size: 18px;">อีเมล</label>
                            <input style="font-size: 16px; height: 50px" type="email" aria-required="true" name="email" required
                                   class="form-control required email @error('email') is-invalid @enderror"
                                   placeholder="..." value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subject" style="font-size: 18px;">หัวข้อ</label>
                            <input style="font-size: 16px; height: 50px" type="text" name="subject" required
                                   class="form-control required @error('subject') is-invalid @enderror"
                                   placeholder="...">
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" style="font-size: 18px;">รายละเอียด</label>
                        <textarea style="font-size: 16px;" type="text" name="message" required rows="5"
                                  class="form-control required @error('message') is-invalid @enderror"
                                  placeholder="..."></textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;ส่งข้อความ
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>


    <!--=================================
     contact-->


    <!--=================================
     contact map -->

    <section class="no-padding">
        {!! setting('info_map') !!}
    </section>

    <!--=================================
     contact map -->

    <script type="text/javascript">
        function callbackThen(response) {
            // read HTTP status
            console.log(response.status);

            // read Promise object
            response.json().then(function (data) {
                console.log(data);
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }
    </script>
    {!! htmlScriptTagJsApi([
            'action' => 'contact/us',
            'callback_then' => 'callbackThen',
            'callback_catch' => 'callbackCatch'
        ]) !!}

@endsection
