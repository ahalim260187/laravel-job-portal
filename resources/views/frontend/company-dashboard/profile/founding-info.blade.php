 {{-- Founding Info --}}

 <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
     <form action="{{ route('company.profile.founding-info') }}" method="POST">
         @csrf
         <div class="row">
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                     <select
                         class="form-control form-icons select-active {{ $errors->has('industry_type') ? 'is-invalid' : '' }}"
                         name="industry_type">
                         <option value="">Select</option>
                         <option value="0"
                             {{ old('industry_type', $companyInfo?->industry_type_id) == '0' ? 'selected' : '' }}>One
                         </option>
                         <option value="1"
                             {{ old('industry_type', $companyInfo?->industry_type_id) == '1' ? 'selected' : '' }}>two
                         </option>
                     </select>
                     <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Organization Size
                         *</label>
                     <select
                         class="form-control form-icons select-active {{ $errors->has('organization_size') ? 'is-invalid' : '' }}"
                         name="organization_size">
                         <option value="">Select</option>
                         <option value="0"
                             {{ old('organization_size', $companyInfo?->organization_size_id) == '0' ? 'selected' : '' }}>
                             One</option>
                     </select>
                     <x-input-error :messages="$errors->get('organization_size')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                     <select
                         class="form-control form-icons select-active  {{ $errors->has('team_size') ? 'is-invalid' : '' }}"
                         name="team_size">
                         <option value="">Select</option>
                         <option value="1"
                             {{ old('team_size', $companyInfo?->team_size_id) == '1' ? 'selected' : '' }}> >One</option>
                     </select>
                     <x-input-error :messages="$errors->get('team_size')" class="mt-2" />
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Establishment Date
                         *</label>
                     <div class="input-group date" id="datepicker">
                         <input type="text"
                             class="form-control  {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                             name="establishment_date"
                             value="{{ old('establishment_date', $companyInfo?->establishment_date) }}">
                         <span class="input-group-append">
                             <span class="input-group-text bg-white d-block">
                                 <i class="fa fa-calendar"></i>
                             </span>
                         </span>
                         <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />
                     </div>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Website Url</label>
                     <input class="form-control {{ $errors->has('website_url') ? 'is-invalid' : '' }}" type="text"
                         name="website_url" value="{{ old('website_url', $companyInfo?->website) }}">
                     <x-input-error :messages="$errors->get('website_url')" class="mt-2" />

                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Email</label>
                     <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                         name="email" value="{{ old('email', $companyInfo?->email) }}">
                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Phone</label>
                     <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                         name="phone" value="{{ old('phone', $companyInfo?->phone) }}">
                     <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">Country</label>
                     <select
                         class="form-control form-icons select-active {{ $errors->has('country') ? 'is-invalid' : '' }}"
                         name="country">
                         <option value="">Select</option>
                         <option value="0" {{ old('country', $companyInfo?->country) == '0' ? 'selected' : '' }}>
                             One</option>
                     </select>
                     <x-input-error :messages="$errors->get('country')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">State</label>
                     <select
                         class="form-select form-icons select-active {{ $errors->has('state') ? 'is-invalid' : '' }}"
                         name="state">
                         <option value="">Select</option>
                         <option value="0" {{ old('state', $companyInfo?->state) == '0' ? 'selected' : '' }}>One
                         </option>
                     </select>
                     <x-input-error :messages="$errors->get('state')" class="mt-2" />
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="form-group select-style">
                     <label class="font-sm color-text-mutted mb-10">City</label>
                     <select
                         class="form-control form-icons select-active {{ $errors->has('city') ? 'is-invalid' : '' }}"
                         name="city">
                         <option value="">Select</option>
                         <option value="0" {{ old('city', $companyInfo?->city) == '0' ? 'selected' : '' }}>One
                         </option>
                     </select>
                     <x-input-error :messages="$errors->get('city')" class="mt-2" />
                 </div>
             </div>
         </div>
         <div class="col-md-12">
             <div class="form-group">
                 <label class="font-sm color-text-mutted mb-10">Address</label>
                 <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                     name="address" value="{{ old('address', $companyInfo?->address) }}">
                 <x-input-error :messages="$errors->get('address')" class="mt-2" />
             </div>
         </div>
         <div class="col-md-12">
             <div class="form-group">
                 <label class="font-sm color-text-mutted mb-10">Map Link</label>
                 <input class="form-control" type="text" name="map_link"
                     value="{{ old('map_link', $companyInfo?->map_link) }}">
             </div>
         </div>
         <div class="box-button mt-15">
             <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
         </div>
     </form>
 </div>
 {{-- Founding Info --}}