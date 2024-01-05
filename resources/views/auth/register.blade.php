@extends('layouts.app')

@section('content')
<div class="container" x-data="{canRegister:false, }">
    <div class="d-flex align-items-center">
        <div class="col-md-8 col-0 d-none d-md-block">

            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="718.5864" height="557.81713"
                viewBox="0 0 718.5864 557.81713" xmlns:xlink="http://www.w3.org/1999/xlink">
                <ellipse cx="333" cy="546.81713" rx="333" ry="11" fill="#e6e6e6" />
                <circle cx="328" cy="137.81713" r="41" fill="#6c63ff" />
                <path
                    d="M557.86214,403.70788l-18.55262-14.19824L472.89015,509.81091a10.80087,10.80087,0,1,0,12.61877,9.06787Z"
                    transform="translate(-240.7068 -171.09144)" fill="#ffb8b8" />
                <path
                    d="M727.20662,471.98815a10.8073,10.8073,0,0,0-10.64874-7.269l-107.016-83.9458-16.05163,16.97412,112.7362,78.57812a10.80171,10.80171,0,1,0,20.98017-4.3374Z"
                    transform="translate(-240.7068 -171.09144)" fill="#ffb8b8" />
                <polygon points="362.3 535.033 374.908 535.033 380.908 486.404 362.3 486.404 362.3 535.033"
                    fill="#ffb8b8" />
                <path
                    d="M600.30528,702.52189h39.62365a0,0,0,0,1,0,0V717.831a0,0,0,0,1,0,0H615.6144a15.30912,15.30912,0,0,1-15.30912-15.30912v0A0,0,0,0,1,600.30528,702.52189Z"
                    transform="translate(999.52741 1249.26148) rotate(-180)" fill="#2f2e41" />
                <polygon points="262.401 523.777 273.984 528.755 298.698 486.446 281.602 479.099 262.401 523.777"
                    fill="#ffb8b8" />
                <path
                    d="M497.416,697.69263h39.62365a0,0,0,0,1,0,0v15.30914a0,0,0,0,1,0,0H512.72508A15.30912,15.30912,0,0,1,497.416,697.69264v0A0,0,0,0,1,497.416,697.69263Z"
                    transform="translate(473.22009 1386.5167) rotate(-156.7437)" fill="#2f2e41" />
                <path
                    d="M542.40507,472.95762,482.43071,661.89237l78.71637,8.4339,7.55972-110.41771L578.952,670.32627l63.72278-7.49682S631.16392,487.95118,610.212,476.706,542.40507,472.95762,542.40507,472.95762Z"
                    transform="translate(-240.7068 -171.09144)" fill="#2f2e41" />
                <circle cx="334.2169" cy="162.46171" r="26.2388" fill="#ffb8b8" />
                <path
                    d="M574.08327,481.42712c-18.21924,0-35.75293-.80762-36.65674-2.374a.66322.66322,0,0,1,.12842-.82617c1.25341-1.8457-1.68946-31.84668-7.88624-80.23633A25.06559,25.06559,0,0,1,546.177,371.27966l.11572-.02637,54.91406-5.42285.61524.17285a24.84357,24.84357,0,0,1,18.15771,25.15625c-1.416,30.86816-3.792,83.15039-3.792,86.4834,0,.90722-1.26221,1.36133-2.36182,1.65625C608.47926,480.7318,590.9861,481.42712,574.08327,481.42712ZM538.26246,478.934h0Z"
                    transform="translate(-240.7068 -171.09144)" fill="#2f2e41" />
                <rect x="311.0014" y="283.18292" width="98.00016" height="98.00016"
                    transform="translate(-364.99756 234.62824) rotate(-51.3326)" fill="#f2f2f2" />
                <path
                    d="M367.11335,418.23646a22,22,0,1,1,25.06414-18.43337A22,22,0,0,1,367.11335,418.23646Zm6.32935-41.52034a20,20,0,1,0,16.75762,22.78555h0A20.02228,20.02228,0,0,0,373.4427,376.71612Z"
                    transform="translate(-240.7068 -171.09144)" fill="#3f3d56" />
                <path
                    d="M320.28447,666.29464c-7.50989,25.08633,4.14543,50.73455,4.14543,50.73455s23.83128-15.0248,31.34122-40.11118-4.14543-50.73454-4.14543-50.73454S327.79441,641.20827,320.28447,666.29464Z"
                    transform="translate(-240.7068 -171.09144)" fill="#e6e6e6" />
                <path
                    d="M331.6869,666.97317c6.32063,25.41208-6.52916,50.48313-6.52916,50.48313s-23.09755-16.13006-29.41818-41.54214,6.52916-50.48314,6.52916-50.48314S325.36632,641.561,331.6869,666.97317Z"
                    transform="translate(-240.7068 -171.09144)" fill="#e6e6e6" />
                <path
                    d="M538.02441,316.17423A90.60941,90.60941,0,0,0,583.56655,327.178c6.08348-.15784,12.7862-1.26445,16.63892-5.9751,4.34716-5.31518,3.25937-13.62-.93393-19.05742s-10.75383-8.50272-17.29812-10.58149c-6.192-1.96687-12.82694-3.23363-19.17668-1.85868a23.879,23.879,0,0,0-17.30438,31.72434"
                    transform="translate(-240.7068 -171.09144)" fill="#6c63ff" />
                <circle cx="299" cy="108.81713" r="23" fill="#6c63ff" />
                <path
                    d="M955.32028,282.45884l-90.28442-52.62109,11.58166-19.87109a5,5,0,1,0-8.63965-5.03565L856.39621,224.8021,766.11178,172.181a8,8,0,0,0-10.94012,2.8833L684.67459,296.01939a8.00033,8.00033,0,0,0,2.8833,10.94043l90.28442,52.62109L698.78494,495.22349a4.99991,4.99991,0,1,0,8.63965,5.03516L786.482,364.61607l90.28449,52.62109a7.99963,7.99963,0,0,0,10.94012-2.8833l70.49707-120.95508A7.99972,7.99972,0,0,0,955.32028,282.45884Z"
                    transform="translate(-240.7068 -171.09144)" fill="#3f3d56" />
                <ellipse cx="797.26866" cy="336.17956" rx="10" ry="38"
                    transform="translate(-135.35079 684.61762) rotate(-59.76482)" opacity="0.1"
                    style="isolation:isolate" />
                <circle cx="580.73228" cy="123.61775" r="48" fill="#6c63ff" />
                <path
                    d="M842.32254,318.45535c-2.781,4.77155-22.39616,7.78086-36.71081-.56224s-17.90816-24.87926-15.12714-29.65081,10.8835,4.02839,25.19815,12.37149S845.10359,313.68383,842.32254,318.45535Z"
                    transform="translate(-240.7068 -171.09144)" fill="#f2f2f2" />
                <circle cx="570.28539" cy="97.85222" r="10" fill="#f2f2f2" />
                <circle cx="606.57196" cy="119.00135" r="10" fill="#f2f2f2" />
            </svg>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label">{{ __('Account Type') }}</label>

                            <div class="col-md-12">
                               <select name="type" id="type" required class="form-select  @error('type') is-invalid @enderror">
                                <option value="Student">Student</option>
                               <option value="Teacher">Teacher</option>
                               </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="col-1">
                                <input id="termsandcondition" type="checkbox" x-model="canRegister" name="termsandcondition" required>
                            </div>
                            <label for="termsandcondition" class="col-11 col-form-label">
                                Read the terms and conditions and check the box to continue the registration <a href="/tnc" target="_blank">here</a>.
                            </label>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="w-100 btn btn-primary" :disabled="!canRegister">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
