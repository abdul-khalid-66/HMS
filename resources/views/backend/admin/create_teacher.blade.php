@extends('backend.layout.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend/css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/form/all-type-forms.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Optional CSS for Styling -->
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
        .image-upload-container {
            text-align: center;
        }
        .image-preview {
            margin-bottom: 15px;
        }
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
        }
        .custom-file-upload:hover {
            background-color: #0056b3;
        }
        .note {
            font-size: 12px;
            color: #666;
            margin-top: 10px;
        }
        .image-preview {
            width: 400px; /* Fixed width */
            height: 400px; /* Fixed height */
            border: 2px dashed #ccc; /* Optional: Add a border */
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* Ensure the image doesn't overflow */
            margin: 0 auto; /* Center the container */
        }
        .image-preview img {
            max-width: 100%; /* Ensure the image doesn't exceed the container width */
            max-height: 100%; /* Ensure the image doesn't exceed the container height */
            /* width: auto; Maintain aspect ratio */
            /* height: auto; Maintain aspect ratio */
            width: 360px; /* Fixed width */
            height: 400px; /* Fixed height */
            object-fit: cover; /* Crop the image to fit the container */
            border-radius: 5px;
        }
        .image-preview:empty {
            background-color: #f9f9f9; /* Placeholder background color */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #666;
        }

        .image-preview:empty::before {
            content: "No Image Selected"; /* Placeholder text */
        }
    </style>
@endpush


