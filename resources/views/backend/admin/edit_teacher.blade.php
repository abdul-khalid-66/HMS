@extends('backend.layout.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend/css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/form/all-type-forms.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/css/chosen/bootstrap-chosen.css') }}">
<style>
    .error { color: red; font-size: 14px; }
    .image-upload-container { text-align: center; }
    .image-preview { margin-bottom: 15px; }
    .custom-file-upload { display: inline-block; padding: 6px 12px; cursor: pointer; background-color: #007bff; color: #fff; border-radius: 4px; font-size: 14px; }
    .custom-file-upload:hover { background-color: #0056b3; }
    .note { font-size: 12px; color: #666; margin-top: 10px; }
    .image-preview { width: 400px; height: 400px; border: 2px dashed #ccc; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin: 0 auto; }
    .image-preview img { max-width: 100%; max-height: 100%; width: 360px; height: 400px; object-fit: cover; border-radius: 5px; }
    .image-preview:empty { background-color: #f9f9f9; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #666; }
    .image-preview:empty::before { content: "No Image Selected"; }
</style>
@endpush

@section('content')
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Edit Teacher Information</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" class="needsclick add-professors" id="demo1-upload" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!-- Form Fields -->
                                                <div class="row">
                                                    <!-- Left Side: Image Upload Section -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group alert-up-pd">
                                                            <div class="image-upload-container">
                                                                <div class="image-preview">
                                                                    <img id="image-preview" src="{{ $teacher?->profile ? asset('backend/'. $teacher?->profile) : asset('backend/img/contact/1.jpg') }}" alt="Image Preview">
                                                                </div>
                                                                <div class="file-input-container">
                                                                    <p class="note needsclick">(Please upload your current profile image.)</p>
                                                                    <label for="image-upload" class="custom-file-upload">
                                                                        <i class="fa fa-upload"></i> Choose Image
                                                                    </label>
                                                                    <input id="image-upload" name="profile" type="file" accept="image/*" style="display: none;" onchange="previewImage(event)">
                                                                </div>
                                                                @error('profile')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Right Side: Form Fields -->
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input name="fullname" type="text" class="form-control" placeholder="Full Name" value="{{ $teacher->user->name ?? "" }}">
                                                            @error('fullname')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $teacher->user->email ??  "" }}">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input name="phoneno" type="number" class="form-control" placeholder="Phone" value="{{ $teacher->phone ??  "" }}">
                                                            @error('phoneno')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input name="address" type="text" class="form-control" placeholder="Address" value="{{ $teacher->address ?? "" }}">
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input 
                                                                name="date_of_birth" 
                                                                type="date" 
                                                                title="Date of birth" 
                                                                class="form-control" 
                                                                placeholder="Date of Birth" 
                                                                value="{{ \Carbon\Carbon::parse($teacher->date_of_birth??"")->format('Y-m-d') ??  "" }}"
                                                            >
                                                            @error('date_of_birth')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Post Code</label>
                                                            <input name="postcode" type="text" class="form-control" placeholder="Postcode" value="{{ $teacher->postcode ?? "" }}">
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
                                                            <input name="department" type="text" class="form-control" placeholder="Department" value="{{ $teacher->department ?? "" }}">
                                                            @error('department')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="none" selected disabled>Select Gender</option>
                                                                <option value="male" {{ ($teacher->gender ??  "") == 'male' ? 'selected' : '' }}>Male</option>
                                                                <option value="female" {{ ($teacher->gender ??  "") == 'female' ? 'selected' : '' }}>Female</option>
                                                            </select>
                                                            @error('gender')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Provence</label>
                                                            <select name="state" class="form-control">
                                                                <option value="none" selected disabled>Select state</option>
                                                                <option value="Sindh" {{ ($teacher->state ??  "") == 'Sindh' ? 'selected' : '' }}>Sindh</option>
                                                                <option value="Punjab" {{ ($teacher->state ??  "") == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                                                <option value="Balochistan" {{ ($teacher->state ??  "") == 'Balochistan' ? 'selected' : '' }}>Balochistan</option>
                                                                <option value="Kpk" {{ ($teacher->state ??  "") == 'Kpk' ? 'selected' : '' }}>Khyber Pakhtun khaw</option>
                                                            </select>
                                                            @error('state')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <select name="city" class="form-control">
                                                                <option value="none" selected disabled>Select city</option>
                                                                <option value="Hyderabad" {{ ($teacher->city ??  "") == 'Hyderabad' ? 'selected' : '' }}>Hyderabad</option>
                                                                <option value="Karachi" {{ ($teacher->city ??  "") == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                                                <option value="Lahore" {{ ($teacher->city ??  "") == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                                                <option value="Islamabad" {{ ($teacher->city ??  "") == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                                                                <option value="Peshawer" {{ ($teacher->city ??  "") == 'Peshawer' ? 'selected' : '' }}>Peshawer</option>
                                                                <option value="Quita" {{ ($teacher->city ??  "") == 'Quita' ? 'selected' : '' }}>Quita</option>
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
                                                            <label>Website link</label>
                                                            <input name="website" type="text" class="form-control" placeholder="Website URL" value="{{ $teacher->website ?? "" }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Facebook link</label>
                                                            <input type="url" class="form-control" name="facebook" placeholder="Facebook URL" value="{{ $teacher->facebook_url ?? "" }}">
                                                            @error('facebook')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Twitter link</label>
                                                            <input type="url" class="form-control" name="twitter" placeholder="Twitter URL" value="{{ $teacher->twitter_url ?? "" }}">
                                                            @error('twitter')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Linkedin</label>
                                                            <input type="url" class="form-control" name="linkedin" placeholder="Linkedin URL" value="{{ $teacher->linkedin_url ?? "" }}">
                                                            @error('linkedin')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                            <label>Description</label>
                                                            <textarea name="description" placeholder="Description">{{ $teacher->description ??  "" }}</textarea>
                                                            @error('description')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @php
                                                        $allSubjects = ['Physics', 'Math', 'English', 'Chemistry'];
                                                    @endphp
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group chosen-select-single">
                                                            <label>Subjects</label>
                                                            <select data-placeholder="Choose a teacher subjects..." name="subjects[]" class="form-control chosen-select" multiple tabindex="-1">
                                                                <option value="">Select subject</option>
                                                                @foreach($allSubjects as $subject)
                                                                    <option value="{{ $subject }}" 
                                                                        {{ in_array($subject, $teacher->subject ?? []) ? 'selected' : '' }} >
                                                                        {{ $subject }}
                                                                    </option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Education Information -->
                                                <div id="education-fields">
                                                    @foreach($teacher->education ?? [] as $index => $education)
                                                        <div class="education-field" style="margin-top: 5%">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="education[{{ $index }}][degree]" placeholder="Degree" value="{{ $education['degree'] }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="education[{{ $index }}][institution]" placeholder="Institution" value="{{ $education['institution'] }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="education[{{ $index }}][year]" placeholder="Year" value="{{ $education['year'] }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Button to Add More Education Fields -->
                                                <button type="button" id="add-education" class="btn btn-secondary">Add More Education</button>
                                                <!-- Submit Button -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
<script>
    $(document).ready(function () {
        let educationCount = {{ count($teacher->teacher->education ?? []) }};
        $('#add-education').on('click', function () {
            educationCount++;
            var newEducationField = $('<div class="education-field"></div>');
            var degreeField = $('<div class="form-group" style="margin-top: 5%"></div>')
                .append('<input type="text" class="form-control" name="education[' + educationCount + '][degree]" placeholder="Degree">');
            newEducationField.append(degreeField);
            var institutionField = $('<div class="form-group"></div>')
                .append('<input type="text" class="form-control" name="education[' + educationCount + '][institution]" placeholder="Institution">');
            newEducationField.append(institutionField);
            var yearField = $('<div class="form-group"></div>')
                .append('<input type="text" class="form-control" name="education[' + educationCount + '][year]" placeholder="Year">');
            newEducationField.append(yearField);
            $('#education-fields').append(newEducationField);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#demo1-upload").validate({
            rules: {
                fullname: { required: true, minlength: 2 },
                email: { required: true, email: true },
                phoneno: { required: true, digits: true, minlength: 10, maxlength: 10 },
                password: { required: true, minlength: 6 },
                confarmpassword: { required: true, equalTo: "[name='password']" },
                address: { required: true },
                date_of_birth: { required: true },
                postcode: { required: true, digits: true },
                description: { required: true },
                department: { required: true },
                gender: { required: true },
                state: { required: true },
                city: { required: true },
            },
            messages: {
                fullname: { required: "Please enter your full name", minlength: "Name must be at least 2 characters long" },
                email: { required: "Please enter your email", email: "Please enter a valid email address" },
                phoneno: { required: "Please enter your phone number", digits: "Please enter only digits", minlength: "Phone number must be 10 digits", maxlength: "Phone number must be 10 digits" },
                password: { required: "Please enter a password", minlength: "Password must be at least 6 characters long" },
                confarmpassword: { required: "Please confirm your password", equalTo: "Passwords do not match" },
                address: { required: "Please enter your address" },
                date_of_birth: { required: "Please enter your date of birth" },
                postcode: { required: "Please enter your postcode", digits: "Postcode must be a number" },
                description: { required: "Please enter a description" },
                department: { required: "Please enter your department" },
                gender: { required: "Please select your gender" },
                state: { required: "Please select your state" },
                city: { required: "Please select your city" },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
    });
</script>
@endpush