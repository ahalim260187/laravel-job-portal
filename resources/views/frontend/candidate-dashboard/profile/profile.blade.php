 {{-- Candidate Profile Info --}}
 <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
     <form action="{{ route('candidate.profile.basic-info') }}" method="POST">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group select-style ">
                     <label class="font-sm color-text-mutted mb-10">Gender *</label>
                     <select name="gender"
                         class=" form-control form-icons select-active select2 {{ hasError($errors, 'gender') }}">
                         <option value="">Select</option>
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                     </select>
                     <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Marital Status *</label>
                     <select name="marital_status"
                         class="form-control form-icons select-active  {{ hasError($errors, 'marital_status') }}">
                         <option value="">Select</option>
                         <option value="married">Married</option>
                         <option value="single">Single</option>
                     </select>
                     <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Profession *</label>
                     <select name="profession"
                         class="form-control form-icons select-active  {{ hasError($errors, 'profession') }}">
                         <option value="">Select</option>
                         <option value="1">Tes 1</option>
                         <option value="2">tes2</option>
                         <option value="3">Tes 3</option>
                     </select>
                     <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Your Availability *</label>
                     <select name="availability"
                         class="form-control form-icons select-active  {{ hasError($errors, 'availability') }}">
                         <option value="">Select</option>
                         <option value="available">Available</option>
                         <option value="not_available">Not Available</option>
                     </select>
                     <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Skill You Have *</label>
                     <select name="skills"
                         class="form-control form-icons select-active  {{ hasError($errors, 'skills') }}"
                         multiple="">
                         <option value="">Select</option>
                         <option value="1">PHP</option>
                         <option value="2">Laravel</option>
                         <option value="2">React</option>
                     </select>
                     <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Language You Know *</label>
                     <select name="language"
                         class="form-control form-icons select-active {{ hasError($errors, 'language') }}">
                         <option value="">Select</option>
                         <option value="1">English</option>
                         <option value="2">Indonesia</option>
                     </select>
                     <x-input-error :messages="$errors->get('language')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Biography *</label>
                     <textarea name="bio"cols="30" rows="10" class="form-control {{ hasError($errors, 'bio') }}"></textarea>
                     <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                 </div>
                 <x-notify::notify />
             </div>
         </div>
         <div class="box-button mt-15">
             <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                 Changes</button>
         </div>
     </form>
 </div>
 {{-- Candidate Basic Info --}}
