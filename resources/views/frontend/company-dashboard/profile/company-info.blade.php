 {{-- Company Info --}}
 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <form action="{{ route('company.profile.company-info') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <x-image-preview :source="$companyInfo?->logo" :height="250" :width="250" />
                     <label class="font-sm color-text-mutted mb-10">Logo *</label>
                     <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file"
                         name="logo">
                     <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <x-image-preview :source="$companyInfo?->banner" :height="250" :width="500" />
                     <label class="font-sm color-text-mutted mb-10">Banner *</label>
                     <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}" type="file"
                         name="banner">
                     <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                 </div>
             </div>
         </div>
         <div class="col-md-12">
             <div class="form-group">
                 <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                 <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                     name="name" value="{{ old('name', $companyInfo?->name) }}">
                 <x-input-error :messages="$errors->get('name')" class="mt-2" />
             </div>
         </div>
         <div class="col-md-12">
             <div class="form-group">
                 <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                 <textarea class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" style="height:150px" name="bio">{{ old('bio', $companyInfo?->bio) }}</textarea>
                 <x-input-error :messages="$errors->get('bio')" class="mt-2" />
             </div>
         </div>
         <div class="col-md-12">
             <div class="form-group">
                 <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                 <textarea class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}" style="height:150px" name="vision">{{ old('vision', $companyInfo?->vision) }}</textarea> <x-input-error :messages="$errors->get('vision')" class="mt-2" />
             </div>
             <x-notify::notify />
         </div>
         <div class="box-button mt-15">
             <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                 Changes</button>
         </div>
     </form>
 </div>
 {{-- Company Info --}}
