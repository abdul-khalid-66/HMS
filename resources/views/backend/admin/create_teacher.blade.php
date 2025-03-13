@extends('backend.layout.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend/css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/form/all-type-forms.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Optional CSS for Styling -->

    <!-- Chosen CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/chosen/bootstrap-chosen.css') }}">
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
                        <li class="active"><a href="#description">Add Teacher Information</a></li>
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
                                                            <label>Full Name</label>
                                                            <input name="fullname" type="text" class="form-control" placeholder="Full Name" value="{{ old('fullname') }}">
                                                            @error('fullname')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input name="phoneno" type="number" class="form-control" placeholder="Phone" value="{{ old('phoneno') }}">
                                                            @error('phoneno')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input name="address" type="text" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input name="date_of_birth" type="date" title="Date of birth" class="form-control" placeholder="Date of Birth" value="{{ old('date_of_birth') }}">
                                                            @error('date_of_birth')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Post Code</label>
                                                            <input name="postcode" type="text" class="form-control" placeholder="Postcode" value="{{ old('postcode') }}">
                                                            @error('postcode')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Additional Fields -->
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Department</label>
                                                            <input name="department" type="text" class="form-control" placeholder="Department" value="{{ old('department') }}">
                                                            @error('department')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
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
                                                            <label>Provence</label>
                                                            <select name="state" class="form-control">
                                                                <option value="none" selected disabled>Select state</option>
                                                                <option value="0" {{ old('state') == '0' ? 'selected' : '' }}>Gujarat</option>
                                                            </select>
                                                            @error('state')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <select name="city" class="form-control">
                                                                <option value="none" selected disabled>Select city</option>
                                                                <option value="0" {{ old('city') == '0' ? 'selected' : '' }}>Surat</option>
                                                            </select>
                                                            @error('city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input name="password" type="password" class="form-control" placeholder="Password">
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input name="confarmpassword" type="password" class="form-control" placeholder="Confirm Password">
                                                            @error('confarmpassword')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Websit link</label>
                                                            <input name="website" type="text" class="form-control" placeholder="Website URL" value="{{ old('website') }}">
                                                            @error('website')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Social Media Links -->
                                                        <div class="form-group">
                                                            <label>Facebook link</label>
                                                            <input type="url" class="form-control" name="facebook" placeholder="Facebook URL" value="{{ old('facebook') }}">
                                                            @error('facebook')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Twitter link</label>
                                                            <input type="url" class="form-control" name="twitter" placeholder="Twitter URL" value="{{ old('twitter') }}">
                                                            @error('twitter')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Linkedin</label>
                                                            <input type="url" class="form-control" name="linkedin" placeholder="Linkedin URL" value="{{ old('linkedin') }}">
                                                            @error('linkedin')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group res-mg-t-15">
                                                            <label>Description</label>
                                                            <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
                                                            @error('description')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group chosen-select-single">
                                                            <label>Subjects</label>
                                                            <select data-placeholder="Choose a teacher subjects..." name="subjects[]" class="form-control chosen-select" multiple tabindex="-1">
                                                                <option value="">Select subject</option>
                                                                <option value="United States" {{ in_array('United States', old('subjects', [])) ? 'selected' : '' }}>United States</option>
                                                                <option value="United Kingdom" {{ in_array('United Kingdom', old('subjects', [])) ? 'selected' : '' }}>United Kingdom</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                             <!-- Education Information -->
                                             <div id="education-fields">
                                                <div class="education-field" style="margin-top: 5%">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="education[0][degree]" placeholder="Degree">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="education[0][institution]" placeholder="Institution">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="education[0][year]" placeholder="Year">
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <!-- Button to Add More Education Fields -->
                                            <button type="button" id="add-education" class="btn btn-secondary">Add More Education</button>
                                    
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

    <!-- Chosen JS -->
    <script src="{{ asset('backend/js/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('backend/js/chosen/chosen-active.js') }}"></script>
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

    <!-- JavaScript to Add More Education Fields -->
    <script>
        $(document).ready(function () {
            // Initialize a counter to keep track of the number of education fields
            let educationCount = 0;
    
            $('#add-education').on('click', function () {
                // Increment the counter each time a new field is added
                educationCount++;
    
                // Create a new education field container
                var newEducationField = $('<div class="education-field"></div>');
    
                // Create and append the Degree Field with the updated index
                var degreeField = $('<div class="form-group" style="margin-top: 5%"></div>')
                    .append('<input type="text" class="form-control" name="education[' + educationCount + '][degree]" placeholder="Degree">');
                newEducationField.append(degreeField);
    
                // Create and append the Institution Field with the updated index
                var institutionField = $('<div class="form-group"></div>')
                    .append('<input type="text" class="form-control" name="education[' + educationCount + '][institution]" placeholder="Institution">');
                newEducationField.append(institutionField);
    
                // Create and append the Year Field with the updated index
                var yearField = $('<div class="form-group"></div>')
                    .append('<input type="text" class="form-control" name="education[' + educationCount + '][year]" placeholder="Year">');
                newEducationField.append(yearField);
    
                // Append the new education field group to the container
                $('#education-fields').append(newEducationField);
            });
        });
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
                    date_of_birth: {
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
                    date_of_birth: {
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