 {{-- Account Setting --}}
 <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
     <form action="{{ route('company.profile.account-info') }}" method="POST">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Username *</label>
                     <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text"
                         name="username" value="{{ old('username', auth()->user()->name) }}" required>
                     <x-input-error :messages="$errors->get('username')" class="mt-2" />

                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Email *</label>
                     <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                         name="email" value="{{ old('email', auth()->user()->email) }}">
                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 </div>
             </div>
         </div>
         <button class="btn btn-apply-big font-md font-bold">Save</button>
     </form>
     <div class="mt-30"></div>
     <form action="{{ route('company.profile.password-info') }}" method="POST">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Password *</label>
                     <input class="form-control {{ $errors->has('password' ? 'is-invalid' : '') }}" type="password"
                         name="password">
                     <x-input-error :messages="$errors->get('password')" class="mt-2" />

                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10"> Comfirm Password
                         *</label>
                     <input class="form-control {{ $errors->has('password_confirmation' ? 'is-invalid' : '') }}"
                         type="password" name="password_confirmation">
                     <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                 </div>
             </div>
         </div>
         <button class="btn btn-apply-big font-md font-bold">Save</button>
     </form>
 </div>
 {{-- Account Setting --}}
