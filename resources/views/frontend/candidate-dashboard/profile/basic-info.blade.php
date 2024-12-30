 {{-- Candidate Basic Info --}}
 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <form action="{{ route('candidate.profile.basic-info') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
             <div class="col-md-3">
                 <div class="form-group">
                     {{-- <x-image-preview :source="$companyInfo?->logo" :height="250" :width="250" imgName="Logo" /> --}}
                     <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                     <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file"
                         name="logo">
                     <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                 </div>
                 <div class="form-group">
                     {{-- <x-image-preview :source="$companyInfo?->logo" :height="250" :width="250" imgName="Logo" /> --}}
                     <label class="font-sm color-text-mutted mb-10">CV</label>
                     <input class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}" type="file"
                         name="cv">
                     <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-9">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                             <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                 type="text" name="full_name" value="{{ old('full_name') }}">
                             <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Title/Tagline *</label>
                             <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                 name="title" value="{{ old('title') }}">
                             <x-input-error :messages="$errors->get('title')" class="mt-2" />
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                             <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="text"
                                 name="level" value="{{ old('level') }}">
                             <x-input-error :messages="$errors->get('level')" class="mt-2" />
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Website *</label>
                             <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                 type="text" name="website" value="{{ old('level') }}">
                             <x-input-error :messages="$errors->get('website')" class="mt-2" />
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="font-sm color-text-mutted mb-10">Date Of Birth *</label>
                             <input class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" type="date"
                                 name="birth" value="{{ old('birth') }}">
                             <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                         </div>
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