@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Basic Information</a></li>
                        {{-- <li><a href="#reviews"> Account Information</a></li>
                        <li><a href="#INFORMATION">Social Information</a></li> --}}
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            <form method="POST" action="{{ route('teacher_store') }}" class="needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                                @csrf
                                            
                                                <!-- Form Fields -->
                                                <div class="row">
                                                    <!-- Left Side: Image Upload Section -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group alert-up-pd">
                                                            <div class="image-upload-container">
                                                                <div class="image-preview">
                                                                    <img id="image-preview" src="{{ asset('backend/img/student/4.jpg') }}" alt="Image Preview" style="max-width: 100%; height: auto; border-radius: 5px;">
                                                                </div>
                                                                <div class="file-input-container">
                                                                    <p class="note needsclick">(Please upload you current profile image.)</p>
                                                                    <label for="image-upload" class="custom-file-upload">
                                                                        <i class="fa fa-upload"></i> Choose Image
                                                                    </label>
                                                                    <input id="image-upload" name="profile" type="file" accept="image/*" style="display: none;" onchange="previewImage(event)">
                                                                </div>
                                                                @error('profile')  <!-- Validation error for profile image -->
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                    <!-- Right Side: Form Fields -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="fullname" type="text" class="form-control" placeholder="Full Name" value="{{ old('fullname') }}">
                                                            @error('fullname')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input name="phoneno" type="number" class="form-control" placeholder="Phone" value="{{ old('phoneno') }}">
                                                            @error('phoneno')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input name="password" type="password" class="form-control" placeholder="Password">
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input name="confarmpassword" type="password" class="form-control" placeholder="Confirm Password">
                                                            @error('confarmpassword')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input name="address" type="text" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        {{-- <div class="form-group">
                                                            <input name="mobileno" type="number" class="form-control" placeholder="Mobile no." value="{{ old('mobileno') }}">
                                                            @error('mobileno')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div> --}}
                                            
                                                        <div class="form-group">
                                                            <input name="finish" type="date" title="Date of birth" class="form-control" placeholder="Date of Birth" value="{{ old('finish') }}">
                                                            @error('finish')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input name="postcode" type="text" class="form-control" placeholder="Postcode" value="{{ old('postcode') }}">
                                                            @error('postcode')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group res-mg-t-15">
                                                            <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
                                                            @error('description')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!-- Additional Fields -->
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="department" type="text" class="form-control" placeholder="Department" value="{{ old('department') }}">
                                                            @error('department')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <select name="gender" class="form-control">
                                                                <option value="none" selected disabled>Select Gender</option>
                                                                <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Male</option>
                                                                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Female</option>
                                                            </select>
                                                            @error('gender')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <select name="state" class="form-control">
                                                                <option value="none" selected disabled>Select state</option>
                                                                <option value="0" {{ old('state') == '0' ? 'selected' : '' }}>Gujarat</option>
                                                                <option value="1" {{ old('state') == '1' ? 'selected' : '' }}>Maharastra</option>
                                                                <option value="2" {{ old('state') == '2' ? 'selected' : '' }}>Rajastan</option>
                                                                <option value="3" {{ old('state') == '3' ? 'selected' : '' }}>Maharastra</option>
                                                                <option value="4" {{ old('state') == '4' ? 'selected' : '' }}>Rajastan</option>
                                                                <option value="5" {{ old('state') == '5' ? 'selected' : '' }}>Gujarat</option>
                                                            </select>
                                                            @error('state')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <select name="city" class="form-control">
                                                                <option value="none" selected disabled>Select city</option>
                                                                <option value="0" {{ old('city') == '0' ? 'selected' : '' }}>Surat</option>
                                                                <option value="1" {{ old('city') == '1' ? 'selected' : '' }}>Baroda</option>
                                                                <option value="2" {{ old('city') == '2' ? 'selected' : '' }}>Navsari</option>
                                                                <option value="3" {{ old('city') == '3' ? 'selected' : '' }}>Baroda</option>
                                                                <option value="4" {{ old('city') == '4' ? 'selected' : '' }}>Surat</option>
                                                            </select>
                                                            @error('city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="website" type="text" class="form-control" placeholder="Website URL" value="{{ old('website') }}">
                                                            @error('website')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <!-- Social Media Links -->
                                                        <div class="form-group">
                                                            <input type="url" class="form-control" placeholder="Facebook URL" value="{{ old('facebook') }}">
                                                            @error('facebook')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input type="url" class="form-control" placeholder="Twitter URL" value="{{ old('twitter') }}">
                                                            @error('twitter')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input type="url" class="form-control" placeholder="Google Plus" value="{{ old('google_plus') }}">
                                                            @error('google_plus')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <input type="url" class="form-control" placeholder="Linkedin URL" value="{{ old('linkedin') }}">
                                                            @error('linkedin')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!-- Submit Button -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <form id="acount-infor" action="#" class="acount-infor">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="phoneno" type="number" class="form-control" placeholder="Phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="password" type="password" class="form-control" placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="confarmpassword" type="password" class="form-control" placeholder="Confirm Password">
                                                        </div>
                                                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="devit-card-custom">
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Facebook URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Twitter URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Google Plus">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" class="form-control" placeholder="Linkedin URL">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')


 <!-- form validate JS
============================================ -->



    <!-- maskedinput JS
============================================ -->
<script src="{{ asset('backend/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('backend/js/masking-active.js') }}"></script>
<!-- datepicker JS
    ============================================ -->
    
    
<script src="{{ asset('backend/js/datepicker/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/js/datepicker/datepicker-active.js') }}"></script>

<script src="{{ asset('backend/js/form-validation/jquery.form.min.js') }}"></script>
<script src="{{ asset('backend/js/form-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/js/form-validation/form-active.js') }}"></script>
<script src="{{ asset('backend/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('backend/js/tab.js') }}"></script>
<!-- JavaScript for Image Preview -->
                                            <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const imagePreview = document.getElementById('image-preview');
            reader.onload = function() {
                imagePreview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- jQuery Validation Script -->
    <script>
        $(document).ready(function() {
            $("#demo1-upload").validate({
                rules: {
                    firstname: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phoneno: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    confarmpassword: {
                        required: true,
                        equalTo: "[name='password']"
                    },
                    address: {
                        required: true
                    },
                    mobileno: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    finish: {
                        required: true
                    },
                    postcode: {
                        required: true,
                        digits: true
                    },
                    description: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    website: {
                        required: true,
                        url: true
                    }
                },
                messages: {
                    firstname: {
                        required: "Please enter your full name",
                        minlength: "Name must be at least 2 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    phoneno: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Phone number must be 10 digits",
                        maxlength: "Phone number must be 10 digits"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    confarmpassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    address: {
                        required: "Please enter your address"
                    },
                    mobileno: {
                        required: "Please enter your mobile number",
                        digits: "Please enter only digits",
                        minlength: "Mobile number must be 10 digits",
                        maxlength: "Mobile number must be 10 digits"
                    },
                    finish: {
                        required: "Please enter your date of birth"
                    },
                    postcode: {
                        required: "Please enter your postcode",
                        digits: "Postcode must be a number"
                    },
                    description: {
                        required: "Please enter a description"
                    },
                    department: {
                        required: "Please enter your department"
                    },
                    gender: {
                        required: "Please select your gender"
                    },
                    state: {
                        required: "Please select your state"
                    },
                    city: {
                        required: "Please select your city"
                    },
                    website: {
                        required: "Please enter your website URL",
                        url: "Please enter a valid URL"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element); // Display error messages after the input field
                }
            });
        });
    </script>
@endpush