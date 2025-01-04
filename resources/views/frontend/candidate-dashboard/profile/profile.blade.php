 {{-- Candidate Profile Info --}}
 <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
     <form action="{{ route('candidate.profile.profile-info') }}" method="POST">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group select-style ">
                     <label class="font-sm color-text-mutted mb-10">Gender *</label>
                     <select name="gender"
                         class=" form-control form-icons select-active select2 {{ hasError($errors, 'gender') }}">
                         <option value="">Select</option>
                         <option @selected($candidate?->gender == 'male') value="male">Male</option>
                         <option @selected($candidate?->gender == 'female') value="female">Female</option>
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
                         <option @selected($candidate?->marital_status == 'married') value="married">Married</option>
                         <option @selected($candidate?->marital_status == 'single') value="single">Single</option>
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
                         @foreach ($professions as $profession)
                             <option @selected($profession?->id == $candidate?->profession_id) value="{{ $profession->id }}">{{ $profession->name }}
                             </option>
                         @endforeach
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
                         <option @selected($candidate?->status == 'available') value="available">Available</option>
                         <option @selected($candidate?->status == 'not_available') value="not_available">Not Available</option>
                     </select>
                     <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Skill You Have *</label>
                     <select name="skills[]"
                         class="form-control form-icons select-active  {{ hasError($errors, 'skills') }}"
                         multiple="">
                         <option value="">Select</option>
                         @php
                             $candidateSkills = $candidate?->skills->pluck('skill_id')->toArray() ?? [];
                         @endphp
                         @foreach ($skills as $skill)
                             <option @selected(in_array($skill->id, $candidateSkills)) value="{{ $skill->id }}">{{ $skill->name }}
                             </option>
                         @endforeach
                     </select>
                     <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Language You Know *</label>
                     <select name="language[]"
                         class="form-control form-icons select-active {{ hasError($errors, 'language') }}"
                         multiple="">
                         <option value="">Select</option>
                         @php
                             $candidateLanguages = $candidate?->languages->pluck('language_id')->toArray() ?? [];
                         @endphp
                         @foreach ($languages as $language)
                             <option @selected(in_array($language->id, $candidateLanguages)) value="{{ $language->id }}">{{ $language->name }}
                             </option>
                         @endforeach
                     </select>
                     <x-input-error :messages="$errors->get('language')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="form-group">
                     <label for="content" class="font-sm color-text-mutted mb-10">Biography *</label>
                     <textarea name="bio" id="content" class="form-control {{ hasError($errors, 'bio') }}">{{ $candidate?->bio }}</textarea>
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
