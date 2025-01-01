 {{-- Candidate Basic Info --}}
 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <form action="{{ route('candidate.profile.basic-info') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
             <div class="col-md-3">
                 <div class="form-group">
                     <x-image-preview :source="$candidate?->image" :height="250" :width="250" imgName="Logo" />
                     <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                     <input class="form-control {{ hasError($errors, 'profile_picture') }}" type="file"
                         name="profile_picture">
                     <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                 </div>
                 <div class="form-group">
                     @if ($candidate?->cv)
                         <div class="alert alert-info">CV Has Been uplouded</div>
                     @endif
                     <label class="font-sm color-text-mutted mb-10">CV</label>
                     <input class="form-control {{ hasError($errors, 'cv') }}" type="file" name="cv">
                     <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-9">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                             <input class="form-control {{ hasError($errors, 'full_name') }}" type="text"
                                 name="full_name" value="{{ old('full_name', $candidate?->full_name) }}">
                             <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Title/Tagline</label>
                             <input class="form-control " type="text" name="title"
                                 value="{{ old('title', $candidate?->title) }}">
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                             <select name="experience_level"
                                 class="form-control {{ hasError($errors, 'experience_level') }}">
                                 <option value="">Select</option>
                                 <option @selected($candidate?->experience_id == 1) value="1">1 Year</option>
                                 <option @selected($candidate?->experience_id == 2) value="2">2 Year</option>
                                 <option @selected($candidate?->experience_id == 3) value="3">3 Year</option>
                             </select>
                             <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Website</label>
                             <input class="form-control {{ hasError($errors, 'website') }}" type="text"
                                 name="website" value="{{ old('website', $candidate?->website) }}">
                             <x-input-error :messages="$errors->get('website')" class="mt-2" />
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Date Of Birth *</label>
                             <div class="input-group date" id="datepicker">
                                 <input class="form-control {{ hasError($errors, 'date_of_birth') }} px-5"
                                     type="text" name="date_of_birth"
                                     value="{{ old('date_of_birth', $candidate?->birth_date) }}">
                                 <span class="input-group-append">
                                     <i class="fa fa-calendar"></i>
                                 </span>
                                 <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                             </div>
                         </div>
                         <x-notify::notify />
                     </div>
                 </div>
             </div>
         </div>
         <div class="box-button mt-15">
             <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                 Changes</button>
         </div>
     </form>
 </div>
 {{-- Candidate Basic Info --}}
